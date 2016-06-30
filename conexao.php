<?php
try{
    $conexao = new PDO("mysql:host=localhost;dbname=exemplo", "root", "root");
}catch(Exception $e){
    echo "<h1>Ocorreu um erro ao conectar ao banco de dados!</h1>";
    echo $e->getMessage();die;
}