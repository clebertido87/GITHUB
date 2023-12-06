<?php
    class Intermediador {
        
        function post_pix(){
            include('config/conexao.php');
            include('config/tabs.php');
            
            date_default_timezone_set('America/Sao_Paulo');
            $codigo = rand(1,9999).date('d-m-Y H:i:s').rand(1,9999);
            
            if(isset($_POST['GerarPix'])){
                echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://".$host."/cleber/admin/control.php?url=2&codigo=".md5($codigo)."&cpf=".$_POST['cpf']."&preco=".$_POST['preco']."&email=".$_POST['email']."&nome=".$_POST['nome']."&descricao=".$_POST['descricao']."'>";    
            }
        }
        
        function gerar_pix(){
            include('config/conexao.php');
            include('config/tabs.php');
            
            include('classes/pix/'.$diretorio.'/request.pix.php');
        }
        
        function consultar_pix(){
            include('config/conexao.php');
            include('config/tabs.php');
            
            $sql_venda          = mysqli_query($conexao,"SELECT * FROM vendas WHERE codigo = '".$_GET['codigo']."'") or die("Erro");
            $resultado_venda	= mysqli_fetch_assoc($sql_venda);
            
            $codigo             = $resultado_venda['codigo'];
            
            if($resultado_venda['status'] == '2'){
                echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://".$host."/cleber/admin/control.php?url=5&codigo=".$codigo."'>";
            }
        }
    }
?>















