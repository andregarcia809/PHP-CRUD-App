<?php
require "database.php";//Database connection

initMigration($pdo);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./main.css">
  <link rel="stylesheet" type="text/css " href="css/style.css">
  <title>Crud</title>
</head>

<body>
  <main>
    <div class="Crud__container">
      <div class="crud__header">
        <h1 class="crud__title">PHP Crud App </h1>
      </div>
      <div class="crud__create-read-box">
        <h3>Create & View Form</h3>
        <div class="crud__user-icon">
          <img src="./images/users-icon.svg" alt="">
        </div>
        <a class="crud__links "href="./create.php">Create Users</a>
        <a class="crud__links users "href="./read.php?show=all">Show Users</a>
      </div>

    </div>
  </main>

</body>

</html>