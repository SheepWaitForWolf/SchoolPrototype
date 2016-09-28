<?php
$q = intval($q = $_REQUEST['q']);

$con = mysqli_connect('localhost','root','','schoolportal');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"schools");
$sql="SELECT school_name FROM schools WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<option>";
while($row = mysqli_fetch_array($result)) {
	echo "<option>";
    echo $row['school_name'];
    echo "</option>";
}
echo "</option>";

mysqli_close($con);
?> 



