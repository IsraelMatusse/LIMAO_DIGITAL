<?php
require_once 'Pessoa.php';
$p= new Pessoa;
require_once 'conexao-pdo.php';
$c= new conexao;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        input{
            display: block;
            height: 20px;
            width: 150px;
            margin: 10px;
            border-radius: 30px;
            border: 1px solid black;
        
    
        }
        a{
            color: black;
            text-decoration: none;
        }
    
       a:hover{
        text-decoration: underline;
       }
    
        form{
            width: 420px;
            margin: 150px auto 0px auto;
            
        }
        input[type=submit]{
            background-color: palevioletred;
            border: none;
        }
       
        </style>
    
</head>
<body>
    <div  id="Login" >
      
        <form action="" method="POST">
              <h2>Login</h2>
    <p>
        <label for="username">username</label>
        <input type="text" name="username" id="tl" maxlength="30">
    </p>
    <p>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="tl" maxlength="10">
    </p> 
    <p>

<p>
    <input type="submit" value="Login" id="btn">
</p>
</form>
    </div>
    <p>
       
    </p>

<?php 
//include 'conexao.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
$senha=$_POST['senha'];
$username=$_POST['username'];

//$e="Dados invalidos, tente novamente";

    $c->conectar("projecto_limao", "localhost", "root", "");
    if(!empty($username && $senha) ){
        if($p->login_administrador($username,$senha)){
            ?>
            <script>
                window.alert("acesso concedido")
            </script>
            <?php
        }else{
            echo"Usuario o senha nao correspondentes, pretende se cadastrar?";}

        }else{
            echo "preencha os campos";
        }

}

?>