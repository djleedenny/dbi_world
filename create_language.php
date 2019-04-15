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

    $new_language = array(
      "CountryCode" => $_POST['CountryCode'],
      "Language"  => $_POST['Language'],
      "OfficialLanguage"     => $_POST['OfficialLanguage'],
      "PercentageOfSpeakers"       => $_POST['PercentageOfSpeakers'],
    );

    $sql = sprintf(
"INSERT INTO %s (%s) values (%s)",
"Lang",
implode(", ", array_keys($new_language)),
":" . implode(", :", array_keys($new_language))
    );

    //$newString = $CountryCode.$Language;

    $statement = $connection->prepare($sql);
    $statement->execute($new_language);
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
    <a href="country.php"><strong>COUNTRY</strong></a>
</div>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p align="center">  > <?php echo $_POST['Language']; ?> successfully added.</p>

<?php } ?>

<div>
<p class="title" align="center">ADD LANGUAGE</p>

    <form method="post">
      <p>
    	<label for="CountryCode">CountryCode</label>
    	<input type="text" name="CountryCode" id="CountryCode">
    </p>
    <p>
    	<label for="Language">Language</label>
    	<input type="text" name="Language" id="Language">
    </p>
    <p>
    	<label for="OfficialLanguage">OfficialLanguage</label>
    	<input type="text" name="OfficialLanguage" id="OfficialLanguage">
    </p>
    <p>
    	<label for="PercentageOfSpeakers">PercentageOfSpeakers</label>
    	<input type="text" name="PercentageOfSpeakers" id="PercentageOfSpeakers">
    </p>
    	<input type="submit" name="submit" value="Submit">
    </form>


    <p align="center"><a href="language.php" style="text-decoration:none;">Return</a></p>
</div>
    <?php include "templates/footer.php"; ?>
