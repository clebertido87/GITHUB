<?php
session_start();
session_destroy();
$host = str_replace('www.', '', $_SERVER['HTTP_HOST']);
?>
<script>
    window.location.href='https://<?php echo $host;?>/cleber/admin/';
</script>