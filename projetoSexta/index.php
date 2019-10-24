<?php

    require_once('bd/conexao.php');

    $conexao = conexaoMySql();

    $sql = "select * from tblusuarios";

    $select = mysqli_query($conexao,$sql);

    // for($i=86;$i<=92;$i++){
    //   echo("delete from tblpendentes where codigo=".$i.";");
    // }

    @$usuario = mysqli_escape_string($conexao,$_GET['txtAdm']);
    @$senha = mysqli_escape_string($conexao,$_GET['txtSenha']);
    @$btnLogar = $_GET['btnLogar'];
  

    if(isset($_GET['btnLogar'])){

      
        //pega o campo de usuario com o usuario digitado como referencia
        $sql = "select usuario from tblusuarios where usuario = '$usuario'";
        
        $script = mysqli_query($conexao,$sql);
        //caso o campo exista, entrara no if
        if(mysqli_num_rows($script) > 0){
          //roda o script que pega o usuario a senha e o tipo no banco
          @$sql = "select usuario from tblusuarios where usuario = '$usuario' and senha = '$senha' and tipo = 'adm'";
         
          $script = mysqli_query($conexao,$sql);
          //se houver campos correspondentes, redirecionara para a pagina
          if(mysqli_num_rows($script) == 1){
            $dados = mysqli_fetch_array($script);
            header('location: paginaAdm.php');
          }else{
            $sql = "select usuario from tblusuarios where usuario = '$usuario' and senha = '$senha' and tipo = 'cliente'";
            echo($sql);
            $script = mysqli_query($conexao,$sql);
            if(mysqli_num_rows($script) == 1){
                $dados = mysqli_fetch_array($script);
                header('location: paginaCliente.php');
            }
          }
          
          $sqlUsuario = "select usuario from tblusuarios where usuario = '$usuario' and senha = '$senha' and tipo = 'usu'";
          $rodaNoBanco = mysqli_query($conexao,$sqlUsuario);

          $consulta = mysqli_fetch_array($rodaNoBanco);

          // echo($consulta['usuario'] . "usuario---");
          // echo($sqlUsuario);
          if(mysqli_num_rows($rodaNoBanco) == 1){
            $selectCodigo = "select codigo from tblpendentes where email= '$usuario' ";
            echo("----".$selectCodigo."-----");
            $rodaNoBanco = mysqli_query($conexao,$selectCodigo);
            echo("ENTROU");
            $rsConsulta = mysqli_fetch_array($rodaNoBanco);
            echo($rsConsulta['codigo']."tetete");


            header("location: visualizarUsuario.php?codigo=".$rsConsulta['codigo']);

            // echo("------".$rsConsulta['codigo']);
          }
        }

    }

    




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log-In</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css2/bootstrap.css">
    <style>
      body{
  

   
       
      }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      a:link{
        text-decoration:none;
        
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    
    </style>
</head>
<body>
  <form method="GET" action="index.php">
    <div id="background">
        <div id="container_login" class="center">
            <div id="inputs_login">
                    <form action="index.html" method="GET">
                            <h1 class="h3 mb-3 font-weight-normal">Faça seu login</h1>
                        <input type="email" name="txtAdm" id="inputEmail" class="form-control" placeholder="Email address" autofocus="">
                        <input type="password" name="txtSenha" id="inputPassword" class="form-control" placeholder="Password" > 
            </div>
            <div id="formas_login">   
                    <button id="btnAcessar" name="btnLogar" type="submit"><a>Acessar</a></button>
                    
              </div>

            <div id="btnRegistrar-se">   
                    <button id="btnRegistrar" type="button"><a href="cadastro.php" style="color:#fff;">Registrar-se</a></button>
                        
            </div>

    
        </div>
      </div>
    </form>
</body>
</html>