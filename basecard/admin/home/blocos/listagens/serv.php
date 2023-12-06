<?php include('update_mensalidade/update_serv.php');?>

<?php while($linhas_pag_7_serv =mysqli_fetch_assoc($sql_pag_7_serv)){ ?>
<?php
    $sql_dados_serv = mysqli_query($conexao_pag_serv,"SELECT * FROM clientes WHERE id = '".$linhas_pag_7_serv['id_cliente']."'") or die("Erro");
	$resultado_dados_serv = mysqli_fetch_assoc($sql_dados_serv);
?>
<?php if($_SESSION['usuario_id'] == '18'){ ?>
    <?php $edit = '<button class="btn btn-success" data-toggle="modal" data-target="#myModal-serv-'.$linhas_pag_7_serv['id'].'" style="cursor: pointer;" ><i class="fa fa-edit"></i></button>';?>
<?php } ?>

<?php if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) { ?>
                        <tr>
                          <td class="align-middle">
                                <?php echo $linhas_pag_7_serv['id'];?> - 
                                <?php echo $resultado_dados_serv['cliente'];?>
                                <br>
                                <?php echo $linhas_pag_7_serv['vencimento'];?> - <b>R$ <?php echo number_format($linhas_pag_7_serv['valor'],2,",",".");?></b>
                                <br>
                                <a class="btn btn-success" data-toggle="modal" data-target="#myModal-serv-<?php echo $linhas_pag_7_serv['id'];?>" style="cursor: pointer;">
                                  Receber serviço
                                </a>
                          </td>
                        </tr>

<?php } else { ?>
                      <tr>
                          <td>
                            <?php echo $linhas_pag_7_serv['id'];?>
                          </td>
                          <td>
                            <?php echo $resultado_dados_serv['cliente'];?>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <?php if($linhas_pag_7_serv['status'] == '1'){ ?>
                                <span class="badge badge-sm bg-gradient-warning">Pendente</span>
                            <?php } ?>
                            <?php if($linhas_pag_7_serv['status'] == '2'){ ?>
                                <span class="badge badge-sm bg-gradient-success">Aprovado</span>
                            <?php } ?>
                            
                          </td>
                          <td class="align-middle text-center">
                            <b>R$ <?php echo number_format($linhas_pag_7_serv['valor'],2,",",".");?></b>
                          </td>
                          <td class="align-middle text-center">
                            <?php echo $linhas_pag_7_serv['vencimento'];?>
                          </td>
                          <td class="align-middle">
                            <a class="btn btn-success" data-toggle="modal" data-target="#myModal-serv-<?php echo $linhas_pag_7_serv['id'];?>" style="cursor: pointer;">
                              Receber serviço
                            </a>
                          </td>
                        </tr>
<?php } ?>
<?php } ?>