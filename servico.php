<?php include('adm/conexao.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>GTA</title>
</head>
<body>
    <form action="" method="POST">
      <b> Cadastro de Serviços </b>
        <br> <br>
        Serviço: <br>
        <input type="text" name="nm_servicos"> <br> <br>
        Descrição de serviço: <br>
        <textarea name="desc_servicos"> </textarea> <br> <br>
        <input type="submit" id="button" value="Cadastrar"> <br> <br> 
    </form>
    <?php
        if($_POST){
            $Servico = $_POST['nm_servicos'];
            $Descricao = $_POST['desc_servicos'];
            CadastrarServicos($Servico, $Descricao);
        }
    ?>
</body>
</html>