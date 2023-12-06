<?php while($linhas_pag_7_serv_modal =mysqli_fetch_assoc($sql_pag_7_serv_modal)){ ?>
<?php
    $sql_dados_serv = mysqli_query($conexao_pag_serv,"SELECT * FROM clientes WHERE id = '".$linhas_pag_7_serv_modal['id_cliente']."'") or die("Erro");
	$resultado_dados_serv = mysqli_fetch_assoc($sql_dados_serv);
?>


<!-- Modal -->
<div id="myModal-serv-<?php echo $linhas_pag_7_serv_modal['id'];?>" class="modal fade" role="dialog" style="margin: 10px 0 0 <?php echo $width_modal;?>%;">
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
                    <b>Data: </b> <?php echo $linhas_pag_7_serv_modal['vencimento'];?>
                    <br>
                    <b>Valor: </b><b>R$ <?php echo number_format($linhas_pag_7_serv_modal['valor'],2,",",".");?></b>
                </div>
                <div class="col-lg-12"><br></div>
                <div class="col-lg-12">
                    <select class="form-control" name="status" style="cursor: pointer;">
                        <?php if($linhas_pag_7_serv_modal['status'] == '1'){ ?>
                            <option value="1">Pendente</option>
                            <option value="2">Aprovado</option>
                        <?php } else { ?>
                            <option value="2">Aprovado</option>
                            <option value="1">Pendente</option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $linhas_pag_7_serv_modal['id'];?>">
                </div>
                <div class="col-lg-12"><br></div>
                
                <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary" name="atualiar_serv" value="Atualizar">
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

<?php } ?>





