<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);

function error_handler($errno, $errstr, $errfile, $errline){
  echo "Error: [$errno] $errstr - $errfile:$errline";
}

set_error_handler("error_handler");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SITE_NAME ?></title>
  <link rel="stylesheet" href="<?php echo URL_ROOT ?>/css/style.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="<?php echo URL_ROOT ?>/js/main.js"></script>
</head>

<body>
  <?php include 'navbar.php' ?>