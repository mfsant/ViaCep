<?php
require_once('./ViaCep.php');
require_once('./Mysql.php');
$viaCep = new ViaCep();
$mysql = new Mysql();

if (isset($_POST['pesquisar'])) {

    $cep = $_POST['cep'];
    $endereco = (object) $viaCep->getEndereco($cep);
    $mysql->salvarCep($endereco);
    
} ?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumindo API via CEP</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <meta charset="utf-8">
    <h1>Pesquisar Endereço</h1>
    <form action="" method="post">
        <input type="text" name="cep">
        <button type="submit" name="pesquisar">Pesquisar CEP:</button>
        <h1>Resultado:</h1>
        <form>
            <label for="">logradouro</label>
            <input type="text" name="logradouro" 
            value="<?= isset($endereco->logradouro) ?  $endereco->logradouro : '' ?>">
            <br>
            <label for="">comprimento</label>
            <input type="text" name="comprimento" 
            value="<?= isset($endereco->comprimento) ? $endereco->comprimento : ''?>">
            <br>
            <label for="">bairro</label>
            <input type="text" name="bairro" 
            value="<?= isset($endereco->bairro)? $endereco->bairro : ''?>">
            <br>
            <label for="">localidade</label>
            <input type="text" name="localidade"
             value="<?= isset($endereco->localidade)? $endereco->localidade : '' ?>" readonly>
            <br>
            <label for="">UF</label>
            <input type="text" name="uf" 
            value="<?= isset($endereco->uf) ? $endereco->uf : ''?>"readonly>
            <br>
            <label for="">Ibge</label>
            <input type="text" name="ibge"  value="<?= isset($endereco->ibge) ? $endereco->ibge : '' ?>" readonly>
            <br>

        </form>
    </form>
    <div id="result"></div>
    <a href="./ViaCep.php"></a>
</body>
</html>
