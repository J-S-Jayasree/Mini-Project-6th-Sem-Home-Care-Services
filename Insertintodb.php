<!DOCTYPE html>
<html>
<body>

<?php
$host = 'localhost:3306';  
$user = 'root';  
$pass = 'indira@123';
$db='home_care_services';  
$conn =  new mysqli($host, $user, $pass,$db);  
if(! $conn )  
{  
  die('Could not connect: ' . mysqli_error());  
}
else
{
echo '<a href="http://localhost/Mini%20Project/About/bookaservice.html"><center><button class="btn" type="button"  style=" border: none;color: white;padding: 15px 32px;text-align: center; text-decoration: none;
  display: inline-block;font-size: 20px;margin: 4px 2px;cursor: pointer;background-color: #4CAF50;width:50%;">Book a Service !!</button></center></a>'.'<br>';
}
$name=$_POST["first_name"];
$email=$_POST["email"];
$pass=$_POST["password"];
$ph=$_POST["phone"];
$add=$_POST["comment"]??null;

$sql = "SELECT cid,cname,cpassword from home_care_services.customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$lat=$row["cid"];       
    }
} else {
    echo "0 results";
}
$lat=$lat+1;



$sql1 = "INSERT INTO home_care_services.customer ". "(cid,cname,cphone,cpassword,cemail,cadd,membersince) ". "VALUES('$lat','$name','$ph','$pass','$email','$add',NOW())";
$retval = mysqli_query($conn,$sql1 );
            
            if(! $retval ) {
               die('Could not enter data: ' . $conn->error);
            }
            
            echo "Entered data successfully\n";
			
//$sql1=$conn->prepare("insert into home_care_services.customer (`cid`,`cname`,`cphone`,`cpassword`,`cemail`,`cadd`) values(?,?,?,?,?,?)");
//$sql1->bind_param("isssss",$lat,$_POST["first_name"],$_POST["phone"],$_POST["password"],$_POST["email"],$_POST["comment"]);
//$sql1->execute();
//echo ($sql1->affected_rows > 2)? "Success!" : "Failed";


echo "Welcome ".$name."<br>";

mysqli_close($conn); 

?>  


</body>
</html>