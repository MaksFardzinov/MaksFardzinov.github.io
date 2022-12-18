<?php
    $servername ='127.0.0.1';
    $username = 'root';
    $userpass ='';
    $dbname = 'maksfardzinov';
    $conn = new mysqli($servername, $username, $userpass ,$dbname);
    if ($conn->connect_error){
        die("Ошибка подключения:".$conn->connect_error);
    }
    if ($conn->affected_rows === 0) {
    	$conn->query('SET NAMES "utf8";');
    	$conn->query('SET CHARACTER SET "utf8";');
    	$conn->query('SET SESSION collation_connection = "utf8_general_ci";');
    }
?>