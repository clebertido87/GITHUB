
<div id="myModal-remover-con" class="modal fade" role="dialog" style="margin: 10px 0 0 <?php echo $width_modal;?>%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Remover conexão atual?</h4>
      </div>
      <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="https://<?php echo $host;?>/admin/control.php?url=3" class="btn btn-danger" style="width: 100%;">Remover <i class="fa fa-trash"></i></a>
                    </div>
                    <div class="col-lg-6">
                        <a data-dismiss="modal" class="btn btn-primary" style="width: 100%;">Cancelar</a>
                    </div>
                    <div class="col-lg-12"><br></div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar janela</button>
      </div>
    </div>

  </div>
</div>