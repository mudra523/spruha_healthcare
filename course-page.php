<?php
	
	// Connect to database
	$con = mysqli_connect("localhost","root","","courses");

	// Get all the courses from courses table
	// execute the query
	// Store the result
	$sql = "SELECT * FROM `courses`";
	$Sql_query= mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
	
	<!-- Using internal/embedded css -->
	<style>
		.btn{
			background-color: red;
			border: none;
			color: white;
			padding: 5px 5px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 20px;
		}
		.green{
			background-color: #199319;
		}
		.red{
			background-color: red;
		}
		table,th{
			border-style : solid;
			border-width : 1;
			text-align :center;
		}
		td{
			text-align :center;
		}
	</style>	
</head>

<body>
	<h2>Courses Table</h2>
	<table>
		<!-- TABLE TOP ROW HEADINGS-->
		<tr>
			<th>Course Name</th>
			<th>Course Status</th>
			<th>Toggle</th>
		</tr>
		<?php

			// Use foreach to access all the courses data
			while($rows = mysqli_fetch_array($Sql_query)) { ?>
			<tr>
				<td><?php echo $rows['Course_name']; ?></td>
				<td><?php
						// Usage of if-else statement to translate the
						// tinyint status value into some common terms
						// 0-Inactive
						// 1-Active
						if($rows['status']=="1")
							echo "Active";
						else
							echo "Inactive";
					?>						
				</td>
				<td>
					<?php
					if($rows['status']=="1")

						// if a course is active i.e. status is 1
						// the toggle button must be able to deactivate
						// we echo the hyperlink to the page "deactivate.php"
						// in order to make it look like a button
						// we use the appropriate css
						// red-deactivate
						// green- activate
						echo
"<a href=deactivate.php?id=".$rows['id']." class='btn red'>Deactivate</a>";
					else
						echo
"<a href=activate.php?id=".$rows['id']." class='btn green'>Activate</a>";
					?>
			</tr>
		<?php
				}
				// End the foreach loop
		?>
	</table>
</body>

</html>
