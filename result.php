<?php

require_once(__DIR__.'/config/dependency_loader.php');

if(
  Security::csrf_token_valid($_POST) &&
  !empty($_POST['bestandstype']) &&
  !empty($_POST['filename']) &&
  !empty($_POST['hash']) &&
  !empty($_POST['persoonsgegevens']) &&
  !empty($_POST['toestemming'])
)
{
  $now = time();
  $is_verified = !empty($_POST['uuid']);
  $identity = $_POST['persoonsgegevens'] == 'anoniem' ? trim($_POST['alias'].' (alias)') : $_POST['name'];
  $id = $is_verified ? $_POST['uuid'] : Helper::generate_uuid();
  $url = BASE_URL.'certificate?id='.htmlspecialchars($id);
  $db = Database::get_instance();

  if($is_verified)
  {
    $db->change_query('
      UPDATE `certificates`
      SET `contact_info` = ?,
      `permission` = ?,
      `updated_at` = ?
      WHERE `id` = ?
    ', [
      $_POST['contact_info'],
      $_POST['toestemming'],
      $now,
      $id
    ]);
  }
  else
  {
    $db->change_query('
      INSERT INTO `certificates` (`id`, `file_type`, `filename`, `file_hash`, `name`, `contact_info`, `permission`, `created_at`, `updated_at`)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ', [
      $id,
      $_POST['bestandstype'],
      $_POST['filename'],
      $_POST['hash'],
      $identity,
      $_POST['contact_info'],
      $_POST['toestemming'],
      $now,
      $now
    ]);
  }
}
else
{
  echo 'Er is iets fout gegaan. Sorry. <a href="'.BASE_URL.'index.php">Probeer het nog een keer.</a>';
  exit;
}

ob_start();

require_once(__DIR__.'/parts/certificates/certificate.html.php');

$certificate_html = ob_get_clean();

ob_start();

require_once(__DIR__.'/parts/certificates/certificate.txt.php');

$certificate_text = ob_get_clean();

$output = [
  'id' => $id,
  'url' => $url,
  'certificate_html' => $certificate_html,
  'certificate_text' => $certificate_text
];

echo json_encode($output);
