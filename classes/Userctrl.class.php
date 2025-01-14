<?php 
require_once "../include/autoload.inc.php";

final class Userctrl extends Dbh
{
    private $user;

    public function __construct($name,$email, $pwd)
    {
        $this->user = new User($name,$email,$pwd);
    }

    

}
