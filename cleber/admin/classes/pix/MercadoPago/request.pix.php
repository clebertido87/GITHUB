<?php if($_GET['status'] <> '2'){ ?>
<?php if($_GET['codigo'] <> '' && $_GET['preco'] <> ''){ ?>
<?php
$sql_venda = mysqli_query($conexao,"SELECT * FROM vendas WHERE codigo = '".$_GET['codigo']."'") or die("Erro");
$resultado_dados_venda = mysqli_fetch_assoc($sql_venda);

if($resultado_dados_venda['codigo_venda_mp'] == ''){
    if($_GET['descricao'] == ''){
        $id_externo = 'sem informacoes';
    } else {
        $id_externo = $_GET['descricao'];
    }
    $nome_user  = $_GET['nome'];
    if($nome_user <> ''){
        $Nome       = substr($nome_user, 0, strpos($nome_user, ' '));
        $sobrenome  = trim(str_replace($Nome, "", $nome_user));
    } else {
        $Nome       = "Test";
        $sobrenome  = "User";
    }
    $curl = curl_init();

    $dados["transaction_amount"]                    = floatval($_GET['preco']);
    $dados["description"]                           = $id_externo;
    $dados["external_reference"]                    = $resultado_dados_venda['id'];
    $dados["payment_method_id"]                     = "pix";
    $dados["notification_url"]                      = "https://".$host."/cleber/admin/classes/pix/MercadoPago/notification.php";
    if($_GET['email'] <> ''){
        $dados["payer"]["email"]                    = $_GET['email'];
    } else {
        $dados["payer"]["email"]                    = "gerarpix@gmail.com";
    }
    $dados["payer"]["first_name"]                   = $Nome;
    $dados["payer"]["last_name"]                    = $sobrenome;

    // Verifique se o CPF foi passado via GET e defina-o se existir
    if(isset($_GET['cpf']) && $_GET['cpf'] <> ''){
        $dados["payer"]["identification"]["type"]       = "CPF";
        $dados["payer"]["identification"]["number"]     = $_GET['cpf'];
    }

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dados),
    CURLOPT_HTTPHEADER => array(
        'accept: application/json',
        'content-type: application/json',
        'Authorization: Bearer '.$access_token
    ),
    ));
    $response = curl_exec($curl);
    $resultado = json_decode($response);
    curl_close($curl);

    $sqlVenda="INSERT INTO vendas(id_externo, valor, linha_digitavel, url_pay, data, codigo_data, codigo, status, codigo_venda_mp) VALUES('".$id_externo."', '".$_GET['preco']."', '".$resultado->point_of_interaction->transaction_data->qr_code."', '".$resultado->point_of_interaction->transaction_data->qr_code_base64."', '".date('d/m/Y H:i:s')."', '".strtotime(date('Y-m-d'))."', '".$_GET['codigo']."', '1', '".$resultado->id."')";
    mysqli_query($conexao, $sqlVenda);

    $imagemQrcode   = $resultado->point_of_interaction->transaction_data->qr_code_base64;
    $linhaQrcode    = $resultado->point_of_interaction->transaction_data->qr_code;

    $preco          = $_GET['preco'];
} else {
    $imagemQrcode   = $resultado_dados_venda['url_pay'];
    $linhaQrcode    = $resultado_dados_venda['linha_digitavel'];

    $preco          = floatval($resultado_dados_venda['valor']);
}
?>
<!-- Restante do seu c車digo -->



<div class="text-center" style="border: 1px solid black; border-radius: 5px; padding: 10px; margin: 4px 0 0 0;">
    <div class="col-lg-12"><img src="https://<?php echo $host;?>/cleber/admin/media/pix.png" style="width: 100%;"></div><br>
   <div style="text-center" class="col-lg-12"><b>Total: R$ <?php echo $preco;?></b></div>
    <div class="text-center">
        <img style='text-align: center; width:300px;height:300px;' id='base64image'
       src='data:image/jpeg;base64, <?php echo $imagemQrcode;?>' />
    </div>
    <div class="col-lg-12">
        <b>Copie:</b>
        <textarea class="form-control" style="height: 160px;" readonly><?php echo $linhaQrcode;?></textarea>
    </div>
    <div class="col-lg-12">
        <br>
       <button style="width:100%" id="copiarCodigoPix" class="btn btn-primary">Copiar Codigo PIX</button>
        <br>
        <a href="https://<?php echo $host;?>/cleber/admin/control.php?url=1" class="btn btn-success" style="width: 100%;">Voltar</a>
    </div>
    
    
     <div class="container">
        <h6>Enviar Codigo PIX</h6>
        <form id="pixForm">
            <div class="form-group">
                <label for="whatsappNumber">Numero de WhatsApp:</label>
                <input type="text" class="form-control" id="whatsappNumber" placeholder="Insira o numero de WhatsApp">
            </div>
            <button type="button" class="btn btn-primary" id="sendToWhatsApp">Enviar para WhatsApp</button>
        </form>
    </div>
    
</div>




<?php } else { ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://<?php echo $host;?>/cleber/admin/control.php?url=1'>
<?php } ?>

<?php } else { ?>
    <?php
        $sql_venda = mysqli_query($conexao,"SELECT * FROM vendas WHERE codigo = '".$_GET['codigo']."'") or die("Erro");
        $resultado_dados_venda = mysqli_fetch_assoc($sql_venda);
        
        $preco          = number_format($resultado_dados_venda['valor'], 2, '.', '');
    ?>
    <div class="row" style="border: 1px solid black; border-radius: 5px; padding: 10px; margin: 4px 0 0 0;">
        <div class="col-lg-12"><b>Total: R$ <?php echo $preco;?></b></div>
        <div class="col-lg-12">
            <img style='display:block; width:100%;' 
           src='https://<?php echo $host;?>/cleber/admin/media/aprovado.png' />
        </div>
        <div class="col-lg-12">
            <h4>Pagamento Aprovado :)</h4>
            <hr>
            <a href="https://<?php echo $host;?>/cleber/admin/control.php?url=1" class="btn btn-success" style="width: 100%;">Gerar nova venda</a>
        </div>
    </div>
<?php } ?>

 <script>
           document.getElementById("copiarCodigoPix").addEventListener("click", function(event) {
        event.preventDefault(); // Evita o comportamento padr??o do link (mudar de p芍gina)

        var codigoPix = "<?php echo $linhaQrcode; ?>";
        var codigoPixTextArea = document.createElement("textarea");
        codigoPixTextArea.value = codigoPix;
        document.body.appendChild(codigoPixTextArea);
        codigoPixTextArea.select();
        document.execCommand('copy');
        document.body.removeChild(codigoPixTextArea);
        alert("C車digo PIX copiado para a 芍rea de transfer那ncia!");
        document.getElementById("copiarCodigoPix").disabled = true;
    });
        </script>
        
         <script>
          document.getElementById("sendToWhatsApp").addEventListener("click", function() {
    // Obtenha o c車digo PIX (substitua isso pela l車gica para obter o c車digo PIX)
    var codigoPix = "<?php echo $linhaQrcode;?>";

    // Obtenha o n迆mero de WhatsApp inserido pelo usu芍rio
    var whatsappNumber = document.getElementById("whatsappNumber").value;

    // Verifique se o n迆mero de WhatsApp 谷 v芍lido
    if (whatsappNumber.trim() === "") {
        alert("Por favor, insira um n迆mero de WhatsApp v芍lido.");
    } else {
        // Construa o link do WhatsApp com a mensagem (c車digo PIX)
        var whatsappLink = "https://api.whatsapp.com/send?phone=+55" + whatsappNumber + "&text=" + codigoPix;

        // Abra o link em uma nova aba
        window.open(whatsappLink, '_blank');
    }
});
    </script>
    
    





