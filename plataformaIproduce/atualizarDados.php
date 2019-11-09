
<?php

        session_start();
    
    
        require_once('bd/conexao.php');

        $conexao = conexaoMySql();

      
        // for($i = 1;$i<38;$i++){
        //     echo("delete from tblusuarios where codigo=".$i.";");
        // }
        

        if(isset($_GET['codigoAceitos'])){


                $_SESSION['codigoLocal'] = $_GET['codigoAceitos'];
           
                $sql = "select * from tblaceitos where codigo=".$_SESSION['codigoLocal'];
                
                $rodaScript = mysqli_query($conexao,$sql);
                echo($sql);
                $rsConsultas = mysqli_fetch_array($rodaScript);

                
                
                
                //se for 1, ira indicar que o curriculo esta na tabela dos aceitos
        
                
        }elseif(isset($_GET['codigo'])){

                $_SESSION['codigoLocal']= $_GET['codigo'];
           
                $sql = "select * from tblpendentes where codigo=".$_SESSION['codigoLocal'];
                
                $rodaScript = mysqli_query($conexao,$sql);

                $rsConsultas = mysqli_fetch_array($rodaScript);
                //se for 2, ira indicar que o curriculo esta na tabela dos pendentes


            
        }

        if(isset($_GET['btnEnviar'])){
                // echo($_SESSION['codigoLocal'] . "TESTESTESTES");
             
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


                $confereCadastro = "select * from tblpendentes where email = '$email' ";

                echo($confereCadastro);

                $script = mysqli_query($conexao,$confereCadastro);

                if(mysqli_num_rows($script)==1){
                        $sql = "update tblpendentes set nome = '".$nome."', telefone = '".$telefone."', celular = '".$celular."', email = '".$email."', estado = '".$estado."', cidade = '".$cidade."', cep = '".$cep."', idioma = '".$idioma."', nivel = '".$nivel_idioma."',
                        idioma_secundario = '".$idioma2."', nivel_secundario = '".$nivel_idioma_secundario."', formacao = '".$formacao1."', formacao2 = '".$formacao2."',formacao3 = '".$formacao3."',formacao4 = '".$formacao4."', habilidades = '".$habilidades."', link = '".$link."',
                        link2 = '".$link2."', link3 = '".$link3."',link4 = '".$link4."' where codigo =".$_SESSION['codigoLocal'];   
                }else{
                        $sql = "update tblaceitos set nome = '".$nome."', telefone = '".$telefone."', celular = '".$celular."', email = '".$email."', estado = '".$estado."', cidade = '".$cidade."', cep = '".$cep."', idioma = '".$idioma."', nivel = '".$nivel_idioma."',
                        idioma_secundario = '".$idioma2."', nivel_secundario = '".$nivel_idioma_secundario."', formacao = '".$formacao1."', formacao2 = '".$formacao2."',formacao3 = '".$formacao3."',formacao4 = '".$formacao4."', habilidades = '".$habilidades."', link = '".$link."',
                        link2 = '".$link2."', link3 = '".$link3."',link4 = '".$link4."' where codigo =".$_SESSION['codigoLocal'];   
                }

                echo($sql);

 

                
                mysqli_query($conexao,$sql);

                $sqlUsuario = "update tblusuarios set usuario = '".$email."',senha = '".$senha."' where usuario =".$email;
                
                mysqli_query($conexao,$sqlUsuario);
                header('location: index.php');
                echo($sql);
        }



        

        
        
        $_SESSION['teste'] = $rsConsultas['codigo'];
        echo($_SESSION['teste']);
        

        
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
        <form method="GET" action="atualizarDados.php" name="frmCadastro">
            <div id="inputs">
                <div id="linha1inputs">

                        <div class="group">      
                                <input type="text" name="txtNome" value="<?=$rsConsultas['nome']?>" >
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
                                <input type="text" name="txtTelefone" value="<?=$rsConsultas['telefone']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Telefone</label>
                        </div>
                        <!-- <label for="lastName">telefone*</label>
                        <input type="tel" class="form-control" id="firstName" placeholder="Seu telefone" value="" required=""> -->
                </div> 
                <div class="caixa_input_celular center">
                        <div class="group">      
                                <input type="text" name="txtCelular" value="<?=$rsConsultas['celular']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Celular</label>
                        </div>
                </div>

                
                <div id="caixa_input_email" class="center">
                        <div class="group">      
                                <input type="text" name="txtEmail"  value="<?=$rsConsultas['email']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                        </div>
                </div>
                <div class="caixa_input_celular center">
                        <div class="group">      
                                <input type="text" name="txtSenha"value="<?=$rsConsultas['senha']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Senha</label>
                        </div>
                </div>
                <div id="caixa_input_estado" class="center">
                        <div class="group">      
                                <input type="text" name="txtEstado" value="<?=$rsConsultas['estado']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Estado</label>
                        </div>
                </div>
                <div id="caixa_input_cidade" class="center">
                        <div class="group">      
                                <input type="text" name="txtCidade" value="<?=$rsConsultas['cidade']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Cidade</label>
                        </div>
                </div>
                <div id="caixa_input_cep" class="center">
                        <div class="group">      
                                <input type="text" name="txtCep" value="<?=$rsConsultas['cep']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Cep</label>
                        </div>
                </div>
                <div class="caixa_input_idioma center">
                        <div class="group">      
                                <input type="text" name="txtIdioma" value="<?=$rsConsultas['idioma']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Idoma</label>
                        </div>
                </div>
                <div class="caixa_input_nivel center">
                       <select name="sltNivel" id="sltNivel" value="<?=$rsConsultas['nivel_idioma']?>">
                           <option>Não possuo idioma secundario</option>
                           <option>Basico</option>
                           <option>Intermediário</option>
                           <option>Avançado</option>
                       </select>
                </div>
                <div class="caixa_input_idioma center">
                        <div class="group">      
                                <input type="text" name="txtIdioma2" value="<?=$rsConsultas['idioma_secundario']?>" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Idoma 2</label>
                        </div>
                </div>
                <div class="caixa_input_nivel center">
                    
                       <select name="sltNivel2" id="sltNivel" value="<?=$rsConsultas['nivel_secundario']?>">
                           <option>Não possuo idioma secundario</option>
                           <option>Basico</option>
                           <option>Intermediário</option>
                           <option>Avançado</option>
                       </select>
                </div>
                <div class="caixa_input_formacao center">
                        <div class="group">      
                                <input type="text" name="txtFormacao1" value="<?=$rsConsultas['formacao']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Formação 1</label>
                        </div>
                </div>
                <div class="caixa_input_formacao center">
                        <div class="group">      
                                <input type="text" name="txtFormacao2" value="<?=$rsConsultas['formacao2']?>" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Formação 2</label>
                        </div>
                </div>
                <div class="caixa_input_formacao center">
                        <div class="group">      
                                <input type="text" name="txtFormacao3" value="<?=$rsConsultas['formacao3']?>" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Formação 3</label>
                        </div>
                </div>
                <div class="caixa_input_formacao center">
                        <div class="group">      
                                <input type="text" name="txtFormacao4" value="<?=$rsConsultas['formacao4']?>" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Formação 4</label>
                        </div>
                </div>
                <div id="caixa_input_habilidades" class="center">
                        <div class="group">      
                                <input type="text" name="txtHabilidades" value="<?=$rsConsultas['habilidades']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Habilidades</label>
                        </div>
                </div>
                <div class="caixa_input_link center">
                        <div class="group">      
                                <input type="text" name="txtLink1" value="<?=$rsConsultas['link']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Link 1</label>
                        </div>
                </div>
                <div class="caixa_input_link center">
                        <div class="group">      
                                <input type="text" name="txtLink2"  value="<?=$rsConsultas['link2']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Link 2</label>
                        </div>
                </div>
                <div class="caixa_input_link center">
                        <div class="group">      
                                <input type="text" name="txtLink3" value="<?=$rsConsultas['link3']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Link 3</label>
                        </div>
                </div>
                <div class="caixa_input_link center">
                        <div class="group">      
                                <input type="text" name="txtLink4" value="<?=$rsConsultas['link4']?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Link 4</label>
                        </div>
                </div>
            </div>  
            <div id="btnCadastrar">
                <input type="submit" name="btnEnviar" id="btnCadastro"value="Atualizar" onclick="return confirm('Seu cadastro sera avalizado por um dos nossos Adms, obrigado')">
            </div>
        </form>
        
    </div>
</body>
</html>