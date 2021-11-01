<?php

require_once(__DIR__.'/config/dependency_loader.php');

$id = $_GET['id'];
$db = Database::get_instance();

header('Content-Type: text/plain; charset=UTF-8');
header('Content-Disposition: attachment; filename="'.htmlspecialchars($id).'.txt"');

require_once(__DIR__.'/parts/certificates/certificate.txt.php');
