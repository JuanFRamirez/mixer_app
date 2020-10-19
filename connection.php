<?php

class DBconnection{
    public $username = 'juan';
    public $password = '1234';

    public function connect(){
        $username = $this->username;
        $password = $this->password;
        $conn = new PDO('mysql:host=localhost;dbname=drinks',$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!$conn){
            echo 'Error ocurred connecting';
        }
        return $conn;
    }

}

?>