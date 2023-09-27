<?php 
require_once("./index.php");
class Mysql
{
    public $conn;
    public $logradouro;
    public $complemento;
    public $bairro;
    public $localidade;
    public $uf;
    public $ibge;
    public function __construct(){

    $this->conn = new PDO("mysql:dbname=dbViaCep;host=localhost", "root", "");

    }


public function salvarCep ($cep)
{
    $stmt = $this->conn->prepare("INSERT INTO cep(logradouro , complemento , bairro , localidade , uf , ibge)
    VALUES ( ? , ? , ? , ? ,? , ?)");
    
    $stmt
    ->execute([$cep->logradouro,$cep->complemento,$cep->bairro,$cep->localidade,$cep->uf,$cep->ibge]);
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
    }   
}
