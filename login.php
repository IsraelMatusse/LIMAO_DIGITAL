<?php
session_start();
$cod_administrador=$_SESSION['cod_administrador'];
require_once 'Pessoa.php';
$p= new Pessoa;
require_once 'conexao-pdo.php';
$c= new conexao;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Limão Digital - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-event-3.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">   
							</div>
							<div class="col-lg-6 ">
                                <div class="p-5">
                                    <div class="text-center logo-center">
                                        <a  href="#"><img class="logo-login" src="img/logo-limao.png"></a>
                                    </div>
									<i class="texto-marca">SOMOS A MARCA MAIS PODEROSA </i>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 text-log">LOGIN</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="senha" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Senha">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Lembrar de mim</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block btn-colo" type="submit">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <!-- INFORMAÇÕES EXCLUSIVAS -->
                                    <div class="text-center">
										<p>Sistema exclusivo para clientes da Limão Digital. Para mais informações
                                        <a class="" href="#">Clique aqui</a></p>
                                    </div>
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php 
//include 'conexao.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
$senha=$_POST['senha'];
$username=$_POST['username'];

//$e="Dados invalidos, tente novamente";

    $c->conectar("projecto_limao", "localhost", "root", "");
  
    if(!empty($username && $senha) ){ 
    if($p->login_administrador($username, $senha)){
        header('location: eventos.html');
      
        }else{
            ?>
            <script>
                window.alert("senha ou username errados");
            </script>
            <?php
        }
        }else{
            ?>
            <script>
                window.alert("preencha os campos");
            </script>
        <?php    
      
         }     
}

?>