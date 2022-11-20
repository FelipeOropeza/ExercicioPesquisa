<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        h5{
            margin-right: 20px;
            margin-left: 20px;
        }
        #barra1{
            margin-right: 30px;
        }
        #barra2{
            margin-right: 20px;
        }
        img{
            width: 30px;
            height: 30px;
        }
        #link{
            text-decoration: none;
            color:black;
        }
    </style>
</head>
<body>
<?php
    include 'conexao.php';
    $cargo = $_GET['carg'];
    $area = $_GET['area'];
    $consulta = $cn->query("select * from tbl_empregos where Cargo = '$cargo' and Area = '$area'");
    $consultaCargo = $cn->query("select * from tbl_empregos group by Cargo");
    $consultaArea = $cn->query("select * from tbl_empregos group by Area");
?>
<nav class="navbar navbar-expand-lg bg-light">
    <h5><a id="link" href="index.php">Pesquisa</a></h5>
    <form class="d-flex" method="get" role="search" action="pesquisa.php">
    <div id="barra1" class="col-sm-4">
        <select id="carg" name="carg" class="form-select">
            <option disabled>Cargo</option>
            <?php while($exibirCargo=$consultaCargo->fetch(PDO::FETCH_ASSOC)){?>
            <option><?php echo $exibirCargo['Cargo']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div id="barra2" class="col-sm-4">
        <select id="area" name="area" class="form-select">
            <option disabled>Area</option>
            <?php while($exibirArea=$consultaArea->fetch(PDO::FETCH_ASSOC)){?>
            <option><?php echo $exibirArea['Area']; ?></option>
            <?php } ?>
        </select>
    </div>
        <button class="btn btn-outline-success" type="submit">Pesquisa</button>
    </form>
</nav>
<br>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Registro</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Area</th>
            <th>Salario</th>
            <th>Status</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php while($exibirPesq = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $exibirPesq['Registro'];?></td>
            <td><?php echo $exibirPesq['Nome'];?></td>
            <td><?php echo $exibirPesq['Cargo'];?></td>
            <td><?php echo $exibirPesq['Area'];?></td>
            <td>R$ <?php echo $exibirPesq['Salario'];?></td>
            <td><?php echo $exibirPesq['Status'];?></td>
            <td><a href="#"><img src="img/alterar.png"></a></td>
            <td><a href="#"><img src="img/excluir.png"></a></td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>