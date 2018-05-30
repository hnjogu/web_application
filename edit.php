<?php
   include "header.php";
   include "navigation_dashboard.php";
   include "main.php";
   //include('session.php');
?>

						<h2>View Records</h2>
						<table width="100%" border="1" style="border-collapse:collapse;">
						<thead>
						<tr>
						<th><strong>S.No</strong></th>
						<th><strong>Name</strong></th>
						<th><strong>Age</strong></th>
						<th><strong>Edit</strong></th>
						<th><strong>Delete</strong></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$count=1;
						$sel_query="Select * from new_record ORDER BY id desc;";
						$result = mysqli_query($con,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<tr><td align="center"><?php echo $count; ?></td>
						<td align="center"><?php echo $row["name"]; ?></td>
						<td align="center"><?php echo $row["age"]; ?></td>
						<td align="center">
						<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
						</td>
						<td align="center">
						<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
						</td>
						</tr>
