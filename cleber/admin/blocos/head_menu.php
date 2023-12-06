<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true" style="float: right;">
    <a data-toggle="modal" data-target="#myModal-menu" class="btn btn-primary fixed-plugin-button-nav cursor-pointer">
        <i class="fa fa-cog "></i>
    </a>
</nav>
    

<!-- Modal -->
<div id="myModal-menu" class="modal fade" role="dialog" style="margin: 10px 0 0 <?php echo $width_modal;?>%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="card shadow-lg ">
          <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
              <h5 class="mt-3 mb-0">Olá, <?php echo $_SESSION['usuario'];?>!</h5>
              <p>Seja bem vindo.</p>
            </div>
            <div class="float-end mt-4">
              <button class="btn btn-link text-dark p-0 fixed-plugin-close-button" data-dismiss="modal">
                <i class="fa fa-close"></i>
              </button>
            </div>
            <!-- End Toggle Button -->
          </div>
          <hr class="horizontal dark my-1">
          <div class="card-body pt-sm-3 pt-0">
            <a class="btn bg-gradient-dark w-100" href="https://<?php echo $host;?>/cleber/admin/control.php?url=1">Página Principal</a>
            
            
            <hr>
            
            <a class="btn bg-gradient-dark w-100" href="https://<?php echo $host;?>/cleber/admin/control.php?url=6">Trocar senha</a>
            <a class="btn bg-gradient-dark w-100" href="https://<?php echo $host;?>/cleber/admin/control.php?url=7">Configuração de pagamento</a>
            <a class="btn bg-gradient-dark w-100" href="https://<?php echo $host;?>/cleber/admin/logout.php">Fechar conexão</a>
          </div>
          
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar janela</button>
      </div>
    </div>

  </div>
</div>

    
    
    
    
    
    
    