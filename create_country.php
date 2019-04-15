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

    $new_country = array(
      "CountryCode" => $_POST['CountryCode'],
      "CountryName"  => $_POST['CountryName'],
      "Continent"     => $_POST['Continent'],
      "Region"       => $_POST['Region'],
      "SurfaceArea"       => $_POST['SurfaceArea'],
      "IndependenceYear"       => $_POST['IndependenceYear'],
      "Population"       => $_POST['Population'],
      "LifeExpectancy"       => $_POST['LifeExpectancy'],
      "GNP"       => $_POST['GNP'],
      "GNPOld"       => $_POST['GNPOld'],
      "LocalName"       => $_POST['LocalName'],
      "GovermentForm"       => $_POST['GovermentForm'],
      "HeadOfState"       => $_POST['HeadOfState'],
      "CountryCode2"       => $_POST['CountryCode2'],
      "Capital"       => $_POST['Capital']
    );

    $sql = sprintf(
"INSERT INTO %s (%s) values (%s)",
"Country",
implode(", ", array_keys($new_country)),
":" . implode(", :", array_keys($new_country))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_country);
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
    <a href="language.php"><strong>LANGUAGE</strong></a>
</div>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p align="center">  > <?php echo $_POST['CountryName']; ?> successfully added.</p>

<?php } ?>

<p class="title" align="center">ADD COUNTRY</p>
    <div>
    <form method="post">
      <p>
    	<label for="CountryCode">CountryCode:</label>
    	<input type="text" name="CountryCode" id="CountryCode" placeholder="CountryCode">
      </p>
      <p>
    	<label for="CountryName">CountryName:</label>
    	<input type="text" name="CountryName" id="CountryName" placeholder="CountryName">
    </p>
    <p>
    	<label for="Continent">Continent:</label>
    	<input type="text" name="Continent" id="Continent" placeholder="Continent">
    </p>
    <p>
    	<label for="Region">Region:</label>
    	<input type="text" name="Region" id="Region" placeholder="Region">
    </p>
    <p>
      <label for="SurfaceArea">SurfaceArea:</label>
    	<input type="text" name="SurfaceArea" id="SurfaceArea" placeholder="SurfaceArea">
    </p>
    <p>
      <label for="IndependenceYear">IndependenceYear:</label>
    	<input type="text" name="IndependenceYear" id="IndependenceYear" placeholder="IndependenceYear">
    </p>
    <p>
      <label for="Population">Population:</label>
    	<input type="text" name="Population" id="Population" placeholder="Population">
    </p>
    <p>
      <label for="LifeExpectancy">LifeExpectancy:</label>
    	<input type="text" name="LifeExpectancy" id="LifeExpectancy" placeholder="LifeExpectancy">
    </p>
    <p>
      <label for="GNP">GNP:</label>
    	<input type="text" name="GNP" id="GNP" placeholder="GNP">
    </p>
    <p>
      <label for="GNPOld">GNPOld:</label>
    	<input type="text" name="GNPOld" id="GNPOld" placeholder="GNPOld">
    </p>
    <p>
      <label for="LocalName">LocalName:</label>
    	<input type="text" name="LocalName" id="LocalName" placeholder="LocalName">
    </p>
    <p>
      <label for="GovermentForm">GovermentForm:</label>
      <input type="text" name="GovermentForm" id="GovermentForm" placeholder="GovermentForm">
    </p>
    <p>
      <label for="HeadOfState">HeadOfState:</label>
      <input type="text" name="HeadOfState" id="HeadOfState" placeholder="HeadOfState">
    </p>
    <p>
      <label for="CountryCode2">CountryCode2:</label>
      <input type="text" name="CountryCode2" id="CountryCode2" placeholder="CountryCode2">
    </p>
    <p>
      <label for="Capital">Capital:</label>
      <input type="text" name="Capital" id="Capital" placeholder="Capital">
    </p>
    <p>
    	<input type="submit" name="submit" value="Submit">
    </p>

    </form>

    <p>
    <a href="country.php" style="text-decoration:none;">Return</a>
  </p>
</div>

    <?php include "templates/footer.php"; ?>
