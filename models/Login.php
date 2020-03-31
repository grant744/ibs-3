<?php

namespace models;

use core\Model;

class Login extends Model 
{
    public function getPhrase($language) 
    {
        $phrases = [
            'en' => [
                'Welcome to IBS',
                'Hello',
                'Glad to see you',
                'Have a nice work',
                'Good working day',
                'Good day, good work at IBS',
                'Salute, glad to see you at IBS',
            ],

            'ru' => [
                'Добро пожаловать в IBS',
                'Здравствуйте',
                'Хорошей работы',
                'Добрый день',
                'С возвращением',
            ],
        ];

        if (array_key_exists($language, $phrases))
        {
            $phrase_id = mt_rand(0, count($phrases[$language]) - 1);
            $phrase = $phrases[$language][$phrase_id];
            return $phrase;
        }
        else
        {
            $phrase_id = mt_rand(0, count($phrases['en']) - 1);
            $phrase = $phrases['en'][$phrase_id];
            return $phrase;
        }
    }

    public function loginValidate($data) 
    {
        if (empty($data['login']) == FALSE)
        {
            if (empty($data['password']) == FALSE)
            {
                $args = [
                    'login' => $data['login'],
                ];

                $result = $this->database->getRow('SELECT * FROM `users` WHERE `login` = :login', $args);
                
                if ($result['password'] == $data['password'])
                {
                    return 4;
                }
                else
                {
                    return 3;
                }
            }
            else
            {
                return 2;
            }
        }
        else
        {
            return 1;
        }
    }
}