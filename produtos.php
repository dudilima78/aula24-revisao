<?php
include "conexao.php";
include "menu.php";

try{
    $sql = "SELECT * FROM tblprodutos";
    $qry = $con->query($sql);
    $produtos = $qry->fetchALL(PDO::FETCH_OBJ);

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

    <title>Produtos</title>
  </head>
  <body>
    
<div class="container">
<h1>Produtos cadastrados</h1>
<hr>

    <a href="frmproduto.php" class="btn btn-primary">Novo</a><br><br>
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr>
                <th>idproduto</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($produtos as $produto) { ?>
            <tr>
                <th><?php echo $produto->idproduto ?></th>
                <th><?php echo $produto->produto ?></th>
                <th><?php echo $produto->preco ?></th>
                <th><?php echo $produto->estoque ?></th>
                <td><a href="frmproduto.php?idproduto=<?php echo $produto->idproduto ?>" class="btn btn-warning">Editar</a></td>
                <td><a href="frmproduto.php?op=del&idproduto=<?php echo  $produto->idproduto ?>" class="btn btn-danger">Excluir</a></td>

               
            </tr>
            <?php } ?>
            </tbody>
           

    </table>
</div>

    <?php 
    
    include "rodape.php";
    ?>