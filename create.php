<?php

/**
  * Use an HTML form to create a new entry in the
  * users table.
  *
  */


if (isset($_POST['submit'])) {
  require "config.php";
  require "common.php";

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_city = array(
      "CityName" => $_POST['CityName'],
      "CountryCode"  => $_POST['CountryCode'],
      "StateName"     => $_POST['StateName'],
      "Population"       => $_POST['Population'],
    );

    $sql = sprintf(
"INSERT INTO %s (%s) values (%s)",
"City",
implode(", ", array_keys($new_city)),
":" . implode(", :", array_keys($new_city))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_city);
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}
?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  > <?php echo $_POST['firstname']; ?> successfully added.

<?php } ?>

    <h2>Add a city</h2>

    <form method="post">
    	<label for="CityName">CityName</label>
    	<input type="text" name="CityName" id="CityName">
    	<label for="CountryCode">CountryCode</label>
    	<input type="text" name="CountryCode" id="CountryCode">
    	<label for="StateName">StateName</label>
    	<input type="text" name="StateName" id="StateName">
    	<label for="Population">Population</label>
    	<input type="text" name="Population" id="Population">
    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>

    <?php include "templates/footer.php"; ?>
