<?php
include 'conn.php';
if(isset($_POST['submit']))
{
	$fname=$_POST['name'];
	$sem=$_POST['semester'];
	$crse=$_POST['course'];
	$gender1=$_POST['gender'];
	
	// Handle hobbies as an array and join them into a single string
   	 	if (isset($_POST['hobbies']))
		 	{
       			 $hobbies1 = implode(", ", $_POST['hobbies']); // Convert array to comma-separated string
    			} 
		else 
			{
        		$hobbies1 = ""; // If no hobbies are selected, set as empty
    			}
	$sql = "INSERT INTO student(Name,Semester,Course,Gender,Hobbies)VALUES ('$fname','$sem','$crse','$gender1','$hobbies1')";

	if (mysqli_query($conn, $sql)) {
  		header("Location: homepage.php");
		} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	mysqli_close($conn);
}
else
{
?>
<html>
	<body>
	<center>
		<form action="" method="post">
		Student Name:
		<input type="textbox" name="name"><br>
		Semester:
		<input type="textbox" name="semester"><br>
		Course:
		<input type="textbox" name="course"><br>
		Gender:
		<input type="radio" name="gender" value="female"> Female
		<input type="radio" name="gender" value="male">Male<br>
		Hobbies:
		<input type="checkbox" name="hobbies[]" value="sports">Sports
		<input type="checkbox" name="hobbies[]" value="reading">Reading
		<input type="checkbox" name="hobbies[]" value="dance">Dance
		<input type="checkbox" name="hobbies[]" value="music">Music<br>
		<input type="submit" name="submit" value="Submit"><br>
	</form>
	</center>
	</body>
</html>
<?php
}
?>