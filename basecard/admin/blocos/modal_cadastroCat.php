
<div id="myModal-cadastroCat" class="modal fade" role="dialog" style="margin: 10px 0 0 <?php echo $width_modal;?>%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastro de categoria</h4>
      </div>
      <div class="modal-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <b>Nome</b>
                        <input type="text" class="form-control" name="nome" value="<?php echo $nome;?>">
                    </div>
                    <div class="col-lg-6">
                        <b>Código</b>
                        <input type="text" class="form-control" name="categoria_id" value="<?php echo $categoria_id;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-6">
                        <button type="text" class="btn btn-success" name="btnCat">Cadastrar</button>
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