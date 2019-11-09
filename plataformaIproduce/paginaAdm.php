<?php
    session_start();
    


        
    require_once('bd/conexao.php');

    $conexao = conexaoMySql();

    if(isset($_GET['codigo'])){
        
   
    }

   

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administração</title>
    <link rel="stylesheet" href="css2/bootstrap.css">
    <link rel="stylesheet" href="css/styleAdm.css">
</head>
<body>
    <div id="container" class="center">
        
        <div id="caixa_pendentes">
        <div id="titulo"><h1>Pendentes</h1></div>
            <form method="GET" action="paginaAdm.php">
            <?php
                 $sql = "select * from tblpendentes";
                 $select = mysqli_query($conexao,$sql);

                 while($dadosPendentes = mysqli_fetch_array($select)){

                 
             ?>
                <div class="item_pendente">
                    <div id="nome">Nome:
                        <?php echo($dadosPendentes['nome'])?>
                    </div>
                    <div id="estado">Estado: <?php echo($dadosPendentes['estado'])?></div>
                    <div id="celular">Telefone: <?php echo($dadosPendentes['telefone'])?></div>
                    <div id="opcoes">
                       <a href="visualizarDados.php?codigo=<?=$dadosPendentes['codigo']?>"> <div id="box_visualizar">visualizar</div></a>
                    </div>
                </div>
                <?php }?>
            </form>
        </div>
                    <!-- AREA DOS CURRICULOS QUE FORAM ACEITOS -->

                   
        <div id="itens_aceitos">
           <div id="titulo_aceitos"> <h1>Profissionais aceitos</h1> </div>
            <?php

                $sqlAceitos = "select * from tblaceitos";

                $select = mysqli_query($conexao,$sqlAceitos);

                

                while($retornoAceitos = mysqli_fetch_array($select)){

                
            ?>
                <div class="div_aceitos">
                   
                    <div>
                        <div id="nome">Nome:
                            <?php echo($retornoAceitos['nome'])?>
                        </div>
                        <div id="estado">Estado: <?php echo($retornoAceitos['estado'])?></div>
                        <div id="celular">Telefone: <?php echo($retornoAceitos['telefone'])?></div>
                        <div id="opcoes">
                        <a href="visualizarAceitos.php?codigoAceitos=<?=$retornoAceitos['codigo']?>"> <div id="box_visualizar">visualizar</div></a>
                        </div>

                    </div>
                </div>
                <?php } ?>
        </div>
    </div>
</body>
</html>