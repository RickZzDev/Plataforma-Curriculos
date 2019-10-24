
<?php

        session_start();
    
    
        require_once('bd/conexao.php');

        $conexao = conexaoMySql();

        // for($i =43;$i<=62;$i++){
        //         echo("delete from tblpendentes where codigo =".$i.";");
        // }
        
        if(isset($_GET['btnEnviar'])){
                $nome = $_GET['txtNome'];
                $telefone = $_GET['txtTelefone'];
                $celular = $_GET['txtCelular'];
                $email = $_GET['txtEmail'];
                $estado = $_GET['txtEstado'];
                $cidade = $_GET['txtCidade'];
                $cep = $_GET['txtCep'];
                $idioma = $_GET['txtIdioma'];
                $nivel_idioma = $_GET['sltNivel'];
                $idioma2 = $_GET['txtIdioma2'];
                $nivel_idioma_secundario = $_GET['sltNivel2'];
                $formacao1 =$_GET['txtFormacao1'];
                $formacao2 =$_GET['txtFormacao2'];
                $formacao3 =$_GET['txtFormacao3'];
                $formacao4 =$_GET['txtFormacao4'];
                $habilidades = $_GET['txtHabilidades'];
                $link1 = $_GET['txtLink1'];
                $link2 = $_GET['txtLink2'];
                $link3 = $_GET['txtLink3'];
                $link4 = $_GET['txtLink4'];
                 
                $senha = $_GET['txtSenha'];


                $sql = "insert into tblpendentes (nome,telefone,celular,email,estado,cidade,cep,idioma,nivel,idioma_secundario,nivel_secundario,formacao,formacao2,formacao3,formacao4,habilidades,link,link2,link3,link4) values ('".$nome."','".$telefone."','".$celular."','".$email."','".$estado."','".$cidade."','".$cep."','".$idioma."','".$nivel_idioma."','".$idioma2."','".$nivel_idioma_secundario."','".$formacao1."',
                '".$formacao2."','".$formacao3."','".$formacao4."','".$habilidades."','".$link1."','".$link2."','".$link3."','".$link4."')";

              
                mysqli_query($conexao,$sql);

                $sqlUsuario = "insert into tblusuarios (usuario,senha,tipo) values ('".$email."','".$senha."','usu')";
                
                mysqli_query($conexao,$sqlUsuario);

                $sqlCodigoPendente = "select codigo from tblpendentes where email = '$email' ";

             
                $rodaScript = mysqli_query($conexao,$sqlCodigoPendente);

                $teste = mysqli_fetch_array($rodaScript);
               
                // echo($teste['codigo']);
                // echo('localhost/projetoSexta/visualizarUsuario.php?codigo='.$teste['codigo']);
                // header('location: https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=localhost/projetoSexta/visualizarCliente.php?codigoAceitos='.$teste['codigo']);
                header('location: index.php');
                // echo($sql);
        }




        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document1.</title>
    <link rel="stylesheet" href="css2/bootstrap.css">
    <link rel="stylesheet" href="css/styleCadastro.css">
    <script>
        // javascript:alert('Email enviado com Sucesso!');
        // javascript:window.location='cadastro.php';
    </script>
</head>
<body>
  
    <div id="containerForm" class="center">
        <div id="titulo" class="center">
            <div id="div_titulo" class="center"><h1>Cadastro</h1></div>
        </div>
        <form method="GET" action="cadastro.php" name="frmCadastro">
            <div id="inputs">
                <div id="linha1inputs">

                        <div class="group">      
                                <input type="text" name="txtNome" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nome</label>
                        </div>
                        <!-- <div class="caixa_input_nome">
                            <label for="lastName">Nome*</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Seu nome" value="" required="">
                        </div> -->

                </div>
                <div class="caixa_input_telefone center">
                        <div class="group">      
                                <input type="text" name="txtTelefone" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Telefone</label>
                        </div>
                        <!-- <label for="lastName">telefone*</label>
                        <input type="tel" class="form-control" id="firstName" placeholder="Seu telefone" value="" required=""> -->
                </div> 
                <div class="caixa_input_celular center">
                        <div class="group">      
                                <input type="text" name="txtCelular" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Celular</label>
                        </div>
                </div>

                
                <div id="caixa_input_email" class="center">
                        <div class="group">      
                                <input type="text" name="txtEmail"  required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                        </div>
                </div>
                <div class="caixa_input_celular center">
                        <div class="group">      
                                <input type="text" name="txtSenha" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Senha</label>
                        </div>
                </div>
                <div id="caixa_input_estado" class="center">
                        <div class="group">      
                                <input type="text" name="txtEstado" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Estado</label>
                        </div>
                </div>
                <div id="caixa_input_cidade" class="center">
                        <div class="group">      
                                <input type="text" name="txtCidade" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Cidade</label>
                        </div>
                </div>
                <div id="caixa_input_cep" class="center">
                        <div class="group">      
                                <input type="text" name="txtCep" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Cep</label>
                        </div>
                </div>
                <div class="caixa_input_idioma center">
                        <div class="group">      
                                <input type="text" name="txtIdioma" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Idoma</label>
                        </div>
                </div>
                <div class="caixa_input_nivel center">
                       <select name="sltNivel" id="sltNivel">
                           <option>Não possuo idioma secundario</option>
                           <option>Basico</option>
                           <option>Intermediário</option>
                           <option>Avançado</option>
                       </select>
                </div>
                <div class="caixa_input_idioma center">
                        <div class="group">      
                                <input type="text" name="txtIdioma2" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Idoma 2</label>
                        </div>
                </div>
                <div class="caixa_input_nivel center">
                    
                       <select name="sltNivel2" id="sltNivel">
                           <option>Não possuo idioma secundario</option>
                           <option>Basico</option>
                           <option>Intermediário</option>
                           <option>Avançado</option>
                       </select>
                </div>
                <div class="caixa_input_formacao center">
                        <div class="group">      
                                <input type="text" name="txtFormacao1" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Formação 1</label>
                        </div>
                </div>
                <div class="caixa_input_formacao center">
                        <div class="group">      
                                <input type="text" name="txtFormacao2"  >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Formação 2</label>
                        </div>
                </div>
                <div class="caixa_input_formacao center">
                        <div class="group">      
                                <input type="text" name="txtFormacao3"  >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Formação 3</label>
                        </div>
                </div>
                <div class="caixa_input_formacao center">
                        <div class="group">      
                                <input type="text" name="txtFormacao4"  >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Formação 4</label>
                        </div>
                </div>
                <div id="caixa_input_habilidades" class="center">
                        <div class="group">      
                                <input type="text" name="txtHabilidades" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Habilidades</label>
                        </div>
                </div>
                <div class="caixa_input_link center">
                        <div class="group">      
                                <input type="text" name="txtLink1">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Link 1</label>
                        </div>
                </div>
                <div class="caixa_input_link center">
                        <div class="group">      
                                <input type="text" name="txtLink2" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Link 2</label>
                        </div>
                </div>
                <div class="caixa_input_link center">
                        <div class="group">      
                                <input type="text" name="txtLink3">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Link 3</label>
                        </div>
                </div>
                <div class="caixa_input_link center">
                        <div class="group">      
                                <input type="text" name="txtLink4" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Link 4</label>
                        </div>
                </div>
            </div>  
            <div id="btnCadastrar">
                <input type="submit" name="btnEnviar" id="btnCadastro"value="Cadastrar" onclick="return confirm('Seu cadastro sera avalizado por um dos nossos Adms, obrigado')">
            </div>
        </form>
        
    </div>
</body>
</html>