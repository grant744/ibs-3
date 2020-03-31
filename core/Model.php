<?php

namespace core;

use libs\Database;

abstract class Model
{
    public $database;

    public function __construct()
    {

        
        $this->database = new Database;
        

	}
}


?>