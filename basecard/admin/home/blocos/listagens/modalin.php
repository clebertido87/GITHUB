
<?php while($linhas_pag_7_in_modal =mysqli_fetch_assoc($sql_pag_7_in_modal)){ ?>
<?php if($_SESSION['usuario_id'] == '18'){ ?>
    
    
<!-- Modal -->
<div id="myModal-in-<?php echo $linhas_pag_7_in_modal['id'];?>" class="modal fade" role="dialog" style="margin: 10px 0 0 <?php echo $width_modal;?>%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Mensalidade - <?php echo $resultado_dados_serv['cliente'];?></h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <b>Data: </b> <?php echo $linhas_pag_7_in_modal['vencimento'];?>
                    <br>
                    <b>Valor: </b><b>R$ <?php echo number_format($linhas_pag_7_in_modal['valor'],2,",",".");?></b>
                </div>
                <div class="col-lg-12"><br></div>
                <div class="col-lg-12">
                    <select class="form-control" name="status" style="cursor: pointer;">
                        <?php if($linhas_pag_7_in_modal['status'] == 'Aguardando Pagamento'){ ?>
                            <option value="1">Pendente</option>
                            <option value="2">Aprovado</option>
                        <?php } else { ?>
                            <option value="2">Aprovado</option>
                            <option value="1">Pendente</option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $linhas_pag_7_in_modal['id'];?>">
                </div>
                <div class="col-lg-12"><br></div>
                
                <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary" name="atualiar_in" value="Atualizar">
                </div>
                
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar janela</button>
      </div>
    </div>

  </div>
</div>
    <?php $edit = '<button class="btn btn-success" data-toggle="modal" data-target="#myModal-in-'.$linhas_pag_7_in_modal['id'].'" style="cursor: pointer;" ><i class="fa fa-edit"></i></button>';?>
<?php } ?>

<?php
if($linhas_pag_7_in_modal['status'] == "Pagamento Aprovado" || $linhas_pag_7_in_modal['status'] == "Cancelado"){
    $botao_comprar = '
        <button class="btn btn-success" style="cursor: pointer;" disabled>Boleto <i class="fa fa-barcode"></i></button> ';
} else {
    if($linhas_pag_7_in_modal['linha_digitavel'] == ""){
        $botao_comprar = '
        <button class="btn btn-success" name="boleto" style="cursor: pointer;" data-toggle="modal" data-target="#myModal-boleto-'.$linhas_pag_7_in_modal['id'].'"><i class="fa fa-barcode"></i></button> ';
    } else {
        $botao_comprar = '
        <button class="btn btn-primary" name="boleto" style="cursor: pointer;" data-toggle="modal" data-target="#myModal-boleto-'.$linhas_pag_7_in_modal['id'].'">Abrir <i class="fa fa-barcode"></i></button> <a href="" style="cursor: pointer;" class="btn btn-success" data-toggle="modal" data-target="#myModal-wpp-'.$linhas_pag_7_in_modal['codigo_pagamento'].'">Enviar <i class="fa fa-whatsapp"></i></a>';
    }
}

echo '<form action="" target="_blank" method="POST"><!-- The Modal -->
<div id="myModal-wpp-'.$linhas_pag_7_in_modal['codigo_pagamento'].'" class="modal fade" role="dialog" style="margin: 10px 0 0 '.$width_modal.'%;">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Notificar via Whatsapp</h4>
      </div>
	<input type="hidden" name="linha_digitalvel" value="'.$linhas_pag_7_in_modal['linha_digitavel'].'">
	<input type="hidden" name="nome" value="'.$linhas_pag_7_in_modal['nome'].'">
	<input type="hidden" name="url_boleto" value="'.$linhas_pag_7_in_modal['url_boleto'].'">
	<input type="hidden" name="vencimento_boleto" value="'.$linhas_pag_7_in_modal['dia'].'/'.$linhas_pag_7_in_modal['mes'].'/'.$linhas_pag_7_in_modal['ano'].'/">
      <!-- Modal body -->
      <div class="modal-body">
      	Vencimento: '.$linhas_pag_7_in_modal['dia'].'/'.$linhas_pag_7_in_modal['mes'].'/'.$linhas_pag_7_in_modal['ano'].'
        <input type="text" class="form-control" name="numero" placeholder="149999-9999">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="btn_wpp">Enviar <i class="fa fa-whatsapp"></i></button>
      </div>

    </div>
  </div>
</div>
</form>
';

echo '<!-- The Modal Boleto -->
                
			  <div class="modal fade" role="dialog" style="margin: 10px 0 0 '.$width_modal.'%;" id="myModal-boleto-'.$linhas_pag_7_in_modal['id'].'">
			    <div class="modal-dialog">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Boleto</h4>
			        </div>
			        <!-- Modal body -->
			        <div class="modal-body">
			          <span>Vencimento: <i class="fa fa-calendar"></i> '.date('d/m/Y', strtotime($linhas_pag_7_in_modal['data_vencimento'])).'</span>
			          <br>
			          <h5>Valor: R$ '.number_format($linhas_pag_7_in_modal['valor'], 2, ',', '.').'</h5>';
			          echo '> '.$linhas_pag_7_in_modal['nome'].' '.$linhas_pag_7_in_modal['sobrenome'];
			          echo '<br><br>';
			          if($linhas_pag_7_in_modal['linha_digitavel'] == ""){
			          	echo '<form action="" method="POST"><input type="hidden" name="codigo_pagamento" value="'.$linhas_pag_7_in_modal['codigo_pagamento'].'">';
			          	echo '<button class="btn btn-success" style="cursor:pointer; width: 100%;" name="button_boleto"> Gerar Boleto <i class="fa fa-barcode"></i></button></form>';
			          } else {
			          	echo '<b>Linha Digitavel</b>
                				<br>
                				<input type="" class="form-control" id="link" name="link" value="'.$linhas_pag_7_in_modal['linha_digitavel'].'" readonly>';
                			echo '<br><button onClick="copiarTexto()" style="cursor: pointer;" class="btn btn-success">Copiar <i class="fa fa-copy"></i></button> <a href="'.$linhas_pag_7_in_modal['url_boleto'].'" style="cursor: pointer;" class="btn btn-primary" target="_blank">Imprimir Boleto <i class="fa fa-print"></i></a> ';
			          }
			        echo '
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal" style="cursor: pointer;">Fechar</button>
			        </div>
			        
			      </div>
			    </div>
			  </div>
			';
?>

<?php } ?>




