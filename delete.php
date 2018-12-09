<?php
  require "database.php";

  // Handles GET request
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    try {
      $statement = $pdo->prepare(
      "DELETE FROM users WHERE id = :id");
      $statement->execute([ "id" => $id]);
      //After clicking on delete, takes you back to read.php url
      echo "<script>location.href='./read.php?show=all'</script>";
    } catch (PDOException $e) {
        echo "<h4 style=' color: red;'>FAILED: " . $e->getMessage() . "</h4>";
    }
  } else {
    //If no ID,go back to read.php
    echo "<script>location.href='./read.php?show=all&id={$id}'</script>";
    die();
  }
?>
