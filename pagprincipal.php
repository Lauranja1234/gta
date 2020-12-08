<?php include('adm/conexao.php');
session_start();
if(!isset($_SESSION['id'])){
  header("location: index.php");
}
?>
<!DOCTYPE HTML>
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
      <?php
        if($_POST){
            date_default_timezone_set('america/sao_paulo');
            $Postagem = $_POST['Post_Input'];
            $date=date('Y-m-d');
            CadastrarPostagem($Postagem,$date,$_SESSION['id']);
        }
      ?>
    <div class="container-fluid">
      <div class="row">
        <!--Menu Bar-->
          <div class="MaskMenu">
          <div class="MenuBar">
            <img src="img/logo.png" class="MenuLogo">
            <div class="col-10 Guide">Guia de Trabalho Autônomo</div>
            <div class="col-12"><input type="name" class="Search" name="Search"><button class="Search_Button">Pesquisar</button></div>
          </div>
        </div>
          <div class="MaskPerfil">
          <div class="Perfil_Part">
            <?php
            $foto=ListarFoto($_SESSION['id']);
            $f=$foto->fetch_array();
            echo'<img src="'.$f['nm_fotoUser'].'" class="PerfilPhoto mt-1">'  
              ?>
              <div class="Perfil_Info">
                  <a onclick="buttonPerfil();" href="#" class="btn btn-white mt-2">Perfil</a><br>
                  <div id="PerfilModal" class="modal">
                    <div class="modalContent">
                      <button onclick="ClosePerfil()" class="close">X</button>
                      Perfil do Usuário
                    </div>
                  </div>

                  <div class="Perfil_Post">
                  <a onclick="buttonOpen();" href="#" class="btn btn-white mt-2 mb-2">Postar</a><br>
                  <div id="myModal" class="modal">
                    <div class="modalContent">
                    <button onclick="Close()" class="close">X</button>
                      <form action=""method="post" name="posting">
                      <div class="input-container">
                      <input id="Post_Input" name="Post_Input" class="input input2" type="name" placeholder="Digite aqui o que está procurando..." style="margin-left:0%;background-color: #1e0737;width:95%;" pattern=".+" required />
                      </div>  
                        <br>
                      <input type="submit" href="#" class="btn2 btn-white2" value="Postar" style="color:#444; margin-left:-15px;"><br>
                        </form>
                    </div>
                  </div>
                </div>

                  <a onclick="buttonPrivacidade();" href="#" class="btn btn-white mt-2">Privacidade</a><br>
                  <div id="ModalPivacidade" class="modal">
                  <div class="modalContent">
                      <button onclick="ClosePrivacidade()" class="close">X</button>
                      Políticas de Privacidade: <br> <br>
	                    a
                    </div>
                  </div>
                  
                  <a onclick="buttonSobre();" href="#" class="btn btn-white mt-2">Sobre nós</a><br>
                  <div id="ModalSobre" class="modal">
                  <div class="modalContent">
                      <button onclick="CloseSobre()" class="close">X</button>
                      Sobre nós... <br> <br>
                      A plataforma GTA (Guia de Trabalho Autônomo), objetiva-se a auxiliar você, usuário, a encontrar de maneira prática e eficaz uma boa rede de contatos que pode te salvar em momentos cruciais; como a procura de uma nova oportunidade de trabalho, por exemplo. Aqui você pode buscar e oferecer vagas de trabalho de acordo com a sua especialização e interesse, basta procurar. Esperamos que tenha uma boa experiência! <br> <br> 
                      Att- Equipe GTA
                    </div>
                  </div>


              </div>
            </div>
          </div>

            <div class="Posts_Part">
                    <?php 
                    $Postagem = ListarPostagem(0);
                    while($p=$Postagem->fetch_array()){
                      $User=ListarUser('Byid',$p['id_user']);
                      $u=$User->fetch_array();
                      $foto=ListarFoto($p['id_user']);
                      $f=$foto->fetch_array();
                      echo'<div class="Post">
                            <div class="MiniPerfil">
                                <img src="'.$f['nm_fotoUser'].'" class="MiniPerfilPhoto"><p class="Perfil_Name"><strong>'.$u['nm_user'].'</strong></p>
                                <p class="Write_Part">'.$p['nm_post'].'
                                </p>
                            </div>
                        </div>';
                    }
                    ?>
            </div>
            
        </div>
      </div>
</body>
</html>
