<?php
  include 'db_connection.php';
  $conn = OpenCon();
  //echo "Connected Successfully";
  CloseCon($conn);
?>

<?php include "templates/header.php"; ?>

<div class="navigator">
    <a href="city.php"><strong>CITY</strong></a>
    &nbsp;
		&nbsp;
		&nbsp;
		&nbsp;
		&nbsp;
		&nbsp;
    <a href="country.php"><strong>COUNTRY</strong></a>
    &nbsp;
		&nbsp;
		&nbsp;
		&nbsp;
		&nbsp;
		&nbsp;
    <a href="language.php"><strong>LANGUAGE</strong></a>
</div>
<div class="row" align="center">
		<div class="column">
			<img src="forest.jpg" style="width:100%">
			<img src="underwater.jpg"style="width:100%">
			<img src="falls.jpg"style="width:100%">
			<img src="buildings.jpg"style="width:100%">
			<img src="zebra.jpg"style="width:100%">
			<img src="mist.jpg"style="width:100%">
			<img src="buildings.jpg"style="width:100%">
		</div>
		<div class="column">
			<img src="earth.jpg" style="width:100%">
			<img src="sea.jpg"style="width:100%">
			<img src="forest.jpg"style="width:100%">
			<img src="mountainskies.jpg"style="width:100%">
			<img src="underwater.jpg"style="width:100%">
			<img src="earth.jpg"style="width:100%">
		</div>
		<div class="column">
			<img src="forest.jpg" style="width:100%">
			<img src="underwater.jpg"style="width:100%">
			<img src="falls.jpg"style="width:100%">
			<img src="buildings.jpg"style="width:100%">
			<img src="zebra.jpg"style="width:100%">
			<img src="mist.jpg"style="width:100%">
			<img src="buildings.jpg"style="width:100%">
		</div>
		<div class="column">
			<img src="earth.jpg" style="width:100%">
			<img src="sea.jpg"style="width:100%">
			<img src="forest.jpg"style="width:100%">
			<img src="mountainskies.jpg"style="width:100%">
			<img src="underwater.jpg"style="width:100%">
			<img src="earth.jpg"style="width:100%">
		</div>
	</div>

<?php include "templates/footer.php"; ?>
