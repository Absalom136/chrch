<!DOCTYPE html>
<html>
<img src="logo2.jpg" alt="logo" height="50" width="100"/>
<head>
	<meta charset="utf-8">	
	<title>Sevice Booking</title>
	<h1 align="center">Welcome to AIC Lucky Summer Church Second Service</h1>
	<link rel="stylesheet" type="text/css" href="tablestyle2.css">
</head>
<body>
	<div class="container">
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by name.." title="Type in a name" name="tafta">
	<br><br>
	<form method="POST" action="bookinghome.php" enctype="multipart/form-data">
	<table id="myTable">
		<thead>
		<tr><th>No.</th>
			<th>Name</th>
			<th>Cell Phone</th>
			<th>Email</th>
			<th>Residential</th>
		</tr> 
		</thead>
		<tbody>
<?php 
session_start();
//connect to database 

$link = mysqli_connect('localhost', 'root', '', 'employee');

 $query = "SELECT COUNT(*) AS count FROM 2nd_registration";
 $query_result = mysqli_query($link, $query);
 while ($row = mysqli_fetch_assoc($query_result)) {
 	$output = '<b><font color = "#4B0082">Total Records: </color></b>'.$row['count'];
}
$absa =mysqli_query($link, "SELECT * from 2nd_registration") or die('Could not connect!') ;
$sr = 1;
while ($row = mysqli_fetch_array($absa)) {?>
	<tr>
		<td><?php echo $sr;?></td>
		<td><?php echo $row['username'];?></td>
		<td><?php echo $row['cellphone'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['residential'];?></td>
		
	</tr>

	<?php $sr++;
}
 ?>
 <?php 
 echo $output;
 ?>
 <?php  
$x=100;
echo "<b>Slots Remaining: </b>",$x-$sr+1;
 ?>
<br><br>
 <div><a href="1tsrvc_chrch_reg.php" style="background-color: #228B22;
	color: white;
	text-align: center;
	top: 0px;
	width: 100%
	height: 20px;
	border-radius: 10px 10px 10px 10px;
	padding: 5px;">First Service</a></div>
	<br>
	 <div><a href="2ndsrvc_chrch_reg.php" style="background-color: #000000;
	color: white;
	text-align: center;
	top: 0px;
	width: 100%
	height: 20px;
	border-radius: 10px 10px 10px 10px;
	padding: 5px;">Second Service</a></div>
	<br>
	</tbody>
	</table>

	<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>
 </form>
 </body>
</div>
</html>