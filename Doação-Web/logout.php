<?php
session_start();
$start_time = time();
while (time() - $start_time < 2) {
}
if(isset($_SESSION['id'])) {
    session_destroy();
}

header("Location: login.html");
exit();
?>
