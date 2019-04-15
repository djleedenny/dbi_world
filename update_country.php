<?php
/**
 * List all users with a link to edit
 */
require "config.php";
require "common.php";
try {
  $connection = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT * FROM Country";
  $statement = $connection->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
<head>
<style>
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
<p class="title" align="center">UPDATE COUNTRY</p>
<p align="center"><a href="country.php" style="text-decoration:none;">Return</a></p>

<div  style="overflow-x:auto;">
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
    <?php foreach ($result as $row) : ?>
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
          <td><a href="update-single_country.php?CountryCode=<?php echo escape($row["CountryCode"]); ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

<?php require "templates/footer.php"; ?>
