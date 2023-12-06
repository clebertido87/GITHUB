<?php
    if(isset($_POST['btn_filtrar'])){
        echo "<script> window.location.href='https://".$host."/cleber/admin/control.php?url=".$_GET['url']."&data_inicio=".$_POST['data_inicio']."&data_fim=".$_POST['data_fim']."'; </script>";
    }
    
    
?>

<div id="myModal-filtrar" class="modal fade" role="dialog" style="margin: 10px 0 0 <?php echo $width_modal;?>%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Filtrar Faturamento</h4>
      </div>
      <div class="modal-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <b>Data inicio</b>
                        <input type="date" class="form-control" name="data_inicio" value="<?php echo $data_inicio;?>">
                    </div>
                    <div class="col-lg-6">
                        <b>Data fim</b>
                        <input type="date" class="form-control" name="data_fim" value="<?php echo $data_fim;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-6">
                        <input type="submit" class="btn btn-primary" name="btn_filtrar" value="Filtrar">
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