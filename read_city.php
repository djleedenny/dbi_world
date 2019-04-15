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
    FROM City
    WHERE %s = '%s'",$ConditionName, stripslashes($Condition1));

    //$CountryCode = $_POST['CountryCode'];

    $statement = $connection->prepare($sql);
    //$statement->bindParam(':CountryCode', $CountryCode, PDO::PARAM_STR);
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

    $sql2 = "SELECT *
    FROM City
    WHERE Population BETWEEN :Pop1 AND :Pop2";

    $Pop1 = $_POST['Pop1'];
    $Pop2 = $_POST['Pop2'];


    $statement = $connection->prepare($sql2);
    $statement->bindParam(':Pop1', $Pop1, PDO::PARAM_STR);
    $statement->bindParam(':Pop2', $Pop2, PDO::PARAM_STR);
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
<?php
if (isset($_POST['submit1'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2 align="center">Results</h2>

<div  style="overflow-x:auto;">
    <table align="center">
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
</div>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['Condition1']); ?>.
  <?php }
} ?>

<?php
if (isset($_POST['submit2'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2 align="center">Results</h2>

    <table align="center">
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
    > No results found for Population between <?php echo escape($_POST['Pop1']); ?> and <?php echo escape($_POST['Pop2']); ?>.
  <?php }
} ?>


<p class="title" align="center">SEARCH CITY</p>
<div>
<h2>Search City Equal</h2>

<form method="post">
  <label for="CountryCode">ColumnName</label>
  <select ID="ConditionName" name="ConditionName" placeholder="ColumnName" >
    <option value = "ColumnName">Choose ColumnName</option>
    <option value = "CityName">CityName</option>
    <option value = "CountryCode">CountryCode</option>
    <option value = "StateName">StateName</option>
    <option value = "Population">Population</option>
  <input type="text" ID="Condition1" name="Condition1">
  <input type="submit" name="submit1" value="View Results">
</form>

<h2>Search City based on Population</h2>

<form method="post">
  <label for="Population">Population between</label>
  <input type="text" ID="Pop1" name="Pop1">
  <input type="text" ID="Pop2" name="Pop2">
  <input type="submit" name="submit2" value="View Results">
</form>

<p>
<a href="city.php" style="text-decoration:none;">Return</a>
</p>
</div>
<?php require "templates/footer.php"; ?>
