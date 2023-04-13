<?php

require_once("config.php");


$root = new Usuario();

$root->LoadById(2);

echo $root;






?>