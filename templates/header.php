<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>WORLD</title>
<link rel="stylesheet" href="css/style.css" />
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
}
.title{
  font-size: 30px;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
}
h1{
	font-size: 50px;
	color: #ffffff;
}
body{
	font-family: Arial, Helvetica, sans-serif;
	font: 15px;
	margin: 0;
}
header{
	background-color: #000000;
	padding: 5px;
	min-height: 0px;
}
.navigator{
	padding: 10px;
	text-align: center;
	font-family: Helvetica, sans-serif;
	font-weight: bold;
	background-color: #ddd;
	overflow: hidden;
}
.navigator a{
	padding: 10px;
	float: bottom;
	text-align: center;
	text-decoration: none;
	font-size: 20px;
	margin-left: 40px;
}
/*unvisited link*/
a:link{
	color: black;
}
/*visited link*/
a:visited{
	color: black;
}
/*mouse over link*/
a:hover{
	color: #595959;
}
/*selected link*/
a:active{
	color: black;
}
.row {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
}
/* Create four equal columns that sits next to each other */
.column {
  flex: 25%;
  max-width: 24%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
}
/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    flex: 50%;
    max-width: 50%;
  }
}
/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    flex: 100%;
    max-width: 100%;
  }
}
* {
  box-sizing: border-box;
}

th, td{
	padding: 10px;
	width: 300px;
	text-align: center;
	}
img {
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
}
.container {
  position: relative;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #ddd;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: black;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>
</head>
<body>
  <header>
    <h1 align="center">WORLD&#8482</h1>
  </header>
</body>
</html>
