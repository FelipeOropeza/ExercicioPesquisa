<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = 'kiraFE22022006';
    $banco = 'db_EmpregosEtimA';

    $cn = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
?>