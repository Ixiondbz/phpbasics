<?php
function println($message)
{
    echo $message . "<br>";
}
class User
{
    public $username;
    private $password;
    public $full_name;

    function __construct($username, $password, $full_name)
    {
        $this->username = $username;
        $this->password = $password;
        $this->full_name = $full_name;
    }

    function set_username($username)
    {
        $this->username = $username;
    }

    function set_full_name($full_name)
    {
        $this->full_name = $full_name;
    }

    function set_password($pass)
    {
        $this->password = $pass;
    }

    function show_all()
    {
        println($this->username);
        println($this->full_name);
    }
}

$user = new User("ixiondbz", "pass112", "ixion chowdhury");

$user->username;
$user->full_name;
$user->password;

?>