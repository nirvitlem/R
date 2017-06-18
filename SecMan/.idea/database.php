<?php
$connect=mysqli_connect('localhost','root','','secmandb');
$connect->set_charset("utf8");
if(mysqli_connect_errno($connect))
{
    echo 'Failed to connect';
}

?><?php
/**
 * Created by PhpStorm.
 * User: NirV
 * Date: 17/06/2017
 * Time: 18:15
 */