<?php
namespace aitsydney;         //a name
class Database{
    protected $connection;
    public function __construct(){
        $this -> connection = mysqli_connect('localhost', 'website', 'password','data'); //connect to database 'data' is the name of the table in your database, the password is the password that you put in the user account
    
    }

}
?>