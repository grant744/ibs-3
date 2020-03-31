<?php

namespace controllers;

use core\Controller;

class Login extends Controller
{
    public function index()
    {
        $titles = [
            'en' => 'Login',
            'ru' => 'Вход в систему',
        ];

        $lang = $this->view->getLanguage();

        if (empty($_POST) == FALSE)
        {
            $this->view->setVar('response', $this->model->loginValidate($_POST));
        }
        else
        {
            $this->view->setVar('response', 0);
        }

        $this->view->setVar('phrase', $this->model->getPhrase($lang));

        $this->view->setTitle($titles[$lang]);
        $this->view->render();
    }
}