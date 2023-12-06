<?php
    if(isset($_POST['atualiar_serv'])){
        $id_serv    = $_POST['id'];
        $status     = $_POST['status'];
        
        $query = "UPDATE pagamentos SET
            status  = '".$status."'
        WHERE id = '".$id_serv."'";
        mysqli_query($conexao_pag_serv, $query);
        
        echo "<script> window.location.href='https://".$host."/painel/gestor.php?url=1'; </script>";
    }
?>









