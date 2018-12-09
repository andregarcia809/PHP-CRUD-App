<?php
require "database.php";

// Create new users
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $age = $_POST["age"];

  try { // Saves new userin Data Base
    $statement = $pdo->prepare(
      "INSERT INTO users (first_name, last_name, age) VALUES (:first_name, :last_name, :age);"
    );
    $statement->execute(["first_name" => $first_name, "last_name" => $last_name, "age" => $age]);
    echo "<script >console.log('Success!User created')</script>";

    $id = $pdo->lastInsertId();

    echo "<script>location.href='./read.php?show=all&id={$id}'</script>";
  } catch (PDOException $e) {
    echo "<h4 style=' color: red;'>FAILED: " . $e->getMessage() . "</h4>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css " href="css/style.css">
  <title>Crud</title>
</head>

<body>
  <main>
    <div class="crud__container">
      <div class="crud__header">
        <h1 class="crud__title">Create Your User</h1>
      </div>
      <div class="crud__grid">
        <form action="./create.php" method="POST">
          <label for="first_name">First Name</label>
          <input type="text" name="first_name">
          <label for="last_name">Last Name</label>
          <input type="text" name="last_name">
          <label for="age" Fisrt Name>Age</label>
          <input type="text" name="age">
          <button id="Crud__create-btn" type="submit">Create User</button>
          <div class="crud__icon-wrap">
            <a class="crud__icon home" href="./index.php"><img src="./images/home-icon.svg" alt="">
            </a>
            <a class="crud__icon database" href="./read.php?show=all"><img src="./images/read-icon.svg" alt="">
            </a>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>