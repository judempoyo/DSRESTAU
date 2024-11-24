<?php if (!isset($_SESSION)) {
  session_start();
}
define("APPURL", "http://localhost/dsrestau");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title><?php //$page? $page."-":"" 
              ?> - DS restau</title> -->
  <link rel="icon" type="image/x-icon" href="./assets/images/favicon.png">

  <!-- custom css link -->
  <link rel="stylesheet" href="./assets/vendor/fontawesome/css/all.css">
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/bootstrap-icons.css">


  <!-- <link rel="stylesheet" href="./assets/css/bootstrap.css"> -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/css/taaza.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">
  <link rel="stylesheet" href="./assets/css/custom.css"><!-- 
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="./assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="./assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- autre -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/main.css">

  <link rel="stylesheet" href="./assets/vendor/DataTables-2.1.3/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="./assets/vendor/DataTables-tout/datatables.css">
  <link rel="stylesheet" href="./assets/vendor/buttons/css/buttons.dataTables.css">
  <link rel="stylesheet" href="./assets/vendor/buttons/css/buttons.bootstrap5.css">

  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- <style>
    .remove-button {
      background-color: #4CAF50;
      /* Green */
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      width: 130px;
    }

    .remove-button1 {
      background-color: white;
      color: black;
      border: 2px solid #f44336;
    }

    .remove-button1:hover {
      background-color: #f44336;
      color: white;
    }
  </style>
 -->
</head>