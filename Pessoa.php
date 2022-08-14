<?php
class Pessoa{

public function cadastrarAdministrador( $username, $senha,$nome_administrador, $morada_administrador, $bi_administrador){
global $pdo;

	//verificar se o usuario ja foi cadastrado
	$sql=$pdo->prepare("SELECT cod_administrador FROM administrador_tbl where username=:u");
	$sql->bindValue(":u", $username);
	$sql->execute();
	if($sql->rowcount()>0){
		return false;
} else {
//cadastrar
$sql=$pdo->prepare("INSERT INTO usuario (username,senha, nome_administrador,morada_administrador, bi_administrador )
	VALUES(:u,:s,:n,:m,:b)");

$sql->bindValue(":u", $username);
$sql->bindValue(":p", $password);
$sql->bindValue(":n", $nome_administrador);
$sql->bindValue(":m", $morada_administrador);
$sql->bindValue(":b", $bi_administrador);
$sql->execute();
return true;
}
}



public function login_administrador($username, $senha){
    global $pdo;
    //verificar se o email e senha existem
    $sql=$pdo->prepare("SELECT cod_administrador FROM administrador_tbl WHERE username=:u and senha=:s ");
    $sql->bindValue(":u", $username);
    $sql->bindValue(":s", $senha);
    $sql->execute();
    if($sql->rowcount()>0){
    $dados=$sql->fetch();
    session_start();
    $_SESSION['cod_administrador']=$dados['cod_administrador'];
    return true;
    }else{
    return false;
    }
    //entrar com sessao
    }
}
?>