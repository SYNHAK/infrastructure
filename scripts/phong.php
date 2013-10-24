<?php
$cmd = $_GET['cmd'];
system("/usr/bin/phong-su ".escapeshellarg($cmd));
?>
