<?php

namespace Source\Models;

use Source\Core\Model;
use Source\Core\Session;
use Source\Core\View;
use Source\Support\Email;

/**
 * Class Auth
 * Responsável por autenticação e cadastro de contas.
 */
class Auth extends Model
{
    /**
     * Auth constructor.
     */
    public function __construct()
    {
        parent::__construct("account", ["id"], ["email", "password"]);
    }

    /**
     * Usuário logado atualmente
     * @return null|Account
     */
    public static function account(): ?Account
    {
        $session = new Session();
        $auth = $session->auth ?? new \stdClass();
        $platform = url();

        if (!isset($auth->$platform)) {
            return null;
        }

        return (new Account())->findById($auth->$platform);
    }


    /**
     * Logout
     */
    public static function logout(): void
    {
        $session = new Session();
        $auth = $session->auth ?? new \stdClass();
        $platform = url();

        unset($auth->$platform);

        $session->set("auth", $auth);
    }

    public function resendActivationCode(Account $account): bool
    {
        $account->code = rand(1111, 9999);
        if (!$account->save()) {
            $this->message = $account->message;
            return false;
        }

        $person = (new Person())->findById($account->person_id);

        $view = new View(__DIR__ . "/../../shared/views/email");
        $message = $view->render("confirm", [
            "full_name"    => $person->full_name,
            "code"         => $account->code,
            "confirm_link" => url("/confirma/{$account->email}")
        ]);

        return (new Email())->bootstrap(
            "Ative sua conta no " . CONF_SITE_NAME,
            $message,
            $account->email,
            $person->full_name
        )->send();
    }


    /**
     * Registrar nova conta (cria Person + Account)
     * @param array $data
     * @param bool $resendCode
     * @return bool
     */
    /**
     * Registrar nova conta (recebe Person + Account)
     */
    public function register(Person $person, Account $account, bool $resendCode = false): bool
    {
        // 1. Salvar Person
        if (!$person->save()) {
            $this->message = $person->message;
            return false;
        }

        // 2. Garantir vínculo da conta com a pessoa
        $account->person_id = $person->id;

        if (!$account->save()) {
            $this->message = $account->message;
            return false;
        }

        // 3. Gerar código de ativação se for novo registro
        if (!$resendCode && empty($account->code)) {
            $account->code = rand(1111, 9999);
            $account->save();
        }

        // 4. Enviar e-mail de confirmação
        $view = new View(__DIR__ . "/../../shared/views/email");
        $message = $view->render("confirm", [
            "full_name"    => $person->full_name,
            "code"         => $account->code,
            "confirm_link" => url("/confirma/{$account->email}")
        ]);

        (new Email())->bootstrap(
            "Ative sua conta no " . CONF_SITE_NAME,
            $message,
            $account->email,
            $person->full_name
        )->send();

        return true;
    }


    /**
     * Tentativa de login
     */
    public function attempt(string $email, string $password, int $level = 1): ?Account
    {
        if (!is_email($email)) {
            $this->message->warning("O e-mail informado não é válido");
            return null;
        }

        if (!is_passwd($password)) {
            $this->message->warning("A senha informada não é válida");
            return null;
        }

        $account = (new Account())->findByEmail($email);

        if (!$account) {
            $this->message->error("O e-mail informado não está cadastrado");
            return null;
        }

        if (!passwd_verify($password, $account->password)) {
            $this->message->error("A senha informada não confere");
            return null;
        }

        // if ($account->level < $level) {
        //     $this->message->error("Desculpe, mas você não tem permissão para logar-se aqui");
        //     return null;
        // }

        if (passwd_rehash($account->password)) {
            $account->password = $password;
            $account->save();
        }

        return $account;
    }

    /**
     * Login
     */
    public function login(string $email, string $password, bool $save = false, int $level = 1): bool
    {
        $account = $this->attempt($email, $password, $level);
        if (!$account) {
            return false;
        }

        if ($save) {
            setcookie("authEmail", $email, time() + 604800, "/");
        } else {
            setcookie("authEmail", "", time() - 3600, "/");
        }

        // LOGIN
        $session = new Session();

        $auth = $session->auth ?? new \stdClass();
        $platform = url();

        $auth->$platform = $account->id;

        $session->set("auth", $auth);

        return true;
    }

    /**
     * Recuperação de senha
     */
    public function forget(string $email): bool
    {
        $account = (new Account())->find("email = :email", "email={$email}")->fetch();

        if (!$account) {
            $this->message->warning("O e-mail informado não está cadastrado.");
            return false;
        }

        $account->code = md5(uniqid(rand(), true));
        $account->save();

        $person = (new Person())->findById($account->person_id);

        $view = new View(__DIR__ . "/../../shared/views/email");
        $message = $view->render("forget", [
            "full_name"   => $person->full_name,
            "forget_link" => url("/recuperar/{$account->email}/{$account->code}")
        ]);

        return (new Email())->bootstrap(
            "Recupere sua senha no " . CONF_SITE_NAME,
            $message,
            $account->email,
            $person->full_name
        )->send();

        return true;
    }



    /**
     * Resetar senha
     */
    public function reset(string $email, string $code, string $password, string $passwordRe): bool
    {
        $account = (new Account())->find("email = :email", "email={$email}")->fetch();

        if (!$account) {
            $this->message->warning("A conta para recuperação não foi encontrada.");
            return false;
        }

        if ($account->code != $code) {
            $this->message->error("Desculpe, mas o código de verificação não é válido.");
            return false;
        }

        if (!is_passwd($password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->info("Sua senha deve ter entre {$min} e {$max} caracteres.");
            return false;
        }

        if ($password != $passwordRe) {
            $this->message->warning("Você informou duas senhas diferentes.");
            return false;
        }

        $account->password = $password;
        $account->status   = "confirmed";
        $account->code     = null;
        $account->save();

        return true;
    }
}
