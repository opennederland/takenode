<?php

require_once(__DIR__.'/config/dependency_loader.php');

$activepage = 'info';
$language = Helper::get_language();

include 'parts/'.$language.'/pages/info.php';
