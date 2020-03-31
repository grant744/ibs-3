<?php

namespace core;

class View
{
    public $params;
    public $title;
    public $vars = [];
    public $layout;
    public $content;

    public function __construct($params) 
    {
        $this->params = $params;
    }

    public function setTitle($string) 
    {
        $this->title = $string;
    }

    public function setLayout($path) 
    {
        $this->layout = $path;
    }
    
    public function setContent($path) 
    {
        $this->content = $path;
    }

    public function setVar($name, $value) 
    {
        $this->vars[$name] = $value;
    }
    
    public function getLanguage() 
    {
        return $_SESSION['language'];
	}

    // This method automatically finds the layout value
    public function autoLayout() 
    {
        $path = 'layouts/'.$_SESSION['language'].'/'.$this->params['controller_id'].'.php';

        if (file_exists($path))
        {
            return $path;
        }
        else 
        {
            $path = 'layouts/polyglot/'.$this->params['controller_id'].'.php';

            if (file_exists($path))
            {
                return $path;
            }
            else
            {
                return false;
            }
        }
	}

    // This method automatically finds the content value
    public function autoContent() 
    {
        $path = 'contents/'.$_SESSION['language'].'/'.$this->params['controller_id'].'/'.$this->params['action_id'].'.php';

        if (file_exists($path))
        {
            return $path;
        }
        else 
        {
            $path = 'contents/polyglot/'.$this->params['controller_id'].'/'.$this->params['action_id'].'.php';

            if (file_exists($path))
            {
                return $path;
            }
            else
            {
                return false;
            }
        }
    }

    // This method renders the page
    public function render() 
    {
        if (empty($this->title) == TRUE)
        {
            $this->setTitle('Title not set');
        }

        if (empty($this->layout) == TRUE)
        {
            $this->layout = $this->autoLayout();
        }

        if (empty($this->content) == TRUE)
        {
            $this->content = $this->autoContent();
        }

        if ((file_exists($this->layout) == TRUE) AND (file_exists($this->content) == TRUE))
        {
            if (empty($this->vars) == FALSE)
            {
                extract($this->vars);
            }

            ob_start();
            require $this->content;
            $content = ob_get_clean();
            
            $title = $this->title;
            require $this->layout;
        }
        else
        {
            View::error('no_language');
        }
	}

    // This method allows you to control the language
    public static function languageOperate() 
    {
        if (isset($_SESSION['language']) == FALSE) 
        {
            $_SESSION['language'] = 'en';
        }

        if (isset($_GET['language']) == TRUE) 
        {
            $_SESSION['language'] = $_GET['language'];

            if (isset($_SERVER['HTTP_REFERER']) == TRUE)
            {
                header('location: '.$_SERVER['HTTP_REFERER']);
                exit;
            }
            else
            {
                header('location: /');
                exit;
            }
        }
    }

    // This method displays an message
    public static function message($string) 
    {
        echo $string;
		exit;
    }

    // This method displays an error
    public static function error($id) 
    {
        $language = $_SESSION['language'];
        $layout = 'layouts/polyglot/errors.php';
        $errors = require 'configs/errors.php';

        if (array_key_exists($id, $errors))
        {
            if (array_key_exists($language, $errors[$id]))
            {
                $title = $errors[$id][$language]['title'];
                $cause = $errors[$id][$language]['cause'];
                $advice = $errors[$id][$language]['advice'];
            } 
            else
            {
                $title = $errors[$id]['en']['title'];
                $cause = $errors[$id]['en']['cause'];
                $advice = $errors[$id]['en']['advice'];
            }
        }
        else
        {
            $title = $errors['404']['en']['title'];
            $cause = $errors['404']['en']['cause'];
            $advice = $errors['404']['en']['advice'];
        }

        if (is_numeric($id))
        {
            http_response_code($id);
        }   

        require $layout;
        exit; 
    }
}