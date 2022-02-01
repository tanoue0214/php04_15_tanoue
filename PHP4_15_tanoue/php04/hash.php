<?php

$pw = password_hash('test01',PASSWORD_DEFAULT);
echo $pw;
echo '<br>';
$pw = password_hash('test02',PASSWORD_DEFAULT);
echo $pw;
echo '<br>';
$pw = password_hash('test03',PASSWORD_DEFAULT);
echo $pw;
echo '<br>';

?>