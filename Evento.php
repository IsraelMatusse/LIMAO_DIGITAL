<?php
class Evento{
public function cadastrar_evento( $nome_evento, $local_evento,$data_evento, $nr_convidados){
global $pdo;

	//verificar se o evento ja foi cadastrado
	$sql=$pdo->prepare("SELECT cod_evento FROM evento_tbl where nome_evento=:n");
	$sql->bindValue(":n", $nome_evento);
	$sql->execute();
	if($sql->rowcount()>0){
		return false;
} else {
//cadastrar evento
$sql=$pdo->prepare("INSERT INTO evento_tbl (local_evento,nome_evento, data_evento,nr_convidados )
	VALUES(:l,:n,:d,:c)");

$sql->bindValue(":l", $local_evento);
$sql->bindValue(":n", $nome_evento);
$sql->bindValue(":d", $data_evento);
$sql->bindValue(":c", $nr_convidados);
$sql->execute();
return true;
}
}

public function listar_evento(){
	global $pdo;
	//consulta para listar eventos
	$sql=$pdo->prepare("SELECT *FROM evento_tbl");
	$sql->execute();
}
}