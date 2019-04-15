<?php
/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */
require "config.php";
require "common.php";
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $Country =[
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
    ];
    $sql = "UPDATE Country
            SET CountryCode = :CountryCode,
              CountryName = :CountryName,
              Continent = :Continent,
              Region = :Region,
              SurfaceArea = :SurfaceArea,
              IndependenceYear = :IndependenceYear,
              Population = :Population,
              LifeExpectancy = :LifeExpectancy,
              GNP = :GNP,
              GNPOld = :GNPOld,
              LocalName = :LocalName,
              GovermentForm = :GovermentForm,
              HeadOfState = :HeadOfState,
              CountryCode2 = :CountryCode2,
              Capital = :Capital
            WHERE CountryCode = :CountryCode";

  $statement = $connection->prepare($sql);
  $statement->execute($Country);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['CountryCode'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $CountryCode = $_GET['CountryCode'];
    $sql = "SELECT * FROM Country WHERE CountryCode = :CountryCode";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':CountryCode', $CountryCode);
    $statement->execute();

    $Country = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>
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
table {
  border-collapse: collapse;
  border-spacing: 0;
  font-size: 12px;
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

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p align="center"><blockquote><?php echo escape($_POST['CountryCode']); ?> successfully updated.</blockquote></p>
<?php endif; ?>


<div>
  <h2>Edit a Country</h2>
<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($Country as $key => $value) : ?>
      <p>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" CountryCode="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'CountryCode' ? 'readonly' : null); ?>>
    </p>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>
<p>
<a href="update_country.php" style="text-decoration:none;">Return</a>
</p>
</div>

<?php require "templates/footer.php"; ?>
