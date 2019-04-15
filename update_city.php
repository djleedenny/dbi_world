<?php
/**
 * List all users with a link to edit
 */
require "config.php";
require "common.php";
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

<div class="navigator">
    <a href="country.php"><strong>COUNTRY</strong></a>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <a href="index.php"><strong>HOMEPAGE</strong></a>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <a href="language.php"><strong>LANGUAGE</strong></a>
</div>
<p class="title" align="center">UPDATE CITY</p>
<p align="center"><a href="city.php" style="text-decoration:none;">Return</a></p>

<div  style="overflow-x:auto;">
<table align="center">
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
          <td><a href="update-single_city.php?id=<?php echo escape($row["ID"]); ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

<?php require "templates/footer.php"; ?>
