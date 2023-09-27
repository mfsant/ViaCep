<?php

class ViaCep
{
    public function getEndereco($cep)
    {

        $ch = curl_init("https://viacep.com.br/ws/$cep/json/");
        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => 1,
        ]);
        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $response;
    }
}
