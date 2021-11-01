<?php

require_once(__DIR__.'/config/dependency_loader.php');

$activepage = 'spreadtheword';
$language = Helper::get_language();

include 'parts/'.$language.'/pages/spread-the-word.php';
