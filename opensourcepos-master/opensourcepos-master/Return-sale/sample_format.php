<?php
$cash='1,900.00';
echo floatval(preg_replace('/[^\d.]/','',$cash));


?>