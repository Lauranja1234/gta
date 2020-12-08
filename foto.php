<?php include('adm/conexao.php');?>

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
        <div class="col-md-6 offset-md-3 col-sm-12">    
                <form action="" method="post">
                  <h2>Escolher foto de Perfil</h2>
                    <form action="foto.php?Photo=<?php echo $_GET['Photo'];?>" method="post" enctype="multipart/form-data">
                      <label style="color:#9e9e9e"for="conteudo">Enviar imagem:</label>
                      <input type="file" name="pic" accept="image/*"> 
                 <input type="submit" class="btn btn-primary mt-3 btn-block" value="finalizar" name="finalizar">
              </form>
         </div> 
    
</body>
</html>
<?php
if(isset($_GET['Photo'])){
    if($_FILES){
    header("Content-type: text/html; charset=utf-8");
        $user=ListarUser('UserEmail',$_GET['Photo']);
         $u=$user->fetch_array();

          $foto='img/User/'.$u['cd_user'].$_FILES['foto']['name'];
          $fotoTmp=$_FILES['foto']['tmp_name'];
          $destino='./'.$foto;
          if(move_uploaded_file($fotoTmp,$destino)){
              CadastrarFotos($foto,$u['cd_user']);
          }else{
              Alert('não foi possivel cadastrar a foto');
          }
    }
  }
?>

