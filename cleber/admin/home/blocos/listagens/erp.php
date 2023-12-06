<?php while($linhas_pag_7_erp =mysqli_fetch_assoc($sql_pag_7_erp)){ ?>

<?php if($_SESSION['usuario_id'] == '18'){ ?>
    <?php $edit = '<button class="btn btn-success" data-toggle="modal" data-target="#myModal-erp-'.$linhas_pag_7_erp['id'].'" style="cursor: pointer;" ><i class="fa fa-edit"></i></button>';?>
<?php } ?>
<?php 
if($linhas_pag_7_erp['status'] == "Pagamento Aprovado" || $linhas_pag_7_erp['status'] == "Cancelado"){
    $botao_comprar = '
        <button class="btn btn-success" style="cursor: pointer;" disabled>Boleto <i class="fa fa-barcode"></i></button> ';
} else {
    if($linhas_pag_7_erp['linha_digitavel'] == ""){
        $botao_comprar = '
        <button class="btn btn-success" name="boleto" style="cursor: pointer;" data-toggle="modal" data-target="#myModal-boleto-erp-'.$linhas_pag_7_erp['id'].'"><i class="fa fa-barcode"></i></button> ';
    } else {
        $botao_comprar = '
        <button class="btn btn-primary" name="boleto" style="cursor: pointer;" data-toggle="modal" data-target="#myModal-boleto-erp-'.$linhas_pag_7_erp['id'].'">Abrir <i class="fa fa-barcode"></i></button> <a href="" style="cursor: pointer;" class="btn btn-success" data-toggle="modal" data-target="#myModal-wpp-erp-'.$linhas_pag_7_erp['codigo_pagamento'].'">Enviar <i class="fa fa-whatsapp"></i></a>';
    }
}
?>

<?php if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) { ?>

                        <tr>
                          <td class="align-middle">
                                <?php echo $linhas_pag_7_erp['codigo_pagamento'];?> - 
                                <?php echo $linhas_pag_7_erp['nome_empresa'];?>
                                <br>
                                <?php echo date('d/m/Y', strtotime($linhas_pag_7_erp['data_vencimento']));?> - <b>R$ <?php echo number_format($linhas_pag_7_erp['valor'],2,",",".");?></b>
                                <br>
                                <?php echo $botao_comprar;?> <?php echo $edit;?>
                          </td>
                        </tr>

<?php } else { ?>
                        <tr>
                          <td>
                            <?php echo $linhas_pag_7_erp['codigo_pagamento'];?>
                          </td>
                          <td>
                            <?php echo $linhas_pag_7_erp['nome_empresa'];?>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <?php if($linhas_pag_7_erp['status'] == 'Aguardando Pagamento'){ ?>
                                <span class="badge badge-sm bg-gradient-warning">Pendente</span>
                            <?php } ?>
                            <?php if($linhas_pag_7_erp['status'] == 'Pagamento Aprovado'){ ?>
                                <span class="badge badge-sm bg-gradient-success">Aprovado</span>
                            <?php } ?>
                            <?php if($linhas_pag_7_erp['status'] == 'Cancelado'){ ?>
                                <span class="badge badge-sm bg-gradient-danger">Cancelado</span>
                            <?php } ?>
                          </td>
                          <td class="align-middle text-center">
                            <b>R$ <?php echo number_format($linhas_pag_7_erp['valor'],2,",",".");?></b>
                          </td>
                          <td class="align-middle text-center">
                            <?php echo date('d/m/Y', strtotime($linhas_pag_7_erp['data_vencimento']));?>
                          </td>
                          <td class="align-middle">
                            <?php echo $botao_comprar;?> <?php echo $edit;?>
                          </td>
                        </tr>
<?php } ?>

<?php } ?>