

<?php
session_start();
session_unset();
session_destroy();
// $page = $_GET["page"];
echo
"<script type='text/javascript'>
    alert('Logout Berhasil!');
    document.location.href = 'userview.php';
</script>";