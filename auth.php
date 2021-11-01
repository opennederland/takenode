<?php

require_once(__DIR__.'/config/dependency_loader.php');

if(Security::csrf_token_valid($_POST) && !empty($_POST['bestandstype']) && !empty($_POST['filename']) && !empty($_POST['hash']))
{
  if(ENVIRONMENT == 'production')
  {
    require_once('/var/simplesamlphp/lib/_autoload.php');

    $auth = new \SimpleSAML\Auth\Simple('default-sp');

    $auth->login([
      'KeepPost' => TRUE,
      'ReturnTo' => BASE_URL,
      'ErrorURL' => BASE_URL.'error.php',
      'saml:idp' => 'https://broker.takenode.org/broker/sp/saml',
    ]);
  }
  else
  {
    echo '<form action="'.BASE_URL.'" method="post">'.PHP_EOL;

    foreach($_POST as $key => $value)
    {
      echo '<input type="hidden" name="'.htmlspecialchars($key).'" value="'.htmlspecialchars($value).'">'.PHP_EOL;
    }

    echo '<input type="hidden" name="fullname" value="J. Doe">'.PHP_EOL;
    echo '<input type="submit">'.PHP_EOL;
    echo '</form>'.PHP_EOL;
  }
}
else
{
  echo 'Er is iets fout gegaan. Sorry. <a href="'.BASE_URL.'/index.php">Probeer het nog een keer.</a>';
}
