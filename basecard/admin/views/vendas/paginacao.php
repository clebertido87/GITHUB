<?php 
		
		$sql = mysqli_query($conexao,"SELECT COUNT(id) AS num_result FROM vendas WHERE codigo_data >= '".strtotime($data_inicio)."' and codigo_data <= '".strtotime($data_fim)."'") or die("Erro");
		$row_pg = mysqli_fetch_assoc($sql);
		
		
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 3;
		
		if(isset($_GET['pagina'])){
		
		echo "<a href='https://".$host."/admin/control.php?url=4&pagina=1&data_inicio=".$data_inicio."&data_fim=".$data_fim."'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='https://".$host."/admin/control.php?url=4&pagina=".$pag_ant."&data_inicio=".$data_inicio."&data_fim=".$data_fim."' class='btn btn-success'>$pag_ant</a> ";
			}
		}
			
		echo "<a class='btn btn-primary' disabled>$pagina</a> ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='https://".$host."/admin/control.php?url=4&pagina=".$pag_dep."&data_inicio=".$data_inicio."&data_fim=".$data_fim."' class='btn btn-success'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='https://".$host."/admin/control.php?url=4&pagina=".$quantidade_pg."&data_inicio=".$data_inicio."&data_fim=".$data_fim."'>Ultima</a>";
		
		} else {
		
		echo "<a href='https://".$host."/admin/control.php?url=4&pagina=".$_GET['pagina']."&data_inicio=".$data_inicio."&data_fim=".$data_fim."'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='https://".$host."/admin/control.php?url=4&pagina=".$pag_ant."&data_inicio=".$data_inicio."&data_fim=".$data_fim."' class='btn btn-success'>$pag_ant</a> ";
			}
		}
			
		echo "<a class='btn btn-primary' disabled>$pagina</a> ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='https://".$host."/admin/control.php?url=4&pagina=".$pag_dep."&data_inicio=".$data_inicio."&data_fim=".$data_fim."' class='btn btn-success'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='https://".$host."/admin/control.php?url=4&pagina=".$quantidade_pg."&data_inicio=".$data_inicio."&data_fim=".$data_fim."'>Ultima</a>";
		
		}
		
		?>