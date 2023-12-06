<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<style>
  /* Estilos para telas menores */
  @media (max-width: 768px) {
    /* Defina os estilos desejados para telas menores aqui */
  }

  /* Estilos para telas maiores */
  @media (min-width: 769px) {
    /* Defina os estilos desejados para telas maiores aqui */
  }
</style>

<?php include('head.php');?>
<!-- Modal -->
<?php include('blocos/modal_filtro.php');?>

<?php $objetPix->post_pix();?>

<body class="g-sidenav-show  bg-gray-100">
  <?php include('blocos/menu.php');?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('blocos/head_menu.php');?>
    
    <br><br><br>
    <a class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal-filtrar"><b>Filtro por data <i class="fa fa-calendar"></i></b></a>
    Iniciar cobrança
    <br>
    <?php echo $msg_filtro;?>
    <?php include('blocos/blocos_home.php');?>
    
    <hr style="border: 1px solid grey;">
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-4">
                            <img src="https://<?php echo $host;?>/admin/media/pix.png" style="width: 100%;">
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-12"><br></div>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="nome" placeholder="Nome completo (opcional)">
                        </div>
                        <div class="col-lg-12"><br></div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="preco" placeholder="Preço*" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="descricao" placeholder="Descrição (opcional)">
                        </div>
                        <div class="col-lg-12"><br></div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="cpf" placeholder="CPF*">
                        </div>
                        <div class="col-lg-6">
                            <input type="email" class="form-control" name="email" placeholder="E-mail (opcional)">
                        </div>
                        <div class="col-lg-12"><br></div>
                        <div class="col-lg-12">
                            <br>
                            <button class="btn btn-success" name="GerarPix" style="width: 100%;">Gerar pix</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid py-4">
        <br>
        <?php include('blocos/rodape.php');?>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>