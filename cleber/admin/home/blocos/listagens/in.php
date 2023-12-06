<?php while($linhas_pag_7_in =mysqli_fetch_assoc($sql_pag_7_in)){ ?>
<?php if($_SESSION['usuario_id'] == '18'){ ?>
    <?php $edit = '<button class="btn btn-success" data-toggle="modal" data-target="#myModal-in-'.$linhas_pag_7_in['id'].'" style="cursor: pointer;" ><i class="fa fa-edit"></i></button>';?>
<?php } ?>
<?php 
if($linhas_pag_7_in['status'] == "Pagamento Aprovado" || $linhas_pag_7_in['status'] == "Cancelado"){
    $botao_comprar = '
        <button class="btn btn-success" style="cursor: pointer;" disabled>Boleto <i class="fa fa-barcode"></i></button> ';
} else {
    if($linhas_pag_7_in['linha_digitavel'] == ""){
        $botao_comprar = '
        <button class="btn btn-success" name="boleto" style="cursor: pointer;" data-toggle="modal" data-target="#myModal-boleto-'.$linhas_pag_7_in['id'].'"><i class="fa fa-barcode"></i></button> ';
    } else {
        $botao_comprar = '
        <button class="btn btn-primary" name="boleto" style="cursor: pointer;" data-toggle="modal" data-target="#myModal-boleto-'.$linhas_pag_7_in['id'].'">Abrir <i class="fa fa-barcode"></i></button> <a href="" style="cursor: pointer;" class="btn btn-success" data-toggle="modal" data-target="#myModal-wpp-'.$linhas_pag_7_in['codigo_pagamento'].'">Enviar <i class="fa fa-whatsapp"></i></a>';
    }
}
?>
<?php if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) { ?>
                        
                        <tr>
                          <td class="align-middle">
                                <?php echo $linhas_pag_7_in['codigo_pagamento'];?> - 
                                <?php echo $linhas_pag_7_in['nome_empresa'];?>
                                <br>
                                <?php echo date('d/m/Y', strtotime($linhas_pag_7_in['data_vencimento']));?> - <b>R$ <?php echo number_format($linhas_pag_7_in['valor'],2,",",".");?></b>
                                <br>
                                <?php echo $botao_comprar;?> <?php echo $edit;?>
                          </td>
                        </tr>
<?php } else { ?>
                        <tr>
                          <td>
                            <?php echo $linhas_pag_7_in['codigo_pagamento'];?>
                          </td>
                          <td>
                            <?php echo $linhas_pag_7_in['nome_empresa'];?>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <?php if($linhas_pag_7_in['status'] == 'Aguardando Pagamento'){ ?>
                                <span class="badge badge-sm bg-gradient-warning">Pendente</span>
                            <?php } ?>
                            <?php if($linhas_pag_7_in['status'] == 'Pagamento Aprovado'){ ?>
                                <span class="badge badge-sm bg-gradient-success">Aprovado</span>
                            <?php } ?>
                            <?php if($linhas_pag_7_in['status'] == 'Cancelado'){ ?>
                                <span class="badge badge-sm bg-gradient-danger">Cancelado</span>
                            <?php } ?>
                          </td>
                          <td class="align-middle text-center">
                            <b>R$ <?php echo number_format($linhas_pag_7_in['valor'],2,",",".");?></b>
                          </td>
                          <td class="align-middle text-center">
                            <?php echo date('d/m/Y', strtotime($linhas_pag_7_in['data_vencimento']));?>
                          </td>
                          <td class="align-middle">
                            <?php echo $botao_comprar;?> <?php echo $edit;?>
                          </td>
                        </tr>
<?php } ?>
<?php } ?>