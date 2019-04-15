<?php
/**
 * List all users with a link to edit
 */
require "config.php";
require "common.php";
if (isset($_GET["CountryCode"]) && isset($_GET["Language"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $CountryCode = $_GET["CountryCode"];
    $Language = $_GET["Language"];


    $sql = "DELETE FROM Lang WHERE CountryCode = :CountryCode AND Language = :Language";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':CountryCode', $CountryCode);
    $statement->bindValue(':Language', $Language);
    $statement->execute();

    $success = "Language successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT * FROM Lang";
  $statement = $connection->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>

<div class="navigator">
    <a href="city.php"><strong>CITY</strong></a>
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
    <a href="country.php"><strong>COUNTRY</strong></a>
</div>
<p class="title" align="center">DELETE LANGUAGE</p>
<p align="center"><a align="center" href="language.php" style="text-decoration:none;">Return</a></p>

<div  style="overflow-x:auto;">
<table align="center">
    <thead>
        <tr>
          <th>CountryCode</th>
          <th>Language</th>
          <th>OfficialLanguage</th>
          <th>PercentageOfSpeakers</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
          <td><?php echo escape($row["CountryCode"]); ?></td>
          <td><?php echo escape($row["Language"]); ?></td>
          <td><?php echo escape($row["OfficialLanguage"]); ?></td>
          <td><?php echo escape($row["PercentageOfSpeakers"]); ?></td>
          <td><a href="delete_language.php?CountryCode=<?php echo escape($row["CountryCode"]); ?>&&Language=<?php echo escape($row["Language"]); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

<?php require "templates/footer.php"; ?>
