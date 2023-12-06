<?php 
$host = str_replace('www.', '', $_SERVER['HTTP_HOST']);
session_start();
include('config/conexao.php');

    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['usuario'])) && (isset($_POST['senha']))){
        $usuario    = str_replace(array("#", "'", ";", "*", "=", "INSERT", "insert", "delete", "DELETE", "where", "WHERE", "update", "UPDATE"), '', $_POST['usuario']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $senha      = str_replace(array("#", "'", ";", "*", "=", "INSERT", "insert", "delete", "DELETE", "where", "WHERE", "update", "UPDATE"), '', $_POST['senha']);
        
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $result_usuario = "SELECT * FROM usuarios_admin WHERE usuario = '$usuario' LIMIT 1";
        $resultado_usuario = mysqli_query($conexao, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        $passUser = $resultado['senha']; 

        // Senha digitada pelo usuário
        $passInput = $senha;
        
        // Verificação da senha
        if (password_verify($passInput, $passUser)) {
            session_start();
            $_SESSION['usuario_id'] = $resultado['usuario_id'];
            $_SESSION['usuario'] = $resultado['usuario'];
    		$_SESSION['nome'] = $resultado['nome'];
    		echo "<script> window.location.href='https://".$host."/admin/control.php?url=1'; </script>";
        } else {
            echo "<script> window.location.href='https://".$host."/admin/'; </script>";
        }
        
    
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        echo "<script> window.location.href='https://".$host."/admin/'; </script>";
    }
