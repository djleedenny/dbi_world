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
    $City =[
      "ID"        => $_POST['ID'],
      "CityName" => $_POST['CityName'],
      "CountryCode"  => $_POST['CountryCode'],
      "StateName"     => $_POST['StateName'],
      "Population"       => $_POST['Population']
    ];
    $sql = "UPDATE City
            SET ID = :ID,
              CityName = :CityName,
              CountryCode = :CountryCode,
              StateName = :StateName,
              Population = :Population
            WHERE ID = :ID";

  $statement = $connection->prepare($sql);
  $statement->execute($City);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $ID = $_GET['id'];
    $sql = "SELECT * FROM City WHERE ID = :ID";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':ID', $ID);
    $statement->execute();

    $City = $statement->fetch(PDO::FETCH_ASSOC);
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

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p align="center"><blockquote><?php echo escape($_POST['CityName']); ?> successfully updated.</blockquote></p>
<?php endif; ?>
<div>
<h2>Edit a City</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($City as $key => $value) : ?>
      <p>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" ID="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'ID' ? 'readonly' : null); ?>>
    </p>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<p>
<a href="update_city.php" style="text-decoration:none;">Return</a>
</p>
</div>

<?php require "templates/footer.php"; ?>
