<?php

class ConfigBD{

    public static function getConfig(){

        switch ($_SERVER['SERVER_NAME']){
            default:
                $dbConfig = array(
                    'hostname' => 'localhost',
                    'usuario' => 'root',
                    'password' => '',
                    'base_datos' => 'cap_softura_peliculas',
                    'puerto' => '3306',
                );
                break;
        }
        return $dbConfig;

    }

}