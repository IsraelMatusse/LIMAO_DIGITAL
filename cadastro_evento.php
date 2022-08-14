<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <form action="" method="POST">
    <p><label for="nome do evento">Nome do evento</label>
    <input type="text" name="nome_evento" id=""></p>
    <p><label for="local do evento">Local do evento</label>
    <input type="text" name="local_evento" id=""></p>
    <p><label for="data do evento">Data do evento</label>
    <input type="date" name="data_evento" id=""></p>
    <p><label for="numero de convidados">Numero de convidados</label>
    <input type="number" name="nr_convidados" id=""></p>
    <p> <input type="submit" > 
    </p>
    </form>
</body>
</html>

<?php
require_once 'Evento.php';
$e= new Evento;

require_once 'conexao-pdo.php';
$c= new conexao;
 ?>


<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $nome_evento= addslashes($_POST['nome_evento']);
	$local_evento=addslashes($_POST['local_evento']);
	$data_evento=addslashes($_POST['data_evento']);
    $nr_convidados=addslashes($_POST['nr_convidados']);

$c->conectar("projecto_limao", "localhost", "root", "");
if (($nome_evento) && !empty($local_evento) && !empty($data_evento) && !empty($nr_convidados)){
    if($c->msgerro==""){
            if($e->cadastrar_evento($nome_evento, $local_evento,$data_evento, $nr_convidados)){
            	
			    ?>
                <script type="text/javascript">
                    window.alert("Evento cadastrado com sucesso");
                </script>
			   <?php 
            }else{
                ?>
                <script>
                    window.alert("evento ja cadastrado")
                </script>
          
         
      <?php  }
    }else{

        echo "erro:". $u->msgerro;
    }

}else{ ?>
    <script>
                    window.alert("Preencha todos os campos")
             </script>  
    <?php
}}
?>