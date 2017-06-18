<?php


// create a variable

$week_name=$_POST['week_name'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$text=$_POST['text'];
$workingdays=$_POST['workingdays'];

//Execute the query


mysqli_query($connect,"INSERT INTO weeks (week_name,startdate,enddate,text,workingdays)
		        VALUES ('$week_name','$startdate','$enddate','$text','$workingdays')");

if(mysqli_affected_rows($connect) > 0){
    echo "<p>Employee Added</p>";
    echo "<a href='index.php'>Go Back</a>";
} else {
    echo "Employee NOT Added<br />";
    echo mysqli_error ($connect);
}