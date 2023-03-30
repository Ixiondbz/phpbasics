<?php

function println($message)
{
    echo $message . "<br>";
}


class User
{
    var $username;
    var $password;
    var $full_name;
    var $type;

    function __construct($username, $password, $full_name, $type)
    {
        $this->username = $username;
        $this->password = $password;
        $this->full_name = $full_name;
        $this->type = $type;
    }



    function set_username($username)
    {
        $this->username = $username;
    }

    function set_full_name($full_name)
    {
        $this->full_name = $full_name;
    }

    function set_type($type)
    {
        $this->type = $type;
    }

    function show_all()
    {
        println($this->username);
        println($this->full_name);
        println($this->type);
    }
}

$user = new User("ixiondbz","pass123","Ixion Chowdhury","Student");

$user->show_all();

$user->set_username("ixionc");
$user->set_full_name("Ikkhon Chowdhury");
$user->set_type("Parent");

println("");

$user->show_all();



?>