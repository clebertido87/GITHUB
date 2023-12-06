<?php include('head.php');?>
<!-- Modal -->
<?php include('blocos/modal_filtro.php');?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                
                <?php
                    $sql_venda = mysqli_query($conexao,"SELECT * FROM vendas WHERE codigo = '".$_GET['codigo']."'") or die("Erro");
                    $resultado_dados_venda = mysqli_fetch_assoc($sql_venda);
                        
                    $preco          = number_format($resultado_dados_venda['valor'], 2, '.', '');
                        
                    $imagemQrcode   = $resultado_dados_venda['url_pay'];
                    $linhaQrcode    = $resultado_dados_venda['linha_digitavel'];
                        
                    if($resultado_dados_venda['status'] == '1'){
                ?>
                    <div class="text-center" style="border: 1px solid black; border-radius: 5px; padding: 10px; margin: 4px 0 0 0;">
                        <div class="col-lg-12"><img src="https://<?php echo $host;?>/admin/media/pix.png" style="width: 100%;"></div><br>
                        <div class="col-lg-12"><b>Total: R$ <?php echo $preco;?></b></div>
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
        <button style="width:100%" id="copiarCodigoPix" class="btn btn-primary">Copiar Código PIX</button>
                            <br>
                            <a href="https://<?php echo $host;?>/admin/control.php?url=1" class="btn btn-success" style="width: 100%;">Voltar</a>
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
                    <div class="row" style="border: 1px solid black; border-radius: 5px; padding: 10px; margin: 4px 0 0 0;">
                        <div class="col-lg-12"><b>Total: R$ <?php echo $preco;?></b></div>
                        <div class="col-lg-12">
                            <img style='display:block; width:100%;' 
                           src='https://<?php echo $host;?>/admin/media/aprovado.png' />
                        </div>
                        <div class="col-lg-12">
                            <h4>Pagamento Aprovado :)</h4>
                            <hr>
                            <a href="https://<?php echo $host;?>/admin/control.php?url=1" class="btn btn-success" style="width: 100%;">Gerar nova venda</a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>      
</main>

<script>
            document.getElementById("copiarCodigoPix").addEventListener("click", function() {
                var codigoPix = "<?php echo $linhaQrcode; ?>";
                var codigoPixTextArea = document.createElement("textarea");
                codigoPixTextArea.value = codigoPix;
                document.body.appendChild(codigoPixTextArea);
                codigoPixTextArea.select();
                document.execCommand('copy');
                document.body.removeChild(codigoPixTextArea);
                alert("Codigo PIX copiado para a area de transferência!");
                document.getElementById("copiarCodigoPix").disabled = true;
            });
        </script>
        
         <script>
          document.getElementById("sendToWhatsApp").addEventListener("click", function() {
    // Obtenha o c�1�7�1�7digo PIX (substitua isso pela l�1�7�1�7gica para obter o c�1�7�1�7digo PIX)
    var codigoPix = "<?php echo $linhaQrcode;?>";

    // Obtenha o n�1�7�1�7mero de WhatsApp inserido pelo usu�1�7�1�7rio
    var whatsappNumber = document.getElementById("whatsappNumber").value;

    // Verifique se o n�1�7�1�7mero de WhatsApp �1�7�1�7 v�1�7�1�7lido
    if (whatsappNumber.trim() === "") {
        alert("Por favor, insira um n�1�7�1�7mero de WhatsApp v�1�7�1�7lido.");
    } else {
        // Construa o link do WhatsApp com a mensagem (c�1�7�1�7digo PIX)
        var whatsappLink = "https://api.whatsapp.com/send?phone=+55" + whatsappNumber + "&text=" + codigoPix;

        // Abra o link em uma nova aba
        window.open(whatsappLink, '_blank');
    }
});
    </script>
    
    
    
    
    
    
    
    