<!-- Modal -->
<div id="myModal-pendentes" class="modal fade" role="dialog" style="margin: 10px 0 0 <?php echo $width_modal;?>%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Contas a pagar Pendentes</h4>
      </div>
      <div class="modal-body">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nome</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cidade</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valor</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-secondary opacity-7">Funções</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($linhas_modal_contaPagar_p =mysqli_fetch_assoc($sql_contaPagar_modal_p)){ ?>
                        <tr>
                          <td class="align-middle ">
                            <?php echo $linhas_modal_contaPagar_p['id'];?>
                          </td>
                          <td class="align-middle ">
                            <?php echo $linhas_modal_contaPagar_p['nome'];?>
                          </td>
                          <td class="align-middle ">
                            <?php   
                                $sql_city = mysqli_query($conexao,"SELECT * FROM cidades WHERE id  = '".$linhas_modal_contaPagar_p['cidade_id']."'") or die("Erro");
                                $resultado_city = mysqli_fetch_assoc($sql_city);
                            ?>
                            <?php echo $resultado_city['cidade'];?>
                          </td>
                          <td class="align-middle ">
                            R$  <?php echo number_format($linhas_modal_contaPagar_p['valor'],2,",",".");?>
                          </td>
                          <td class="align-middle ">
                                <?php echo date('d/m/Y', strtotime($linhas_modal_contaPagar_p['data_pagamento']));?>
                          </td>
                          <td class="align-middle ">
                                <?php if($linhas_modal_contaPagar_p['status'] == '1'){ echo 'Pendente';}?>
                                <?php if($linhas_modal_contaPagar_p['status'] == '2'){ echo 'Aprovado';}?>
                          </td>
                          <td class="align-middle">
                            <?php if($nivel_user == '1'){ ?>
                                <?php if($linhas_modal_contaPagar_p['permissao'] == '1'){?>
                                    <button class="btn btn-danger" style="cursor: pointer; color: white;" disabled><i class="fa fa-dollar"></i></button>
                                <?php } else { ?>
                                    <button class="btn btn-success" style="cursor: pointer; color: white;" disabled><i class="fa fa-dollar"></i></button>
                                <?php } ?>
                            <?php } ?>
                            <?php if($nivel_user == '2'){ ?>
                                <?php if($linhas_modal_contaPagar_p['permissao'] == '1'){?>
                                    <a href="https://<?php echo $host;?>/painel/gestor.php?url=14&idContaPagar=<?php echo $linhas_modal_contaPagar_p['id'];?>&permissao=2" class="btn btn-danger" style="cursor: pointer;"><i class="fa fa-dollar"></i></a>
                                <?php } else { ?>
                                    <a href="https://<?php echo $host;?>/painel/gestor.php?url=14&idContaPagar=<?php echo $linhas_modal_contaPagar_p['id'];?>&permissao=1" class="btn btn-success" style="cursor: pointer; color: white;"><i class="fa fa-dollar"></i></a>
                                <?php } ?>
                            <?php } ?>
                          </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar janela</button>
      </div>
    </div>

  </div>
</div>