<?php

/**
  * Function to query information based on
  * a parameter: in this case, CountryCode.
  *
  */

if (isset($_POST['submit'])) {
  try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $ConditionName = $_POST['ConditionName'];
    $Condition1 = $_POST['Condition1'];

    $sql = sprintf("SELECT *
    FROM  %s
    WHERE %s = '%s' ","Country",$ConditionName,stripslashes($Condition1));

    $statement = $connection->prepare($sql);
    // $statement->bindParam(':Table', $Table, PDO::PARAM_STR);
    // $statement->bindParam(':ConditionName', $ConditionName, PDO::PARAM_STR);
    // $statement->bindParam(':Condition1', $Condition1, PDO::PARAM_STR);
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

    $ConditionName = $_POST['ConditionName'];
    $Condition1 = $_POST['Condition1'];
    $Condition2 = $_POST['Condition2'];

    $sql2 = sprintf("SELECT *
    FROM  %s
    WHERE %s BETWEEN %s AND %s","Country",$ConditionName,$Condition1,$Condition2);

    $statement = $connection->prepare($sql2);
    // $statement->bindParam(':Table', $Table, PDO::PARAM_STR);
    // $statement->bindParam(':ConditionName', $ConditionName, PDO::PARAM_STR);
    // $statement->bindParam(':Condition1', $Condition1, PDO::PARAM_STR);
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

<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2 align="center">Results</h2>

    <table align="center">
      <thead>
<tr>
  <th>CountryCode</th>
  <th>CountryName</th>
  <th>Continent</th>
  <th>Region</th>
  <th>SurfaceArea</th>
  <th>IndependenceYear</th>
  <th>Population</th>
  <th>LifeExpectancy</th>
  <th>GNP</th>
  <th>GNPOld</th>
  <th>LocalName</th>
  <th>GovermentForm</th>
  <th>HeadOfState</th>
  <th>CountryCode2</th>
  <th>Capital</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
        <td><?php echo escape($row["CountryCode"]); ?></td>
        <td><?php echo escape($row["CountryName"]); ?></td>
        <td><?php echo escape($row["Continent"]); ?></td>
        <td><?php echo escape($row["Region"]); ?></td>
        <td><?php echo escape($row["SurfaceArea"]); ?></td>
        <td><?php echo escape($row["IndependenceYear"]); ?></td>
        <td><?php echo escape($row["Population"]); ?></td>
        <td><?php echo escape($row["LifeExpectancy"]); ?></td>
        <td><?php echo escape($row["GNP"]); ?></td>
        <td><?php echo escape($row["GNPOld"]); ?></td>
        <td><?php echo escape($row["LocalName"]); ?></td>
        <td><?php echo escape($row["GovermentForm"]); ?></td>
        <td><?php echo escape($row["HeadOfState"]); ?></td>
        <td><?php echo escape($row["CountryCode2"]); ?></td>
        <td><?php echo escape($row["Capital"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
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
  <th>CountryCode</th>
  <th>CountryName</th>
  <th>Continent</th>
  <th>Region</th>
  <th>SurfaceArea</th>
  <th>IndependenceYear</th>
  <th>Population</th>
  <th>LifeExpectancy</th>
  <th>GNP</th>
  <th>GNPOld</th>
  <th>LocalName</th>
  <th>GovermentForm</th>
  <th>HeadOfState</th>
  <th>CountryCode2</th>
  <th>Capital</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
        <td><?php echo escape($row["CountryCode"]); ?></td>
        <td><?php echo escape($row["CountryName"]); ?></td>
        <td><?php echo escape($row["Continent"]); ?></td>
        <td><?php echo escape($row["Region"]); ?></td>
        <td><?php echo escape($row["SurfaceArea"]); ?></td>
        <td><?php echo escape($row["IndependenceYear"]); ?></td>
        <td><?php echo escape($row["Population"]); ?></td>
        <td><?php echo escape($row["LifeExpectancy"]); ?></td>
        <td><?php echo escape($row["GNP"]); ?></td>
        <td><?php echo escape($row["GNPOld"]); ?></td>
        <td><?php echo escape($row["LocalName"]); ?></td>
        <td><?php echo escape($row["GovermentForm"]); ?></td>
        <td><?php echo escape($row["HeadOfState"]); ?></td>
        <td><?php echo escape($row["CountryCode2"]); ?></td>
        <td><?php echo escape($row["Capital"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['CountryCode']); ?>.
  <?php }
} ?>

<p class="title" align="center">SEARCH COUNTRY</p>

<div>
<h2>Search Country Equal</h2>
<form method="post">
  <label for="CountryCode">CountryCode</label>
  <select ID="ConditionName" name="ConditionName" placeholder="ColumnName" >
    <option value = "CountryCode">Choose ColumnName</option>
    <option value = "CountryCode">CountryCode</option>
    <option value = "CountryName">CountryName</option>
    <option value = "Continent">Continent</option>
    <option value = "Region">Region</option>
    <option value = "SurfaceArea">SurfaceArea</option>
    <option value = "IndependenceYear">IndependenceYear</option>
    <option value = "Population">Population</option>
    <option value = "LifeExpectancy">LifeExpectancy</option>
    <option value = "GNP">GNP</option>
    <option value = "GNPOld">GNPOld</option>
    <option value = "LocalName">LocalName</option>
    <option value = "GovermentForm">GovermentForm</option>
    <option value = "HeadOfState">HeadOfState</option>
    <option value = "CountryCode2">CountryCode2</option>
    <option value = "Capital">Capital</option>
  </select>
  <input type="text" ID="Condition1" name="Condition1" placeholder="Condition">
  <input type="submit" name="submit" value="View Results">
</form>

<h2>Search Country Between</h2>


<form method="post">
  <label for="CountryCode">CountryCode</label>
  <select ID="ConditionName" name= "ConditionName" placeholder="ColumnName">
    <option value = "CountryCode">Choose ColumnName</option>
    <option value = "CountryCode">CountryCode</option>
    <option value = "CountryName">CountryName</option>
    <option value = "Continent">Continent</option>
    <option value = "Region">Region</option>
    <option value = "SurfaceArea">SurfaceArea</option>
    <option value = "IndependenceYear">IndependenceYear</option>
    <option value = "Population">Population</option>
    <option value = "LifeExpectancy">LifeExpectancy</option>
    <option value = "GNP">GNP</option>
    <option value = "GNPOld">GNPOld</option>
    <option value = "LocalName">LocalName</option>
    <option value = "GovermentForm">GovermentForm</option>
    <option value = "HeadOfState">HeadOfState</option>
    <option value = "CountryCode2">CountryCode2</option>
    <option value = "Capital">Capital</option>
  </select>
  <input type="text" ID="Condition1" name="Condition1" placeholder="Condition1">
  <input type="text" ID="Condition2" name="Condition2" placeholder="Condition2">
  <input type="submit" name="submit2" value="View Results">
</form>

<p>
<a href="country.php" style="text-decoration:none;">Return</a>
</p>
</div>

<?php require "templates/footer.php"; ?>
