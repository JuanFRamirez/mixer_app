<?php
class DBconnection{

    private $hostName = 'localhost';
    private $DBName = 'drinks';
    private $username = 'juan';
    private $password = '1234';

    public function connect(){
        $username = $this->username;
        $password = $this->password;
        $conn = new PDO("mysql:host=$this->hostName;dbname=$this->DBName",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!$conn){
            echo 'Error ocurred connecting';
        }
        return $conn;
    }

}
