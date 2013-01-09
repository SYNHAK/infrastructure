<?php
$c = curl_init();
curl_setopt($c, CURLOPT_URL, "https://synhak.org/auth/sensors/2");
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_POSTFIELDS, "data={motion: true}");
curl_exec($c);
curl_close($c);
echo "test"
?>
