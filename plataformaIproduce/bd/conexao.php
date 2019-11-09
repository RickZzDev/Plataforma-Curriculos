
<?php
  function conexaoMySql(){
    $host = (String) "localhost";//onde esta o banco
    $user = (String) "isrcar_dbprojeto";//usuario para entrar no banco 
    $password = (String) "iProduce";//senha para entrar no banco
    $database = (String) "isrcar_dbprojeto";//nome do banco
    
    $conexao = mysqli_connect($host,$user,$password,$database);
    return $conexao;
}

?>