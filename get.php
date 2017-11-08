<?php
  $service_url = 'http://stimey-dev.eu:8080/api/ping';
   $curl = curl_init($service_url);
 
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   $curl_response = curl_exec($curl);
   curl_close($curl);

?>