<?php
class User
{
    public $username;
    private $password;
    public $full_name;

    static $total_number_of_users=0;

    function __construct($username, $password, $full_name)
    {
        $this->username = $username;
        $this->password = $password;
        $this->full_name = $full_name;
        User::$total_number_of_users++;
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

$user_a = new User("ixiondbz", "pass112", "ixion chowdhury");
$user_b = new User("ixiondbz", "pass112", "ixion chowdhury");
$user_c = new User("ixiondbz", "pass112", "ixion chowdhury");

echo "total number of Users: " . User::$total_number_of_users;

?>