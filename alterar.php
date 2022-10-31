<?php
    include 'conexao.php';

    $cd = $_GET['cd'];
    $vNome = $_POST['txtnome'];
    $vCarg = $_POST['carg'];
    $vArea = $_POST['area'];
    $vSala = $_POST['txtsalario'];
    $VStat = $_POST['txtstatus'];

    $alterar = $cn->query("update tbl_empregos set
    Nome = '$vNome',
    Cargo = '$vCarg',
    Area = '$vArea',
    Salario = '$vSala',
    Status = '$vStat'
    where Registro = '$cd';
    ");
    header('location:index.php');
?>