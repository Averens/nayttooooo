<?php
$ssana = "vodezki3";

$hashed_password = password_hash($ssana, PASSWORD_DEFAULT);
echo $hashed_password;
echo "<br>";
if(password_verify($ssana,'$2y$10$55M/7lWsMVMA0395ILB0lun')) {
echo "Miten menee";

}

echo '$2y$10$55M/7lWsMVMA0395ILB0lun';
?>