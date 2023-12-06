<!DOCTYPE html>
<html lang="pt-br">
     <meta charset="UTF-8">

<?php include('head.php');?>
<!-- Modal -->
<?php include('blocos/modal_filtro.php');?>

<body class="g-sidenav-show  bg-gray-100">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <div class="container">
        <form action="control.php?url=2" method="POST">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <?php $objetPix->gerar_pix();?>
                    <div id="venda"></div>
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
  
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
    $( document ).ready(function() {
        var tempo = 2000; //Dois segundos
    
        (function selectNumUsuarios () {
            $.ajax({
              url: "https://<?php echo $host;?>/cleber/admin/control.php?url=3&codigo=<?php echo $_GET['codigo'];?>",
              success: function (n) {
                  //essa é a function success, será executada se a requisição obtiver exito
                  $("#venda").html(n);
              },
              complete: function () {
                  setTimeout(selectNumUsuarios, tempo);
              }
           });
        })();
    });
    </script>
  
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
