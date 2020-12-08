<?php include('adm/conexao.php');
    if(isset($_POST['btn-entrar'])):
        $erros = array();
        $email = mysqli_escape_string($conexao, $_POST['email_login']);
        $senha = mysqli_escape_string($conexao, $_POST['senha_login']);

            $sql = "SELECT * FROM tb_user WHERE email_user = '$email' and senha_user='$senha'";
            $resultado = $GLOBALS['conexao']->query($sql);
            $erros = [];
            if ($resultado->num_rows> 0 ):
                session_start();
                $user=ListarUser('UserEmail',$email);
                $u=$user->fetch_array();
                $_SESSION['id']=$u['cd_user'];
                header("location: pagprincipal.php");
            else:
                $erros[] = "Usuário inexistente";
            endif;  
        endif;
   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" href="img/logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guia de Trabalho Autônomo</title>
    <script src="Js/jquery-3.3.1.min.js"></script>
    <script src="Js/script.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-color: #111111;color:white;">
    <div class="MaskMenu">
          <div class="MenuBar">
            <img src="img/logo.png" class="MenuLogo">
            <div class="col-10 Guide">Guia de Trabalho Autônomo</div>
          </div>
        </div>
    
    <form action="index.php" method="post">
   
        <b style="margin-left:20%;"> Login de Usuário:  
    <?php
    if(!empty($erros)){
        foreach($erros as $erro){
            echo $erro;
        }
    };
    ?></b> 
        <br> <br>
        <div class="input-container" >
        <input id="email0" name="email_login" class="input input2" type="name" style="background-color: #111111;" pattern=".+" required />
          <label class="label" for="email0">E-mail</label> 
        
        </div><br>
         <div class="input-container">
        <input id="Senha0" name="senha_login" class="input input2" type="password" style="background-color: #111111; color:#fff;" pattern=".+" required />
          <label class="label" for="Senha0">Senha</label> 


        </div><br>
        <input href="#" class="btn2 btn-white2" name="btn-entrar" value="Login" type="submit" style="color:#444; margin-left:20%;">

    </form>

        <input type="button" onclick="buttonOpen();" href="#" class="btn2 btn-white2" value="Cadastrar-se" style="color:#444; margin-left:20%;"><br>


        </div>
        <div id="myModal" class="modal" >
            <div class="modalContent">
                <form action="index.php" method="post">

         <div class="input-container">
          
        <input style="background-color:#1e0737;color: #fff;" id="Nome" name="nm_user" class="input" type="name" pattern=".+" required />
          <label class="label" for="Nome">Nome</label> 
        </div><br>
              
        <a style="background-color:#1e0737;color: #9e9e9e;  margin-left:20%;">Propósito:</a><select style="background-color:#1e0737;color: #fff;" name="type_user" id="prop" class="option" > 
        <option value="desempregado">Procurando emprego</option>
        <option value="empregador">Oferecendo emprego</option>
        </select> <br>  <br>

         <div class="input-container">
        <input style="background-color:#1e0737;color: #fff;" id="email" name="email_user" class="input" type="name" pattern=".+" required />
          <label class="label" for="email">E-mail</label> 
        
        </div><br>
         <div class="input-container">
        <input style="background-color:#1e0737;color: #fff;" id="Senha" name="senha_user" class="input" type="password" pattern=".+" required />
          <label class="label" for="Senha">Senha</label> 

        </div><br>
         <div class="input-container">
        <input style="background-color:#1e0737;color: #fff;" id="RG" name="rg_user" class="input" value="" type="number" pattern=".+"required />
          <label class="label" for="RG">RG</label>

        </div><br>
         <div class="input-container">
        <input style="background-color:#1e0737;color: #fff;" id="CPF" name="cpf_user" class="input" value="" type="number" pattern=".+"required />
          <label class="label" for="CPF">CPF</label>

        </div><br>
         <div class="input-container">
        <input style="background-color:#1e0737;color: #fff;" id="CNPJ" name="cnpj_user" class="input" value="" type="number" pattern=".+"  disabled/>
          <label class="label" for="CNPJ">CNPJ</label>

        </div><br>
         <div class="input-container">
        <input style="background-color:#1e0737;color: #fff;" id="Telefone" name="tel_user" class="input" value="" type="number" pattern=".+" />
          <label class="label" for="Telefone">Telefone (opcional)</label>

        </div><br>
        <input id="Cadastrar" name="Cadas" class="btn-block btn btn-primary" type="submit"/>
        
    </form>
    <script>
        var select = document.getElementById('prop');
        select.addEventListener('change', propr);

        function propr() {
            var a = document.getElementById("prop");
                x=document.getElementById("RG");
                y=document.getElementById("CPF");
                z=document.getElementById("CNPJ");

            if (a.value != ("empregador")) {
                y.required=true;
                z.required=false;
                y.disabled =false;
                z.disabled =true;
            }
            else if(x.value != ("desempregado")){
                y.required=false;
                z.required=true;
                y.disabled =true;
                z.disabled =false;
            }
        }
        </script>
    <?php
        if(isset($_POST['Cadas'])){
            $Nome = $_POST['nm_user'];
            $RG = $_POST['rg_user'];
            $Proposito = $_POST['type_user'];
            if($Proposito=="desempregado"){
                $CNPJ="0";
                $CPF = $_POST['cpf_user'];
            }
            else{
                $CPF="0";
                $CNPJ = $_POST['cnpj_user'];
            }

            $Tel = $_POST['tel_user'];
            $Email = $_POST['email_user'];
            $Senha = $_POST['senha_user'];
            $Registrado=false;
            $Users=ListarUser(null,null);
                while($u=$Users->fetch_array()){
                    if($Email==$u['email_user']){
                        alert("Email ja Cadastrado");
                        $Registrado=true;
                    }
                }
            if($Registrado==false){
                CadastrarUsuario($Nome, $Email, $Senha, $Proposito, $RG, $CPF, $CNPJ, $Tel,null);
                $user2=ListarUser('UserEmail',$Email);
                $u2=$user2->fetch_array();
                echo $u2['cd_user'];
                  $foto0='img/User/Padron.png';
                  CadastrarFotos($foto0,$u2['cd_user']); 
                alert('Pronto Agora você já pode logar');
            }
        }
    ?>  
                    </div>
    </form>
</body>
</html>