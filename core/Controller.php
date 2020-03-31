<?php

namespace core;

use core\View;

abstract class Controller 
{
	public $params;
	public $view;
	public $model;

	public function __construct($params) 
	{
		$this->params = $params;
		$this->view = new View($params);

        $modelClass = 'models\\'.ucfirst($this->params['controller_id']);
        
        if (class_exists($modelClass))
        {
            $this->model = new $modelClass();
        }
	}
}
