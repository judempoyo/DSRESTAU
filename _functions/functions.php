<?php

function str_secure($str)
{
  return trim(htmlspecialchars($str));
}

function debug($var)
{
  echo "<pre>";
  echo var_dump($var);
  echo "</pre>";
}

function nameUser()
{
  if (isset($_SESSION['name']) && isset($_SESSION['firstname'])) {
    return ' ' . $_SESSION['firstname'] . ' ' . $_SESSION['name'];
  } else {
    return '';
  }
}

function guestbody()
{
  if (!isset($_SESSION["userid"])) {
    echo ' class="toggle-sidebar"';
  }
}
function missingData()
{
  echo <<<HTML
<div
  class="alert alert-danger alert-dismissible fade show"
  role="alert"
>
  <strong>An error occured</strong> Some required data is missing you may have deleted them
</div>
<a href="?page=home" class="page-link text-center" >back to Home page</a>

HTML;
}
