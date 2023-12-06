<?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
    
    $host = str_replace('www.', '', $_SERVER['HTTP_HOST']);   
?>
<?php 
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) { 
        $width_modal = '';
    } else {
        $width_modal = '30';
    }
    
    $sql_intermediador          = mysqli_query($conexao,"SELECT * FROM intermediadores WHERE status = '1'") or die("Erro");
    $resultado_intermediador	= mysqli_fetch_assoc($sql_intermediador);
    
    $access_token               = $resultado_intermediador['token'];
    $nome_intermediador         = $resultado_intermediador['nome'];
    
    $diretorio  = $resultado_intermediador['diretorio'];
    
    date_default_timezone_set('America/Sao_Paulo');
    
    if($_GET['data_inicio'] == ''){
        $data_inicio    = date('Y-m-').'01';
        $data_fim       = date('Y-m-d');
        
        $msg_filtro     = 'Filtro de: '.date('d/m/Y', strtotime($data_inicio)).' até '.date('d/m/Y', strtotime($data_fim));
        
        $next_days              = '15';
        $data_inicio_listagem   = strtotime(date('Y-m-d'));
        $data_fim_listagem      = strtotime(date('Y-m-d', strtotime('+ '.$next_days.' days', strtotime(date('Y-m-d')))));
        
        $filtro_linha       = '';
        $filtro_cidade      = '';
    } else {
        $data_inicio    = $_GET['data_inicio'];
        $data_fim       = $_GET['data_fim'];
        
        $msg_filtro     = 'Filtro de: '.date('d/m/Y', strtotime($data_inicio)).' até '.date('d/m/Y', strtotime($data_fim));
        $next_days              = '15';
        $data_inicio_listagem   = strtotime($data_inicio);
        $data_fim_listagem      = strtotime($data_fim);
        if($_GET['filtro_linha'] <> ''){
            $filtro_linha       = 'and linha_id = "'.$_GET['filtro_linha'].'"';
        } else {
            $filtro_linha       = '';
        }
        if($_GET['filtro_cidade'] <> ''){
            $filtro_cidade      = 'and cidade_id = "'.$_GET['filtro_cidade'].'"';
        } else {
            $filtro_cidade      = '';
        }
    }
?>



<?php 
    $fun_sql_vendas   = "select * from vendas WHERE codigo_data >= '".strtotime($data_inicio)."' and codigo_data <= '".strtotime($data_fim)."'";
    
    //Aprovados
    $sql_vendas = mysqli_query($conexao,"$fun_sql_vendas  and status = 2") or die("Erro");
    while($linhas_vendas = mysqli_fetch_assoc($sql_vendas)){ $total_aprovado += $linhas_vendas['valor'];}
    
    //Pendente
    $sql_vendas_p = mysqli_query($conexao,"$fun_sql_vendas and status = 1") or die("Erro");
    while($linhas_vendas_p = mysqli_fetch_assoc($sql_vendas_p)){ $total_pendente += $linhas_vendas_p['valor'];}
    
?>

<?php
		if($_GET['pagina'] == ""){
			$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
			$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		} else {	
			$pagina = $_GET['pagina'];
		}
	
	
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 5;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$sql_cat = mysqli_query($conexao,"$fun_sql_vendas") or die("Erro");
        $resultado_cat = mysqli_fetch_assoc($sql_cat);
		
		if($_GET['id'] == ''){
		    $sql_blog_config = mysqli_query($conexao,"$fun_sql_vendas ORDER BY id DESC LIMIT $inicio, $qnt_result_pg") or die("Erro");
		} else {
		    $sql_blog_config = mysqli_query($conexao,"select * from vendas WHERE id = '".$_GET['id']."'") or die("Erro");
		}
        
        
?>



