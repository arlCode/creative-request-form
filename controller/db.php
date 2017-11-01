<?php

class db {

    function connectDB() {
        
        $ini_array = parse_ini_file('config.ini');
        $servername = $ini_array['servername'];
        $username = $ini_array['username'];
        $password = $ini_array['password'];
        $dbname = $ini_array['dbname'];
        $connected = false;
        
        $connection = mysqli_connect($servername, $username, $password, $dbname);

        if(!$connection) {
            die('Connection Failed: ' . mysqli_connect_error());
        }

        return $connection;
    }
}



?>

<script src="../assets/js/notification.js"></script>
<!--Default connection to the database.-->


















