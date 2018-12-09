<?php
  require "database.php";

  // Handles POST request
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"]) &&$_POST["_method"] == "PUT") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $id = $_GET["id"];

    try {
      $statement = $pdo->prepare(
      "UPDATE users SET first_name = :first_name, last_name = :last_name, age = :age where id = :id");
      $statement->execute(["first_name" => $first_name, "last_name" => $last_name, "age" => $age,  "id" => $id]);
      echo "Udated the data";
    } catch (PDOException $e) {
        echo "<h4 style=' color: red;'>FAILED: " . $e->getMessage() . "</h4>";
    }
  }
// Handles the GET request
  if (isset($_GET["id"])) {
    $id = $_GET["id"]; //Get users data that matches each user

    try {
        $statement = $pdo->prepare(
            "SELECT * FROM users where id = :id;"
        );
        $statement->execute(["id" => $id]);

        $results = $statement->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo "<h4 style= 'color: red;'>" . $e->getMessage() . "</h4>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css "href="css/style.css">
  <title>Crud</title>
</head>

<body>
  <main>
    <div class="crud__container">
      <div class="crud__header">
        <h1 class="crud__title">Update Your User</h1>
      </div>
      <div class="crud__grid">
      <form action="./update.php?id=<?php echo $results[0]->id; ?>" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <label for="first_name">Fisrt Name</label><br>
    <input type="text" name="first_name" value="<?php echo $results[0]->first_name; ?>"><br>
    <label for="last_name">Last Name</label><br>
    <input type="text" name="last_name" value="<?php echo $results[0]->last_name; ?>"><br>
    <label for="age">Age</label><br>
    <input type="text" name="age" value="<?php echo $results[0]->age; ?>"><br>
    <button type="submit">Save</button>
    <div class="crud__icon-wrap">
            <a class="crud__icon home" href="./index.php"><img src="./images/home-icon.svg" alt="">
            </a>
            <a class="crud__icon database" href="./read.php?show=all"><img src="./images/read-icon.svg" alt="">
            </a>
            <a class="crud__icon user" href="./create.php"><img src="./images/create-icon.svg" alt="">
            </a>
          </div>
  </form>
      </div>
    </div>
  </main>
</body>

</html>