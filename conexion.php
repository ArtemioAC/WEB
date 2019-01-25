<?php

define("MYSQL_HOST", "mysql:host=localhost;dbname=id5475247_tareaphp");
define("MYSQL_USER", "id5475247_artemioac");
define("MYSQL_PASSWORD", "temo51papa");


try {
    $tmp = new PDO(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD);
    $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $tmp->exec("set names utf8mb4");
    
    } 
    catch(PDOException $e) {
        cabecera("Error grave", MENU_PRINCIPAL);
        print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
        print "\n";
        print "    <p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
    }

?>