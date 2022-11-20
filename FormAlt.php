<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        #div{
            margin-top: 30px;
        }
    </style>
</head>
<body>
<?php
    include 'conexao.php';
    $cd = $_GET["cd"];
    $consulta = $cn->query("select * from tbl_empregos where Registro = '$cd'");
    $consultaStatus = $cn->query("select * from tbl_empregos group by Status");
    $consultaCargo = $cn->query("select Cargo from tbl_empregos where Registro='$cd' union select Cargo from tbl_empregos where Registro!='$cd'");
    $consultaArea = $cn->query("select Area from tbl_empregos where Registro='$cd' union select Area from tbl_empregos where Registro!='$cd'");
    $exibirReg = $consulta->fetch(PDO::FETCH_ASSOC);
?>
<div id="div" class="container">
<form class="form form-control-sm" name="frmCadastroProd" method="post" action="alterar.php?cd=<?php echo $cd?>">
        <div class="col-sm-3 offset-md-4">
            <h2>Alteração de registro</h2>
            <br>
            <label for="prod" class="form-label">Registro</label>
            <input type="text" value="<?php echo $exibirReg['Registro']; ?>" class="form-control" id="txtnome" name="txtnome">
        </div>
        <br>
        <div class="col-sm-3 offset-md-4">
            <label for="prod" class="form-label">Nome</label>
            <input type="text" value="<?php echo $exibirReg['Nome']; ?>" class="form-control" id="txtnome" name="txtnome">
        </div>
        <br>
        <div class="col-sm-3 offset-md-4">
            <label for="carg" class="form-label">Selecione o cargo</label>
            <select id="carg" name="carg" class="form-select">
            <?php while($exibirCargo=$consultaCargo->fetch(PDO::FETCH_ASSOC)){?>
            <option value="<?php echo $exibirCargo['Cargo'];?>"><?php echo $exibirCargo['Cargo']; ?></option>
            <?php } ?>
        </select>
        </div>
        <br>
        <div class="col-sm-3 offset-md-4">
            <label for="area" class="form-label">Selecione o area</label>
            <select id="area" name="area" class="form-select">
            <?php while($exibirArea=$consultaArea->fetch(PDO::FETCH_ASSOC)){?>
            <option value="<?php echo $exibirArea['Area'];?>"><?php echo $exibirArea['Area']; ?></option>
            <?php } ?>
        </select>
        </div>
        <br>
        <div class="col-sm-3 offset-md-4">
            <label for="prod" class="form-label">Salario</label>
            <input type="text" value="<?php echo $exibirReg['Salario']; ?>" class="form-control" id="txtsalario" name="txtsalario">
        </div>
        <br>
        <?php if($exibirReg['Status'] == "Ativo"){ ?>
        <div class="col-sm-3 offset-md-4">
            <label for="prod" class="form-label">Status</label><br>    
            <input class="form-check-input" type="radio" name="rdbStatus" value="Ativo" checked> Ativo
            <input class="form-check-input" type="radio" name="rdbStatus" value="Inativo" > Inativo
        </div>
        <?php } else {?>
        <div class="col-sm-3 offset-md-4">
            <label for="prod" class="form-label">Status</label><br>
            <input class="form-check-input" type="radio" name="rdbStatus" value="Ativo" > Ativo
            <input class="form-check-input" type="radio" name="rdbStatus" value="Inativo" checked> Inativo
        </div>
        <?php } ?>
        <br>
        <div class="col-sm-3 offset-md-4">
            <button type="submit" class="btn btn-primary">Alterar</button>
        </div>
</form>
</div>
</body>
</html>
