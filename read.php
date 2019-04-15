<?php

/**
  * Function to query information based on
  * a parameter: in this case, CountryCode.
  *
  */

if (isset($_POST['submit'])) {
  try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM City
    WHERE CountryCode = :CountryCode";

    $CountryCode = $_POST['CountryCode'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':CountryCode', $CountryCode, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

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
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["ID"]); ?></td>
<td><?php echo escape($row["CityName"]); ?></td>
<td><?php echo escape($row["CountryCode"]); ?></td>
<td><?php echo escape($row["StateName"]); ?></td>
<td><?php echo escape($row["Population"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['CountryCode']); ?>.
  <?php }
} ?>

<h2>Search City based on CountryCode</h2>
<h3>The CountryCode that available in database is:  </h3>


<form method="post">
  <label for="CountryCode">CountryCode</label>
  <input type="text" ID="CountryCode" name="CountryCode">
  <input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
