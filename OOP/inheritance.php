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


    function show_all()
    {
        println($this->username);
        println($this->full_name);
    }
}

class Employee extends User
{
    var $designation;
    var $address;

    function __construct($username, $fullname, $password, $designation, $address)
    {
        parent::__construct($username, $password, $fullname);
        $this->designation = $designation;
        $this->address = $address;
    }

    function show_all()
    {
        parent::show_all();
        println($this->designation);
        println($this->address);
    }
}

$employee = new Employee("ixiondbz", "ixion chowdhury", "pass", "officer", "bashundhara");

$employee->show_all();

?>