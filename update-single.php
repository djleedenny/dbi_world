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

<?php if (isset($_POST['submit']) && $statement) : ?>
	<blockquote><?php echo escape($_POST['CityName']); ?> successfully updated.</blockquote>
<?php endif; ?>

<h2>Edit a City</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($City as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" ID="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'ID' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
