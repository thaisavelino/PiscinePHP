<?php

$valid_passwords = array ("zaz" => "jaimelespetitsponeys");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="Members Space"');
  header('HTTP/1.0 401 Unauthorized');
  echo "<html><body>Ops! Members only. You are not allowed to access this page.</body></html>";
  die ("");
} else {
    $file = file_get_contents('../img/42.png');
    echo "<html><body>\nBonjour $user<br />\n<img src='data:image/jpeg;base64,".base64_encode($file)."'>\n</body></html>\n";
}
?>
