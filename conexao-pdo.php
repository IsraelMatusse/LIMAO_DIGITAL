<?php
class conexao{
private $pdo;
public $msgerro="";
public function conectar( $nome,$host, $usuario, $senha)
{global $msgerro;
	global $pdo;
	try{
	$pdo= new PDO("mysql:dbname=".$nome. ";host=".$host, $usuario, $senha);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully";
}catch(PDOException $e){
$msgerro=$e->getmessage();
}
}
}