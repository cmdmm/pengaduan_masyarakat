<?php

session_start();

session_destroy();

echo "<script>alert('Terima kasih'); document.location.href='login.php';</script>";



?>