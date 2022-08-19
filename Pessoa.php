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
$sql=$pdo->prepare("INSERT INTO administrador_tbl (username,senha, nome_administrador,morada_administrador, bi_administrador )
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
    //verificar se o username e senha existem
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




public function cadastrar_convidado( $telf_convidado, $nome_convidado,$email_convidado, $genero, $faixa_etaria, $sobrenome){
    global $pdo;
    
        //verificar se o convidado ja foi cadastrado
        $sql=$pdo->prepare("SELECT cod_convidado FROM convidado_tbl where email_convidado=:e");
        $sql->bindValue(":e", $email_convidado);
        $sql->execute();
        if($sql->rowcount()>0){
            return false;
    } else {
    //cadastrar
    $sql=$pdo->prepare("INSERT INTO convidado_tbl (telf_convidado,nome_convidado, email_convidado,genero, faixa_etaria, sobrenome )
        VALUES(:t,:n,:e,:g,:f,:s)");
    
    $sql->bindValue(":t", $telf_convidado);
    $sql->bindValue(":n", $nome_convidado);
    $sql->bindValue(":e", $email_convidado);
    $sql->bindValue(":g", $genero);
    $sql->bindValue(":f", $faixa_etaria);
    $sql->bindValue(":s", $sobrenome);
    $sql->execute();
    return true;
    }
    }
}
?>