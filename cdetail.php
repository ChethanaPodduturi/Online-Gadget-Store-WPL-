<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Welcome to Oil Management System </title>
	<link href="profile.css" rel="stylesheet" type="text/css">
	</head>
	<body>
<style>
p{color:blue
  
}
</style>
	<p><b><u>CLIENT DETAILS:</u></b></p><br/><br/><br/>
	

	<?php
	// Connect to database server
	$connection=mysqli_connect("localhost", "root", "");

	// Select database
	$db=mysqli_select_db($connection,"utd_oil");
	

	// SQL query
	$strSQL = "SELECT * FROM client c,address a,account a1 where c.Client_id=a.Client_id and c.Client_id=a1.Client_id and a.Client_id=a1.Client_id";
	

	// Execute the query (the recordset $rs contains the result)
	$rs = mysqli_query($connection,$strSQL);
	

	 echo "<table>
	 
			<tr>
			
				<td>Client id:</td>
				<td>First Name: </td>
				<td>Last Name: </td>
				<td>Email: </td>
				<td>Phone Number: </td>
				<td>Cell Number: </td>
				<td>Current Status: </td>
				<td>City: </td>
				<td>State: </td>
				<td>Account ID: </td>
				<td>Cash Reserves: </td>
				<td>Oil Reserves: </td>
				<td>Barrel History: </td>
				</tr>";
		
		
		while($row = mysqli_fetch_array($rs,MYSQL_ASSOC))
		{	
					echo "<tr><td>".$row['Client_id']."</td>";
							echo "<td>".$row['Fname']. "</td>";
							echo "<td>".$row['Lname']. "</td>";
							echo "<td>".$row['email_id']. "</td>";
							echo "<td>".$row['Phn_no']. "</td>";
							echo "<td>".$row['cell_no']. "</td>";
							echo "<td>".$row['role']. "</td>";
							echo "<td>".$row['City']. "</td>";
							echo "<td>".$row['State']. "</td>";
							echo "<td>".$row['Account_id']. "</td>";
							echo "<td>".$row['cash_reserves']. "</td>";
							echo "<td>".$row['oil_reserves']. "</td>";
							echo "<td>".$row['barrel_history']. "</td>";
							/*<td><?php echo $lname ?></td>
							<td><?php echo $email?></td>
							<td><?php echo $phn ?></td>
							<td><?php echo $cell ?></td>
							<td><?php echo $role ?></td>
							<td><?php echo $city ?></td>
							<td><?php echo $state ?></td>
							<td><?php echo $account_id ?></td>
							<td><?php echo $cash_reserves ?></td>
							<td><?php echo $oil_reserves?></td>
							<td><?php echo $barrel_history ?></td></tr>*/
				
	
		}
	echo "</table>";
	
	mysqli_close($connection);
	
?>
	
	

    
    


</body>
</html>

