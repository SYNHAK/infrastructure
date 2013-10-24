<?php
$cmd = $_GET['cmd'];
passthru("/usr/bin/phong-su ".escapeshellarg($cmd));
?>
