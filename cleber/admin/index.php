<?php include('config/conexao.php');?>
<?php
session_start();
    $host = str_replace('www.', '', $_SERVER['HTTP_HOST']);
?>


<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.php');?>
<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent text center">
                  <h3 class="font-weight-bolder text-info text-gradient">CF Pix</h3>
                  <p class="mb-0">Faça seu Login de Acesso</p>
                </div>
                <div class="card-body">
                  <form role="form" action="verificar.php" method="POST">
                    <label>Usuario</label>
                    <div class="mb-3">
                      <input type="text" name="usuario" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Senha</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="senha" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Entrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </main>
  
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
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
<?php
error_reporting(0);
ini_set("display_error", 0 );
session_start(); // Inicia a session
?>