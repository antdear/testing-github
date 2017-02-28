<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>School project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>

<body>

<div class="container">
	<h1>Courses </h1>
    
	<!-- Here's the "Add teacher" button -->
	<p>
		<a href="addcourse.php" class="btn btn-success">Add course</a>
		<a href="index.php" class="btn" >Home</a>
    </p>
           
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Course Id</th>
                      <th>Course name</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
				   include 'db_parameters.php';
                   
				   // Open a db connection
				   openDbConnection($dbcon);
				   if (!$dbcon)
				   {
						exit("Can not connect to database");
				   }
                   
				   $query = 'SELECT courseId, courseName FROM course';
                   $result = @mysqli_query ($dbcon, $query); // Run the query.
				   
				   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							echo '<tr>';
                            echo '<td>'. $row['courseId'] . '</td>';
                            echo '<td>'. $row['courseName'] . '</td>';
							echo '<td width=250>';
                                echo '<a class="btn btn-danger" href="deletecourse.php?courseId='.$row['courseId'].'">Delete</a>';
                                echo '</td>';
							echo '</tr>';
				   }
					
					mysqli_free_result ($result); // Free up the resources.	
                   
					mysqli_close($dbcon); // Close the database connection
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>



