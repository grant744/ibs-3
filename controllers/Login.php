<?php

namespace controllers;

use core\Controller;

class Login extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user']) == TRUE) 
        {
			$this->view->redirect('/login/already');
        }
        
        if (empty($_POST) == FALSE)
        {
            if ($this->model->loginValidate($_POST) == TRUE) 
            {
                $_SESSION['user'] = $this->model->response;
                $this->view->redirect('/login/already');
            }
            else
            {
                $this->view->setVar('response', $this->model->response);
            }
        }

        $lang = $_SESSION['language'];
        $this->view->setVar('phrase', $this->model->getPhrase($lang));

        $titles = [
            'en' => 'Login',
            'ru' => 'Вход в систему',
        ];

        $this->view->setTitle($titles[$lang]);
        $this->view->render();
    }

    public function already()
    {
        if (isset($_SESSION['user']) == FALSE) 
        {
			$this->view->redirect('/');
        }

        $lang = $_SESSION['language'];

        $titles = [
            'en' => 'You are successfully logged in',
            'ru' => 'Вы успешно вошли в систему',
        ];

        $this->view->setTitle($titles[$lang]);
        $this->view->render();
    }

    public function logout()
    {
        unset($_SESSION['user']);
		$this->view->redirect('/');
    }

    public function languageSwitch()
    {
        if (isset($this->params['value']) == TRUE) 
        {
            $_SESSION['language'] = $this->params['value'];
            
            if (isset($_SERVER['HTTP_REFERER']) == TRUE)
            {
                $this->view->redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {
                $this->view->redirect('/');
            }
        }
    }
}