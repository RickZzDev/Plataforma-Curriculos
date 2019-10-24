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
    <title>Pagina Cliente</title>
    <link rel="stylesheet" href="css2/bootstrap.css">
    <link rel="stylesheet" href="css/styleCliente.css">
</head>
<body>

         <!-- AREA DOS CURRICULOS QUE FORAM ACEITOS -->
        <form method="GET" action="visualizarCliente.php">
        <div id="superContainer" class="center"> 
        <div id="areaBemVindo">
            <div class="container center">
                <div id="textos_caixa"><h1 >Seja Bem vindo</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                      a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                       but also the leap into electronic typesetting,
                     and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            </div>
        </div>       
           
                <?php

                    $sqlAceitos = "select * from tblaceitos";

                    $select = mysqli_query($conexao,$sqlAceitos);

                    

                    while($retornoAceitos = mysqli_fetch_array($select)){

                    
                ?>
                
                <div id="container_centro" class="center">
                    <div class="div_aceitos center">
                        <div>
                            <div id="nome">Nome:
                                <?php echo($retornoAceitos['nome'])?>
                            </div>
                            <div id="estado">Estado: <?php echo($retornoAceitos['estado'])?></div>
                            <div id="celular">Telefone: <?php echo($retornoAceitos['telefone'])?></div>
                            <div id="opcoes">
                            <a href="visualizarCliente.php?codigoAceitos=<?=$retornoAceitos['codigo']?>"> <div id="box_visualizar">visualizar</div></a>
                            </div>

                        </div>
                    </div>
                    <?php } ?>
                </div> 
            </div>
        </div>
   
    </form>  
</body>
</html>