<?php

namespace Source\Models;

use Source\Core\Model;

class Account extends Model
{
    public function __construct()
    {
        parent::__construct("account", ["id"], ["email", "password"]);
    }

    /**
     * Retorna a pessoa vinculada a esta conta
     */
    public function person(): ?Person
    {
        return (new Person())->findById($this->person_id);
    }

    /**
     * Nome completo ou razão social
     */
    public function fullName(): string
    {
        $person = $this->person();
        return $person ? $person->full_name : $this->email;
    }

    /**
     * Inicializa a conta
     */
    public function bootstrap(
        int $personId,
        string $email,
        string $password
    ): Account {
        $this->person_id = $personId;
        $this->email = $email;
        $this->password = $password;
        return $this;
    }

    /**
     * Busca conta por e-mail
     */
    public function findByEmail(string $email, string $columns = "*"): ?Account
    {
        $find = $this->find("email = :email", "email={$email}", $columns);
        return $find->fetch();
    }

    /**
     * Salva ou atualiza credenciais
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Faltam dados obrigatórios");
            return false;
        }

        if (!is_email($this->email)) {
            $this->message->warning("O e-mail informado não tem um formato válido");
            return false;
        }

        if (!is_passwd($this->password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->warning("A senha deve ter entre {$min} e {$max} caracteres");
            return false;
        } else {
            $this->password = passwd($this->password);
        }

        // Update
        if (!empty($this->id)) {
            $this->update($this->safe(), "id = :id", "id={$this->id}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar conta");
                return false;
            }
        }

        // Create
        if (empty($this->id)) {
            if ($this->findByEmail($this->email, "id")) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $this->id = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao criar conta");
                return false;
            }
        }

        return true;
    }
}
