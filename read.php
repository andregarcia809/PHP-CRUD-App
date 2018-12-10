<?php
require "database.php";

// Create new users
if ($_GET["show"] == "all") {
    try {
        $statement = $pdo->prepare(
            "SELECT * FROM users;"
        );
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo "<h4 style=' color: red;'>FAILED: " . $e->getMessage() . "</h4>";
    }
}
// Show user who was just created
if ($_GET["show"] == "one" && isset($_GET["id"])) {
    $id = $_GET["id"];
    try {
        $statement = $pdo->prepare(
            "SELECT * FROM users where id = :id;"
        );
        $statement->execute(["id" => $id]);
        $results = $statement->fetchAll(PDO::FETCH_OBJ);
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
  <link rel="stylesheet" type="text/css " href="./css/style.css">
  <title>Crud</title>
</head>

<body>
    <main>
        <div class="crud__container">
          <div class="crud__header">
            <h1 class="crud__title read">User's Database</h1>
          </div>
          <div class="crud__grid">
            <table class="crud__users-database">
                <tr>
                  <th>id</th>
                  <th>First Name</th>
                  <th>last Name</th>
                  <th>Age</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <?php
foreach ($results as $user) {?>
                <tr>
                  <td>
                    <?php echo $user->id; ?>
                  </td>
                  <td>
                    <?php echo $user->first_name; ?>
                  </td>
                  <td>
                    <?php echo $user->last_name; ?>
                  </td>
                  <td>
                    <?php echo $user->age; ?>
                  </td>
                  <td>
                    <a class="crud__update-btn" href="./update.php?id=<?php echo $user->id; ?>">Edit</a>
                  </td>
                  <td>
                    <a class="crud__delete-btn" href="./delete.php?id=<?php echo $user->id; ?>" onclick="confirm()">Delete</a>
                  </td>
                </tr>
              <?php }?>
            </table>
             <div class="crud__icon-wrap read">
            <a class="crud__icon home" href="./index.php"><img src="./images/home-icon.svg" alt="">
            </a>
            <a class="crud__icon create" href="./create.php?"><img src="./images/create-icon.svg" alt="">
            </a>
          </div>
          </div>
        </div>
      </main>
</body>

</html>