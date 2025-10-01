<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Person
 * Representa pessoas físicas ou jurídicas
 */
class Person extends Model
{
    public function __construct()
    {
        parent::__construct("person", ["id"], ["full_name", "document", "person_type"]);
    }

    public function bootstrap(
        string $fullName,
        string $document,
        string $personType,
        ?string $birthDate = null
    ): Person {
        $this->full_name = $fullName;
        $this->document = $document;
        $this->person_type = $personType;
        $this->birth_date = $birthDate;
        return $this;
    }

    public function shortName(): string
    {
        if ($this->person_type === "company") {
            return $this->full_name;
        }

        return explode(" ", $this->full_name)[0];
    }
}
