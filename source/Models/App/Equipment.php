<?php

namespace Source\Models\App;

use Source\Core\Model;

class Equipment extends Model
{
    public function __construct()
    {
        parent::__construct("equipment", ["id"], ["type"]);
    }
}
