<?php
    $host = 'localhost';
    $dbuser = 'root';
    $dbpw = '123456';
    $dbname = 'login';
    
    $GLOBALS['link'] = mysqli_connect($host,$dbuser,$dbpw,$dbname);

    if($link)
    {
        mysqli_query($link,"SET NAMES utf8");
    }
    
    else
    {
        echo 'NO';
    }
    
?>