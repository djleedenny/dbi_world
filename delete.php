<?php
/**
 * List all users with a link to edit
 */
require "config.php";
require "common.php";
if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $id = $_GET["id"];

    $sql = "DELETE FROM City WHERE ID = :ID";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':ID', $id);
    $statement->execute();

    $success = "City successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT * FROM City";
  $statement = $connection->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>

<h2>Delete citys</h2>

<table>
    <thead>
        <tr>
          <th>ID</th>
          <th>CityName</th>
          <th>CountryCode</th>
          <th>StateName</th>
          <th>Population</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
          <td><?php echo escape($row["ID"]); ?></td>
          <td><?php echo escape($row["CityName"]); ?></td>
          <td><?php echo escape($row["CountryCode"]); ?></td>
          <td><?php echo escape($row["StateName"]); ?></td>
          <td><?php echo escape($row["Population"]); ?></td>
          <td><a href="delete.php?id=<?php echo escape($row["ID"]); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
