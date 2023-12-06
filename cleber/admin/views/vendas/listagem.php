<?php 
    if(isset($_POST['btnFiltrar'])){
        $Vendaid  = str_replace(array("#", "'", ";", "*", "=", "INSERT", "insert", "delete", "DELETE", "where", "WHERE", "update", "UPDATE"), '', $_POST['Vendaid']);
        echo "<script> window.location.href='https://".$host."/cleber/admin/control.php?url=4&id=".$Vendaid."'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('head.php');?>
<!-- Modal -->
<?php include('blocos/modal_filtro.php');?>

<body class="g-sidenav-show  bg-gray-100">
  <?php include('blocos/menu.php');?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('blocos/head_menu.php');?>
    
    <?php include('blocos/modal_filtro.php');?>
    
    <!-- End Navbar -->
    <div class="container">
        
    </div>
    <div class="container-fluid py-4">
        <a class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal-filtrar"><b>Filtro por data <i class="fa fa-calendar"></i></b></a>
        <h4>Venda:</h4>
        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="Vendaid" placeholder="Código da venda" value="<?php echo $_GET['id'];?>">
                </div>
                <div class="col-lg-3">
                    <input type="submit" class="btn btn-primary" name="btnFiltrar" value="Buscar">
                </div>
            </div>
            
        </form>
        <b><?php echo $msg_filtro;?></b><br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Desc.</td>
                    <td>Data</td>
                    <td>Valor</td>
                    <td>Status</td>
                </tr>   
            </thead>
            <tbody>
                <?php while($linhas_vendas = mysqli_fetch_assoc($sql_blog_config)){ ?>
                    <tr>
                        <td><a href="https://<?php echo $host;?>/cleber/admin/control.php?url=5&codigo=<?php echo $linhas_vendas['codigo'];?>" target="_BLANK"><?php echo $linhas_vendas['id'];?></a></td>
                        <td><?php echo $linhas_vendas['id_externo'];?></td>
                        <td><?php echo $linhas_vendas['data'];?></td>
                        <td>R$ <?php echo number_format($linhas_vendas['valor'],2,",",".");?></td>
                        <td><a href="https://<?php echo $host;?>/cleber/admin/control.php?url=5&codigo=<?php echo $linhas_vendas['codigo'];?>" class="btn btn-<?php if($linhas_vendas['status'] == '2'){ echo 'success'; } else { echo 'danger'; }?>" target="_BLANK"><?php if($linhas_vendas['status'] == '2'){ echo '<b>Aprovado</b>'; } else { echo '<b>Pendente</b>'; }?></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <?php if($_GET['id'] == ''){ include('views/vendas/paginacao.php'); }?>
        
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