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
    </style>
</head>
<body>
<?php
    include 'conexao.php';
    $consultaCargo = $cn->query("select * from tbl_empregos group by Cargo");
    $consultaArea = $cn->query("select * from tbl_empregos group by Area");
?>
<nav class="navbar navbar-expand-lg bg-light">
    <h5>Pesquisa</h5>
    <form class="d-flex" method="get" role="search" action="index.php">
    <div id="barra1" class="col-sm-4">
        <select id="carg" name="carg" class="form-select">
            <option value="1">Selecione:</option>
            <?php while($exibirCargo=$consultaCargo->fetch(PDO::FETCH_ASSOC)){?>
            <option><?php echo $exibirCargo['Cargo']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div id="barra2" class="col-sm-4">
        <select id="area" name="area" class="form-select">
            <option value="1">Selecione:</option>
            <?php while($exibirArea=$consultaArea->fetch(PDO::FETCH_ASSOC)){?>
            <option><?php echo $exibirArea['Area']; ?></option>
            <?php } ?>
        </select>
    </div>
        <button class="btn btn-outline-success" type="submit" onclick="funfaLogo()">Pesquisa</button>
    </form>
</nav>
<br>
<div class="table-responsive">
        <?php
        if(!isset($_GET["carg"]) and !isset($_GET["area"])){
        }
        else{
            $cargo = $_GET['carg'];
            $area = $_GET['area'];
            $consulta = $cn->query("select * from tbl_empregos where Cargo = '$cargo' and Area = '$area'");
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Registro</th>';
            echo '<th>Nome</th>';
            echo '<th>Cargo</th>';
            echo '<th>Area</th>';
            echo '<th>Salario</th>';
            echo '<th>Status</th>';
            echo '<th>Alterar</th>';
            echo '<th>Excluir</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while($exibirReg = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
                <?php echo '<tr>';?>
                <?php echo "<td>{$exibirReg['Registro']}</td>"; ?>
                <?php echo "<td>{$exibirReg['Nome']}</td>";?>
                <?php echo "<td>{$exibirReg['Cargo']}</td>";?>
                <?php echo "<td>{$exibirReg['Area']}</td>";?>
                <?php echo "<td>{$exibirReg['Salario']}</td>";?>
                <?php echo "<td>{$exibirReg['Status']}</td>";?>
                <?php echo "<td><a href='FormAlt.php?cd={$exibirReg['Registro']}'>Alterar</a></td>";?>
                <?php echo "<td>Exuir</td>";?>
                <?php echo '<tr>';?>
            <?php
         }
        }
        echo '</tbody>';
        echo '</table>'; ?>
</div>
<script src="script.js"></script>
</body>
</html>
