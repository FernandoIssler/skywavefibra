<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\App\Equipment;
use Source\Models\Auth;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;

/**
 * APP | Controller
 * @package Source\App
 */
class App extends Controller
{
    /** @var User */
    private $user;

    /** APP | Constructor */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

        if (!$this->user = Auth::account()) {
            $this->message->warning("Efetue login para acessar o APP.")->toast()->flash();
            redirect("/entrar");
        }

        (new Access())->report();
        (new Online())->report();
    }

    /**
     * Renderiza a página com os dados fornecidos.
     *
     * Esta função configura os metadados da página (SEO) e renderiza o template especificado.
     *
     * @param string $templateName Nome do template a ser renderizado.
     * @param array|null $data Dados a serem passados para a view (opcional).
     * @param string|null $headTitle Título da página (opcional).
     * @param string|null $headDescription Descrição da página (opcional).
     * @param string|null $headUrl URL da página (opcional).
     * @param string|null $headImage Imagem de compartilhamento da página (opcional).
     * @param bool $headFollow Indica se os motores de busca devem seguir os links da página (padrão: true).
     * @return void
     */
    private function renderPage(
        string $templateName,
        ?array $data = [],
        ?string $headTitle = null,
        ?string $headDescription = null,
        ?string $headUrl = null,
        ?string $headImage = null,
        bool $headFollow = true
    ): void {
        // Gera os metadados para SEO
        $head = $this->seo->render(
            $headTitle ?? CONF_SITE_NAME,
            $headDescription ?? CONF_SITE_DESC,
            $headUrl ?? url("/app"),
            $headImage ?? url("/shared/assets/images/share.png"),
            $headFollow
        );

        // Garante que $data seja um array antes de modificar
        $data = array_merge(["head" => $head], $data ?? []);

        // Renderiza a página
        echo $this->view->render($templateName, $data);
    }

    /** APP | Home */
    public function home(): void
    {
        $this->renderPage("home", [
            "active"      => "home",
            "title"       => "Início",
            "subtitle"    => "Bem-vindo(a)!",
        ]);
    }

    /** APP | Equipamentos */

    public function equipments(): void
    {
        $this->renderPage("equipments", [
            "active"      => "equipments",
            "title"       => "Equipamentos",
            "subtitle"    => "Gerencie seus equipamentos",
            "equipments" => (new Equipment())->find()->fetch(true) ?? [],
        ]);
    }


    public function equipment(): void
    {
        $this->renderPage("equipment", [
            "active"      => "equipment",
            "title"       => "Equipamentos",
            "subtitle"    => "Gerencie seus equipamentos",
        ]);
    }

    public function saveEquipment(array $data): void
    {
        $data = filter_var_array($data, FILTER_UNSAFE_RAW);

        $equipment = new Equipment();
        $equipment->type = $data['type'] ?? '';
        $equipment->manufacturer = $data['manufacturer'] ?? '';
        $equipment->model = $data['model'] ?? '';
        $equipment->serial_number = $data['serial_number'] ?? '';
        $equipment->status = $data['status'] ?? '';

        if (!$equipment->save()) {
            jsonResponse([
                "success" => false,
                "message" => ($equipment->message() ?: $this->message)
                    ->error("Erro ao salvar o equipamento.")->toast()->render()
            ]);
        }

        $this->message->success("Equipamento cadastrado com sucesso!")->toast()->flash();

        jsonResponse([
            "success"  => true,
            "message"  => $this->message->success("Equipamento cadastrado com sucesso!")->toast()->render(),
            "redirect" => url("/app/equipamentos")
        ]);
    }

    // Usuários

    //Vou fazer os usuários depois

    /** APP | Logout */
    public function logout(): void
    {
        Auth::logout();
        redirect("/entrar");
    }
}
