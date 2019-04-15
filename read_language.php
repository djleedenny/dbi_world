<?php

/**
  * Function to query information based on
  * a parameter: in this case, CountryCode.
  *
  */

if (isset($_POST['submit1'])) {
  try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $ConditionName = $_POST['ConditionName'];
    $Condition1 = $_POST['Condition1'];

    $sql = sprintf("SELECT *
    FROM  %s
    WHERE %s = '%s' ","Lang",stripslashes($ConditionName),stripslashes($Condition1));



    $statement = $connection->prepare($sql);
    $statement->bindParam(':CountryCode', $CountryCode, PDO::PARAM_STR);
    $statement->bindParam(':Language', $Language, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
if (isset($_POST['submit2'])) {
  try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $Condition1 = $_POST['Condition1'];
    $Condition2 = $_POST['Condition2'];

    $sql2 = sprintf("SELECT *
    FROM  %s
    WHERE %s BETWEEN '%s' AND '%s' ","Lang","PercentageOfSpeakers",stripslashes($Condition1),stripslashes($Condition2));


    $statement = $connection->prepare($sql2);
    $statement->bindParam(':Condition1', $Condition1, PDO::PARAM_STR);
    $statement->bindParam(':Condition2', $Condition2, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql2 . "<br>" . $error->getMessage();
  }
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

<?php
if (isset($_POST['submit1'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2 align="center">Results</h2>

    <table align = "center">
      <thead>
<tr>
  <th>CountryCode</th>
  <th>Language</th>
  <th>OfficialLanguage</th>
  <th>PercentageOfSpeakers</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["CountryCode"]); ?></td>
<td><?php echo escape($row["Language"]); ?></td>
<td><?php echo escape($row["OfficialLanguage"]); ?></td>
<td><?php echo escape($row["PercentageOfSpeakers"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['CountryCode']); ?>.
  <?php }
} ?>

<?php
if (isset($_POST['submit2'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2 align="center">Results</h2>

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
  <?php foreach ($result as $row) { ?>
      <tr>
        <td><?php echo escape($row["CountryCode"]); ?></td>
        <td><?php echo escape($row["Language"]); ?></td>
        <td><?php echo escape($row["OfficialLanguage"]); ?></td>
        <td><?php echo escape($row["PercentageOfSpeakers"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for Population between <?php echo escape($_POST['Condition1']); ?> and <?php echo escape($_POST['Condition2']); ?>.
  <?php }
} ?>
<div>
<p class="title">SEARCH LANGUAGE</p>

<h2>Search Language Equal</h2>
<form method="post">
  <label for="ColumnName">ColumnName</label>
  <select ID="ConditionName" name="ConditionName" placeholder="ColumnName" >
    <option value = "CountryCode">Choose ColumnName</option>
    <option value = "CountryCode">CountryCode</option>
    <option value = "Language">Language</option>
    <option value = "OfficialLanguage">OfficialLanguage</option>
    <option value = "PercentageOfSpeakers">PercentageOfSpeakers</option>
  <input type="text" ID="Condition1" name="Condition1" placeholder="Condition1">
  <input type="submit" name="submit1" value="View Results">
</form>

<h2>Search Language based on PercentageOfSpeakers</h2>

<form method="post">
  <label for="ColumnName">ColumnName</label>
  <input type="text" ID="Condition1" name="Condition1" placeholder="PercentageOfSpeakers From">
  <input type="text" ID="Condition2" name="Condition2" placeholder="PercentageOfSpeakers To">
  <input type="submit" name="submit2" value="View Results">
</form>

<p align="center"><a href="language.php" style="text-decoration:none;">Return</a></p>
</div>

<?php require "templates/footer.php"; ?>
