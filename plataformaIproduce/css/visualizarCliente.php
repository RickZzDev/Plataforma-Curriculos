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
    <title>Profissional aceito</title>
    <link rel="stylesheet" href="css2/bootstrap.css">
    <link rel="stylesheet" href="css/styleVisualizarAceitos.css">
</head>
<body>
    <form method="get" action="visualizarCliente.php">
        <?php
                    if(isset($_GET['codigoAceitos'])){
                        $sql = 'select * from tblaceitos where codigo = '.$_GET['codigoAceitos'];
                    }
                   
                   
              
                    $select = mysqli_query($conexao,$sql);

                    if(mysqli_num_rows($select) < 1){

                        $sql = 'select * from tblpendentes where codigo = '.$_GET['codigoAceitos'];
                        $select = mysqli_query($conexao,$sql);
                    }
                    
            
            while($rsDados = mysqli_fetch_array($select)){
                

            
        ?>
    <div id="containerDados" class="center">
            <div id="nome_tel_cel_email">
                <div id="nome_tel">
                    <div class="caixas"><span class="titulos_caixa">Nome:</span> <?php $_SESSION['nome']=$rsDados['nome'];  echo($_SESSION['nome']);?></div>
                    <div class="caixas"><span class="titulos_caixa">Telefone:</span><?php $_SESSION['telefone']=$rsDados['telefone']; echo($_SESSION['telefone']);?></div>
                    <div class="caixas"><span class="titulos_caixa">Celular:</span><?php $_SESSION['celular']=$rsDados['celular']; echo($_SESSION['celular']);?></div>
                    <div class="caixas"><span class="titulos_caixa">Email:</span><?php $_SESSION['email']=$rsDados['email']; echo($_SESSION['email'])?></div>
                </div>
                <div id="caixa_end">
                    <div class="caixas"><span class="titulos_caixa">Cidade:</span><?php $_SESSION['cidade']=$rsDados['cidade']; echo($_SESSION['cidade'])?></div>
                    <div class="caixas"><span class="titulos_caixa">Estado:</span><?php $_SESSION['estado']=$rsDados['estado']; echo($_SESSION['estado'])?></div>
                    <div class="caixas"><span class="titulos_caixa">Cep:</span><?php $_SESSION['cep']=$rsDados['cep']; echo($_SESSION['cep'])?></div>
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
                            <div class="nome_idioma"><span class="titulos_caixa">Idioma: </span><?php $_SESSION['idioma']=$rsDados['idioma'];echo($_SESSION['idioma'])?></div>
                            <div class="nivel_idioma"><span class="titulos_caixa">Nivel: </span><?php $_SESSION['nivel_idioma']=$rsDados['nivel'];echo($_SESSION['nivel_idioma'])?></div>
                        </div>
                        <div class="idioma">
                            <div class="nome_idioma"><span class="titulos_caixa">Idioma: </span><?php $_SESSION['idioma_secundario'] = $rsDados['idioma_secundario'];echo($_SESSION['idioma_secundario'])?></div>
                            <div class="nivel_idioma"><span class="titulos_caixa">Nivel: </span><?php $_SESSION['nivel_secundario'] =$rsDados['nivel_secundario']; echo($_SESSION['nivel_secundario'])?></div>
                        </div>
                    </div>
            </div>
          
            <div class="caixa_dados center">
                    <div id="titulo_habilidades" class="center">Formacoes</div>
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
                    echo($_SESSION['link']); echo($_SESSION['codigo'] = $rsDados['codigo']);
                  
                    ?></div>
                    <div class="txtLinks center">Link:<?php $_SESSION['link2']=$rsDados['link2']; echo($_SESSION['link2'])?></div>
                    <div class="txtLinks center">Link:<?php $_SESSION['link3']=$rsDados['link3']; echo($_SESSION['link3'])?></div>
                    <div class="txtLinks center">Link:<?php $_SESSION['link4']=$rsDados['link4']; echo($_SESSION['link4'])?></div>



            </div>
              <?php }?>
            <?php 
                
        if(isset($_GET['btn_aceitar'])){
               
                echo($_SESSION['codigo']);
          
                $sql = "insert into tblaceitos(nome,telefone,celular,email,estado,cidade,cep,idioma,nivel,idioma_secundario,nivel_secundario,formacao,formacao2,formacao3,formacao4,habilidades,link,link2,link3,link4) values ('".$_SESSION['nome']."','".$_SESSION['telefone']."',
                '".$_SESSION['celular']."', '".$_SESSION['email']."','".$_SESSION['cidade']."','".$_SESSION['estado']."','".$_SESSION['cep']."',
                '".$_SESSION['habilidades']."','".$_SESSION['idioma']."','".$_SESSION['nivel_idioma']."','".$_SESSION['idioma_secundario']."',
                '".$_SESSION['nivel_secundario']."',
                         '".$_SESSION['formacao']."','".$_SESSION['formacao2']."','".$_SESSION['formacao3']."',
                         '".$_SESSION['formacao4']."','".$_SESSION['link']."','".$_SESSION['link2']."','".$_SESSION['link3']."',
                         '".$_SESSION['link4']."')";
                echo($sql);

                $insert = mysqli_query($conexao,$sql);
                
                $sqlDelete = "delete from tblpendentes where codigo =".$_SESSION['codigo'];

                echo($sqlDelete);
                $deleteFrom = mysqli_query($conexao,$sqlDelete);


                session_destroy();
               
                }
        
                if(isset($_GET['btn_deletar'])){
                    echo($_SESSION['codigo']);
                    $sql = "delete from tblpendentes where codigo =".$_SESSION['codigo'];

                    $deletar = mysqli_query($conexao,$sql);
                    echo($sql);
                }
                
                
                
            ?>

    </div>
    </form>
</body>
</html>