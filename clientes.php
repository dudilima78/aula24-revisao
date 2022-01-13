<?php
include "conexao.php";
include "menu.php";

try{
    $sql = "SELECT * FROM tblclientes";
    $qry = $con->query($sql);
    $clientes = $qry->fetchALL(PDO::FETCH_OBJ);

    //echo "<pre>";
    //    print_r($clientes);
       
} catch(PDOException $e){
    echo $e->getMessage();
}


?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Clientes</title>
  </head>
  <body>
    
<div class="container">
<h1>Clientes cadastrados</h1>
<hr>

    <a href="frmcliente.php" class="btn btn-primary">Novo</a><br><br>
    
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr>
                <th>idcliente</th>
                <th>cliente</th>
                <th>E-mail</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($clientes as $cliente) { ?>
            <tr>
                <th><?php echo $cliente->idcliente ?></th>
                <th><?php echo $cliente->cliente ?></th>
                <th><?php echo $cliente->email ?></th>
                <td><a href="frmcliente.php?idcliente=<?php echo $cliente->idcliente ?>" class="btn btn-warning">Editar</a></td>
                <td><a href="frmcliente.php?op=del&idcliente=<?php echo  $cliente->idcliente ?>" class="btn btn-danger">Excluir</a></td>

               
            </tr>
            <?php } ?>
            </tbody>
           

    </table>
</div>

    <?php 
    
    include "rodape.php";
    ?>