<?php

/**
 * Created by PhpStorm.
 * User: NirV
 * Date: 18/06/2017
 * Time: 17:13
 */
class DBConnect
{
    private $connect;

    public function  __construct($dbName)
    {
        $this->connect=mysqli_connect('localhost','root','',$dbName);
        $this->connect->set_charset("utf8");
        if(mysqli_connect_errno($this->connect))
        {
            echo 'Failed to connect';
        }
    }

    public function returnMySqli()
    {
        return $this->connect;
    }

}