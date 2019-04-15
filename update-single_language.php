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
    $Lang =[
      "CountryCode"        => $_POST['CountryCode'],
      "Language" => $_POST['Language'],
      "OfficialLanguage"  => $_POST['OfficialLanguage'],
      "PercentageOfSpeakers"     => $_POST['PercentageOfSpeakers']
    ];
    $sql = "UPDATE Lang
            SET CountryCode = :CountryCode,
              Language = :Language,
              OfficialLanguage = :OfficialLanguage,
              PercentageOfSpeakers = :PercentageOfSpeakers
            WHERE CountryCode = :CountryCode AND Language = :Language";

  $statement = $connection->prepare($sql);
  $statement->execute($Lang);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET["CountryCode"]) && isset($_GET["Language"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $CountryCode = $_GET["CountryCode"];
    $Language = $_GET["Language"];

    $sql = "SELECT * FROM Lang WHERE CountryCode = :CountryCode AND Language = :Language";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':CountryCode', $CountryCode);
    $statement->bindValue(':Language', $Language);
    $statement->execute();

    $Lang = $statement->fetch(PDO::FETCH_ASSOC);
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
    <a href="country.php"><strong>COUNTRY</strong></a>
</div>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p align="center"><blockquote><?php echo escape($_POST['CountryCode']); ?><?php echo escape($_POST['Language']); ?> successfully updated.</blockquote></p>
<?php endif; ?>

<div>
  <h2>Edit a Language</h2>
<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($Lang as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" CountryCode="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'CountryCode' ? 'readonly' : null); ?><?php echo ($key === 'Language' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<p>
<a href="update_language.php" style="text-decoration:none;">Return</a>
</p>
</div>
<?php require "templates/footer.php"; ?>
