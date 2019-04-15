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
      "ID" => $_POST['ID'],
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
<head>
  <style>
  form{
    border: 1px solid black;
    display: inline-block;
    text-align: right;
    padding: 50px;
    margin: auto;
}
div{
    display: block;
    text-align: center;
}
</style>
</head>
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
<?php if (isset($_POST['submit']) && $statement) { ?>
<p align="center">> <?php echo $_POST['CityName']; ?> successfully added.</p>

<?php } ?>


    <p class="title" align="center">ADD CITY</p>
    <div>
    <form method="post">
      <label for="ID">ID:</label>
      <input type="text" name="ID" id="ID" placeholder="ID">
        <br>
        <br>
        <label for="CityName">CityName:</label>
      	<input type="text" name="CityName" id="CityName" placeholder="CityName">
        <br>
        <br>
        <label for="CountryCode">CountryCode:</label>
      	<input type="text" name="CountryCode" id="CountryCode" placeholder="CountryCode">
        <br>
        <br>
        <label for="StateName">StateName:</label>
      	<input type="text" name="StateName" id="StateName" placeholder="StateName">
        <br>
        <br>
        <label for="Population">Population:</label>
      	<input type="text" name="Population" id="Population" placeholder="Population">
        <br>
        <br>
        <input type="submit" name="submit" value="Submit">
      </form>
      <p>
      <a href="city.php" style="text-decoration:none;">Return</a>
    </p>
</div>

    <?php include "templates/footer.php"; ?>
