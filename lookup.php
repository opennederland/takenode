<?php

require_once(__DIR__.'/config/dependency_loader.php');

$activepage = 'search';
$language = Helper::get_language();

if(!empty($_GET['query']))
{
  $db = Database::get_instance();

  $query = $_GET['query'];

  $results = $db->select_query('
    SELECT *
    FROM `certificates`
    WHERE `is_published` = 1
    AND (
      `id` = ?
      OR `file_hash` = ?
    )
    ORDER BY `updated_at` DESC
  ', [
    $query,
    $query
  ]);
}

include 'parts/'.$language.'/pages/lookup.php';
