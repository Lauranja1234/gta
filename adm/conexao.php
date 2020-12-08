<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "db_gta";

$conexao = new mysqli($servidor, $usuario, $senha, $banco); 
    $conexao->query("SET NAMES 'utf8'");
    $conexao->query('SET character_set_connection=utf8');  
    $conexao->query('SET character_set_client=utf8');
    $conexao->query('SET character_set_results=utf8');

if(!$conexao){ 
    echo "Erro de conexão: ".$conexao->error; 
}

//...............tb_user................//
function CadastrarUsuario($nm_user,$email_user,$senha_user,$type_user, $rg_user, $cpf_user, $cnpj_user, $tel_user, $nm_recado){
    $sql = ' INSERT INTO tb_user VALUES(null,"'.$nm_user.'", "'.$email_user.'", "'.$senha_user.'", "'.$type_user.'", '.$rg_user.', '.$cpf_user.', '.$cnpj_user.', '.$tel_user.', "'.$nm_recado.'")';
    $resultado = $GLOBALS['conexao']->query($sql);
    if(!$resultado) {
        alert("Houve um erro ao cadastrar usuário ".$GLOBALS['conexao']->error);
    }else{
        
    }
}

function ListarUser($type,$UserThing){
    if($type==''){
        $sql="SELECT * FROM tb_user;";
    }
    if($type=='UserEmail'){
        $sql="SELECT * FROM tb_user 
        where email_user='".$UserThing."';";
    }
    if($type=='Byid'){
        $sql="SELECT * FROM tb_user 
        where cd_user='".$UserThing."';";
    }
    $resultado = $GLOBALS['conexao']->query($sql);
    return $resultado;
}
//...............tb_servicos................//
function CadastrarServicos($nm_servicos,$desc_servicos){
    $sql = ' INSERT INTO tb_servicos VALUES(null,"'.$nm_servicos.'", "'.$desc_servicos.'")';
    $resultado = $GLOBALS['conexao']->query($sql);
    if($resultado) {
        alert("O serviço foi cadastrado!");
    }else{
        alert("Houve um erro ao cadastrar serviço ".$GLOBALS['conexao']->error);
    }
}
//..................Outro...................//
function alert($msg){
    echo'<script>
        alert("'.$msg.'");
    </script>';
}
//..................foto....................//
function CadastrarFotos($nm_foto,$id_user){
    $sql='INSERT INTO tb_fotouser VALUES(null,"'.$nm_foto.'",'.$id_user.');';
    $res=$GLOBALS['conexao']->query($sql);
    if($res){
      header("location: pagprincipal.php");
    }
    else{
        alert("Erro Ao Cadastrar foto");
    }
}
function ListarFoto($id){
    $sql='SELECT * FROM tb_fotouser 
    WHERE id_user='.$id.';';
    $res = $GLOBALS['conexao']->query($sql);
    return $res;
}
//.................postagem.................//
function CadastrarPostagem($Post_Input, $date, $id){
    $sql = 'INSERT INTO tb_post VALUES(null, "'.$Post_Input.'" ,"'.$date.'",null,'.$id.')';
    $res = $GLOBALS['conexao']->query($sql);
    header('location: pagprincipal.php?N='.$id);
}

function ListarPostagem($num){
    $sql = 'SELECT * FROM tb_post ORDER BY cd_post DESC LIMIT '.$num.',30';
    $res = $GLOBALS['conexao']->query($sql);
    return $res;
}
?>