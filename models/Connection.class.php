<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 18.08.2015
 * Time: 16:47
 */
class Connection
{
    protected function connect(){
        if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
            return new PDO('mysql:host=localhost;dbname=beh', 'root', '');
        }else{
            return new PDO('mysql:host=localhost;dbname=ununik', 'ununik', 'am4qgx');
        }
    }
}