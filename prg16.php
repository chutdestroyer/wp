<?php
$conn=new mysqli("localhost","root","","mydb");
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $regno = $_POST['regno'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    
    switch ($_POST['action']){
        case 'Add' :
            $sql = "INSERT INTO student VALUES('$regno','$name','$age','$course') ";
            break;
        case 'Update' :
            $sql = "UPDATE student SET name='$name',age='$age',course='$course' WHERE regno='$regno'";
            break;
        case 'Delete' :
            $sql = "DELETE FROM student WHERE regno='$regno'";
            break;
    }
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function displaystudents($conn){
    $sql = "SELECT * FROM student";
    $result = $conn ->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Reg No</th><th>Name</th><th>Age</th><th>Course</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["regno"].
                 "</td><td>".$row["name"].
                 "</td><td>".$row["age"].
                 "</td><td>".$row["course"].
                 "</td></tr>";
            }
            echo "</table>";
        }else {
            echo "0 results";
        }
}
?>

<html>
<head>
    <title>Student  Database Management</title>
</head>
<body>
    <h1>Manage Students</h1>
    <form method="post">
        Reg No: <input type="text" name="regno" required><br><br>
        Name: <input type="text" name="name"><br><br>
        Age: <input type="number" name="age"><br><br>
        Course: <input type="text" name="course"><br><br>
        <input type="submit" name="action" value="Add">
        <input type="submit" name="action" value="Update">
        <input type="submit" name="action" value="Delete">
</form>

<?php
    displaystudents($conn);
    $conn->Close();
?>
</body>
</html>