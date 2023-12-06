
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4"><br></div>
        
        <b>Faturamento</b>
        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
          <div class="card">
            <a style="cursor: pointer;" href="https://<?php echo $host;?>/cleber/admin/control.php?url=1">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Aprovado</p>
                        <h5 class="font-weight-bolder mb-0">
                          R$ <?php echo $total_aprovado;?>
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="material-icons">loop</i>
                      </div>
                    </div>
                  </div>
                </div>
            </a>
          </div>
        </div>
        
        
        
        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
          <div class="card">
            <a style="cursor: pointer;" href="https://<?php echo $host;?>/cleber/admin/control.php?url=4">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Visualizar Todas As Vendas</p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="material-icons">loop</i>
                      </div>
                    </div>
                  </div>
                </div>
            </a>
          </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
          <div class="card">
            <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal-pendentes">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Pendente</p>
                        <h5 class="font-weight-bolder mb-0">
                          R$ <?php echo $total_pendente;?>
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="material-icons">loop</i>
                      </div>
                    </div>
                  </div>
                </div>
            </a>
          </div>
        </div>
        
        
</div>












