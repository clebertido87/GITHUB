<div class="row">
    <?php while($linhas_categorias =mysqli_fetch_assoc($sql_categorias)){ ?>
    <?php include('views/mercadolivre/categoria/modal_remover_categoria.php');?>
        <div class="col-lg-3" style="border-radius: 5px; border: 1px solid grey; padding: 10px; margin: 5px;">
            <a style="float: right; color: red; cursor: pointer;" data-toggle="modal" data-target="#myModal-remover-categoria-<?php echo $linhas_categorias['id'];?>"><i class="fa fa-trash"></i></a>
            <center><h5 style="color:#17c1e8;"><?php echo $linhas_categorias['nome'];?></h5></center>
            
            <a href="https://<?php echo $host;?>/admin/control.php?url=2&categoria=<?php echo $linhas_categorias['categoria_id'];?>" class="btn btn" style="width: 100%;">Ver produtos</a>
        </div>
    <?php } ?>
</div>




























