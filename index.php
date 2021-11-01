<?php

require_once(__DIR__.'/config/dependency_loader.php');

$activepage = 'tool';
$language = Helper::get_language();
$csrf_token = Security::set_csrf_cookie_and_return_token();

if(ENVIRONMENT == 'production')
{
  require_once('/var/simplesamlphp/lib/_autoload.php');

  $auth = new \SimpleSAML\Auth\Simple('default-sp');
  $attributes = $auth->getAttributes();
  $authn_instant = $auth->getAuthData('AuthnInstant');
}
else
{
  $attributes = [
    'pbdf.gemeente.personalData.fullname' => [
      !empty($_POST['fullname']) ? $_POST['fullname'] : NULL
    ]
  ];

  $authn_instant = time();
}

$is_authenticated = FALSE;
$id = NULL;

if(
  !empty($_POST['bestandstype']) &&
  !empty($_POST['filename']) &&
  !empty($_POST['hash']) &&
  !empty($attributes['pbdf.gemeente.personalData.fullname'][0]) &&
  !empty($authn_instant)
)
{
  $db = Database::get_instance();

  $is_authenticated = TRUE;
  $id = Helper::generate_uuid();
  $now = time();

  $db->change_query('
    INSERT INTO `certificates` (`id`, `file_type`, `filename`, `file_hash`, `name`, `name_verified_at`, `contact_info`, `created_at`, `updated_at`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
  ', [
    $id,
    $_POST['bestandstype'],
    $_POST['filename'],
    $_POST['hash'],
    $attributes['pbdf.gemeente.personalData.fullname'][0],
    $authn_instant,
    $_POST['contact_info'],
    $now,
    $now
  ]);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'parts/head-meta.php' ?>
    <title>TakeNode</title>
  </head>
  <body class="<?= $is_authenticated ? 'show-tool '.$activepage : $activepage ?>">
    <!-- Modals -->
    <?php include 'parts/'.$language.'/modals/bestandstype.php' ?>
    <?php include 'parts/'.$language.'/modals/persoonsgegevens.php' ?>
    <?php include 'parts/'.$language.'/modals/toestemming.php' ?>
    <?php include 'parts/'.$language.'/modals/mijntakenode.php' ?>

    <?php include 'parts/header.php' ?>
    <main>
      <?php include 'parts/'.$language.'/tool.php' ?>
    </main>
    <script src="<?= BASE_URL ?>assets/js/main-min.js?<?= VERSION ?>" type="text/javascript"></script>
  </body>
</html>
