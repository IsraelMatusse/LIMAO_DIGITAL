<?php
require_once ('Pessoa.php');
$p= new Pessoa;
require_once ('conexao-pdo.php');
$c= new conexao;



if($_SERVER['REQUEST_METHOD']=='$_POST'){
    $nome_convidado=$_POST['nome'];
    $sobrenome=$_POST['sobrenome'];
    $email_convidado=$_POST['email'];
    $telf_convidado=$_POST['telefone'];
    $faixa_etaria=$_POST['faixa_etaria'];
    $genero=$_POST['genero'];

    $c->conectar("projecto_limao", "localhost", "root", "");
    if(!empty($username && $senha) ){ 
    if($p->cadastrar_convidado($telf_convidado, $nome_convidado,$email_convidado, $genero, $faixa_etaria, $sobrenome)){
        ?>
        <script>
            window.alert("CADASTRADO COM SUCESSO");
        </script>
        <?php
        }else{
            ?>
            <script>
                window.alert("ERRO, USUARIO JA EXISTE");
            </script>
            <?php
        }
        }else{
            ?>
            <script>
                window.alert("PREENCHA OS CAMPOS");
            </script>
        <?php    
      
         }     
}

?>