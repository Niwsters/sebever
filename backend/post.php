<?php

switch ($_SERVER['REQUEST_METHOD']) {
  case "GET":
    $result = [];
    foreach(glob('./../posts/*.html') as $filename) {
      $result[] = file_get_contents($filename);
    }
    break;
  case "DELETE":
    break;
}

$json = json_encode($result);
echo $json;

return;

?>