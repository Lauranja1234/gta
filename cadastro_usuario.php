<?php include('adm/conexao.php');?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastrar</title>
</head>
<body>
    <form action="" method="post">
      <b> Cadastro de Usuário </b>
        <br> <br>
        Nome: <br>
        <input type="text" name="nm_user" placeholder="digite um nome de usuário"> <br> <br>
        RG: <br>
        <input type="text" name="rg_user" placeholder="digite seu RG"> <br> <br>
        CPF: <br>
        <input type="text" name="cpf_user" placeholder="digite seu CPF"> <br> <br>
        CNPJ: <br>
        <input type="text" name="cnpj_user" placeholder="digite seu CNPJ"> <br> <br>
        Tel: <br>
        <input type="tel" name="tel_user" placeholder="digite seu telefone"> <br> <br>
        Email: <br>
        <input type="email" name="email_user" placeholder="digite seu email"> <br> <br>
        Senha: <br>
        <input type="password" name="senha_user" min=8 placeholder="digite uma senha"> <br> <br>
        Propósito: <br>
        <select name="type_user"> 
            <option value="desempregado">Procurando emprego</option>
            <option value="empregador">Oferecendo emprego</option>
        </select> <br> <br>
        Recado: <br>
        <textarea name="nm_recado"> </textarea> <br> <br>
        <input type="submit" class="btn btn-primary mt-3 btn-block" value="Cadastrar" name="Cadastrar">
    </form>
    <?php
        if($_POST){
            $Nome = $_POST['nm_user'];
            $RG = $_POST['rg_user'];
            $CPF = $_POST['cpf_user'];
            $CNPJ = $_POST['cnpj_user'];
            $Tel = $_POST['tel_user'];
            $Email = $_POST['email_user'];
            $Senha = $_POST['senha_user'];
            $Proposito = $_POST['type_user'];
            $Recado = $_POST['nm_recado'];
            $Registrado=false;
            $Users=ListarUser(null,null);
                while($u=$Users->fetch_array()){
                    if($Nome == "" ||  $Email == "" ||  $Senha == "" ){
                        alert('Você esqueceu de Preencher Algo');
                        $Registrado=true;
                    }
                    else if($Email==$u['email_user']){
                        alert('Email ja Cadastrado');
                        $Registrado=true;
                    }
                    else if($Nome==$u['nm_user']){
                        alert('Nome ja Cadastrado');
                        $Registrado=true;
                    }
                }
            if($Registrado==false){
                CadastrarUsuario($Nome, $Email, $Senha, $Proposito, $RG, $CPF, $CNPJ, $Tel, $Recado);
                header("location: foto.php?Photo=".$Email);
            }
        }
    ?>
</body>
</html>