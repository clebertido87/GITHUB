    <?php include('listagens/modalin.php');?>
    <?php include('listagens/modalloja.php');?>
    <?php include('listagens/modalerp.php');?>
    <?php include('listagens/modalserv.php');?>
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Mensalidade dos próximos <?php echo $next_days;?> dias</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <?php if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) { ?>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mensalidades</th>
                        </tr>
                    <?php } else { ?>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cliente</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                    <?php } ?>
                  </thead>
                  <tbody>
                    <?php include('listagens/in.php');?>
                    <?php include('listagens/loja.php');?>
                    <?php include('listagens/erp.php');?>
                    <?php include('listagens/serv.php');?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>