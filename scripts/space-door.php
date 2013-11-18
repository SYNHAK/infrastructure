<?php
$data = json_decode(file_get_contents("https://synhak.org/auth/sensors/3.json"));
$stamp = date("H:i M j");
if ($data->value == "True") {
  passthru ("/usr/bin/phong-su door-open '(as of $stamp)'");
} else {
  passthru ("/usr/bin/phong-su door-closed '(as of $stamp)'");
}
?>
