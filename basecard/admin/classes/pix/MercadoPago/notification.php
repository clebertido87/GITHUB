<?php
include('../../../config/conexao.php');
include('../../../config/tabs.php');

$collector_id = $_REQUEST['id'];

$curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/v1/payments/'.$collector_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'accept: application/json',
        'content-type: application/json',
        'Authorization: Bearer '.$access_token
    ),
    ));
    $response = curl_exec($curl);
    $resultado = json_decode($response);
    
curl_close($curl);


if($resultado->status == 'approved'){
    $update = "UPDATE vendas SET
        status		= '2'
    WHERE codigo_venda_mp='$collector_id'";
    mysqli_query($conexao, $update);
}




?>




