<?php 
    session_start();

    require_once('bd/conexao.php');

    $conexao = conexaoMySql();
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>visualizar Dados</title>
    <link rel="stylesheet" href="css2/bootstrap.css">
    <link rel="stylesheet" href="css/styleVisualizarAceitos.css">
</head>
<body>
<form method="get" action="visualizarUsuario.php">
        <?php

                    if(isset($_GET['usuario'])){
                                            
                        $sql = 'select * from tblpendentes where email = '.$_GET['usuario'];
                    }

                    if(isset($_GET['codigo'])){
                        
                        $sql = 'select * from tblpendentes where codigo = '.$_GET['codigo'];
                    }
                    if(isset($_GET['codigoAceitos'])){
                        $sql = 'select * from tblaceitos where codigo = '.$_GET['codigoAceitos'];
                    }
                   
                   
              
                    $select = mysqli_query($conexao,$sql);

            
                    
            
            while($rsDados = mysqli_fetch_array($select)){
                

            
        ?>
    <div id="containerDados" class="center">
            <div id="nome_tel_cel_email">
                <div id="nome_tel">
                    <div class="caixas"><span class="titulos_caixa">Nome:</span>&nbsp&nbsp&nbsp&nbsp&nbsp  <?php $_SESSION['nome']=$rsDados['nome'];  echo($_SESSION['nome']);?></div>
                    <div class="caixas"><span class="titulos_caixa">Telefone:</span>&nbsp<?php $_SESSION['telefone']=$rsDados['telefone']; echo($_SESSION['telefone']);?></div>
                    <div class="caixas"><span class="titulos_caixa">Celular:</span>&nbsp&nbsp&nbsp&nbsp<?php $_SESSION['celular']=$rsDados['celular']; echo($_SESSION['celular']);?></div>
                    <div class="caixas"><span class="titulos_caixa">Email:</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php $_SESSION['email']=$rsDados['email']; echo($_SESSION['email'])?></div>
                </div>
                <div id="caixa_end">
                    <div class="caixas"><span class="titulos_caixa">Cidade:</span>&nbsp<?php $_SESSION['cidade']=$rsDados['cidade']; echo($_SESSION['cidade'])?></div>
                    <div class="caixas"><span class="titulos_caixa">Estado:</span>&nbsp<?php $_SESSION['estado']=$rsDados['estado']; echo($_SESSION['estado'])?></div>
                    <div class="caixas"><span class="titulos_caixa">Cep:</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php $_SESSION['cep']=$rsDados['cep']; echo($_SESSION['cep'])?></div>
                </div>
            </div>
            <!-------- -->
            <div class="caixa_dados center">
                <div id="titulo_habilidades" class="center">Habilidades</div>
                <div id="txtHabilidades" class="center"><?php $_SESSION['habilidades']=$rsDados['habilidades']; echo($_SESSION['habilidades'])?></div>
            </div>
            <div class="caixa_dados center">
                    <div id="caixa_idioma" class="center">
                        <div id="titulo_idioma">Idiomas</div>
                        <div class="idioma">
                            <div class="nome_idioma"><span class="titulos_caixa">Idioma<br> </span><?php $_SESSION['idioma']=$rsDados['idioma'];echo($_SESSION['idioma'])?></div>
                            <div class="nivel_idioma"><span class="titulos_caixa">Nivel<br> </span><?php $_SESSION['nivel_idioma']=$rsDados['nivel'];echo($_SESSION['nivel_idioma'])?></div>
                        </div>
                        <div class="idioma">
                            <div class="nome_idioma"><span class="titulos_caixa">Idioma<br> </span><?php $_SESSION['idioma_secundario'] = $rsDados['idioma_secundario'];echo($_SESSION['idioma_secundario'])?></div>
                            <div class="nivel_idioma"><span class="titulos_caixa">Nivel<br> </span><?php $_SESSION['nivel_secundario'] =$rsDados['nivel_secundario']; echo($_SESSION['nivel_secundario'])?></div>
                        </div>
                    </div>
            </div>
          
            <div id="titulo_habilidades" class="center">Formacoes</div>
            <div class="caixa_dados center">
                   
                    <div class="caixas_formacoes">
                        <div class="titulo_formacoes">Formação 1</div>
                        <div class="txtFormacao center"><?php $_SESSION['formacao'] =$rsDados['formacao']; echo($_SESSION['formacao'])?></div>
                    </div>
                    <div class="caixas_formacoes">
                        <div class="titulo_formacoes">Formação 2</div>
                         <div class="txtFormacao center"><?php $_SESSION['formacao2'] =$rsDados['formacao2']; echo($_SESSION['formacao2'])?></div>
                    </div>
                    <div class="caixas_formacoes">
                        <div class="titulo_formacoes">
                        Formação 3</div>
                         <div class="txtFormacao center"><?php $_SESSION['formacao3'] =$rsDados['formacao3']; echo($_SESSION['formacao3'])?></div>
                    </div>
                    <div class="caixas_formacoes">
                        <div class="titulo_formacoes">
                        Formação 4</div>
                         <div class="txtFormacao center"><?php $_SESSION['formacao4'] =$rsDados['formacao4']; echo($_SESSION['formacao4'])?></div>
                    </div>
            </div>
            <div class="caixa_dados center">
                    <div id="titulo_habilidades" class="center">Links</div>
                    <div class="txtLinks center">Link:<?php $_SESSION['link']=$rsDados['link'];
                    echo($_SESSION['link']);
                    //  echo($_SESSION['codigo'] = $rsDados['codigo']);
                    // echo($rsDados['nome']."--------");
                    ?></div>
                    <div class="txtLinks center">Link:<?php $_SESSION['link2']=$rsDados['link2']; echo($_SESSION['link2'])?></div>
                    <div class="txtLinks center">Link:<?php $_SESSION['link3']=$rsDados['link3']; echo($_SESSION['link3'])?></div>
                    <div class="txtLinks center">Link:<?php $_SESSION['link4']=$rsDados['link4']; echo($_SESSION['link4'])?></div>



            </div>
            <div id="aceitar_deletar" class="center">
                <input type="submit" id="aprovar" name="btn_atualizar" value="Atualizar"  onclick="return confirm('Deseja realmente aceitar esse registro?');">

                
            </div>
              <?php
            
                $_SESSION['codigo'] = $rsDados['codigo'];
                
            }?>
            <?php 
             

                
        if(isset($_GET['btn_atualizar'])){

                $confereExistencia = "select email from tblpendentes where email = '$_SESSION[email]'";
                echo($confereExistencia);
                $script = mysqli_query($conexao,$confereExistencia);

                if(mysqli_num_rows($script)==1){
                    header('location: atualizarDados.php?codigo='.$_SESSION['codigo']);
                }else{
                    header('location: atualizarDados.php?codigoAceitos='.$_SESSION['codigo']);
                }


                
               
                }
   
                
                
                
            ?>

    </div>
    </form>
</body>
</html>