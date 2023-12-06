<?php
// Substitua 'sua_senha' pela senha que você deseja hash
$senha = 'admin';
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
echo $senha_hash;
?>
