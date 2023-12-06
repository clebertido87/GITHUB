<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Plataforma FLY
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<?php 

if(isset($_POST['atualizar'])){
    $senha      = str_replace(array("#", "'", ";", "*", "=", "INSERT", "insert", "delete", "DELETE", "where", "WHERE", "update", "UPDATE"), '', $_POST['senha']);

    //encriptando senha
    $encriptPass = password_hash($senha, PASSWORD_BCRYPT, ['cost' => 12]);
    
    $query = "UPDATE usuarios_admin SET
        senha  = '".$encriptPass."'
    WHERE usuario_id = '".$_SESSION['usuario_id']."'";
    mysqli_query($conexao, $query);
    
    echo "<script>
            window.location.href='https://".$host."/admin/logout.php';
        </script>";
}

?>

<body class="g-sidenav-show  bg-gray-100">
  <?php include('blocos/menu.php');?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('blocos/head_menu.php');?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
          <div class="row">
            <div class="col-lg-5">
              <div class="card card-plain mt-8">
                <div class="card-body">
                  <form role="form" action="" method="POST">
                    <label>Usuário</label>
                    <div class="mb-3">
                      <input type="text" name="usuario" class="form-control" value="<?php echo $_SESSION['usuario'];?>" disabled>
                    </div>
                    <label>Senha</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="senha" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" name="atualizar" class="btn bg-gradient-info w-100 mt-4 mb-0">Atualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            
          </div>
        </div>
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