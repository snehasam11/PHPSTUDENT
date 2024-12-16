<?php
include 'conn.php';

if(isset($_POST['submit'])) {
    $id1 = $_POST['id'];
    
    // SQL query to search for the student based on the provided ID
    $sql = "SELECT * FROM student WHERE studentid='$id1'";
    $result = mysqli_query($conn, $sql);
    
    // Check if the student with the given ID exists
    if (mysqli_num_rows($result) > 0) {
        // If found, display all the fields of that row
        $row = mysqli_fetch_assoc($result);
        echo "<br>id: " . $row["studentid"] . "<br>";
        echo "Name: " . $row["Name"] . "<br>";
        echo "Semester: " . $row["Semester"] . "<br>";
        echo "Course: " . $row["Course"] . "<br>";
        echo "Gender: " . $row["Gender"] . "<br>";
        echo "Hobbies: " . $row["Hobbies"] . "<br>";
    } else {
        // If no record is found, display an error message
        echo "Record not found.";
    }
    
    mysqli_close($conn);
} else {
?>

<html>
 <body>
    <center>
        <form action="" method="post">
            Student Id: <input type="text" name="id">
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </center>
 </body>
</html>

<?php } ?>
