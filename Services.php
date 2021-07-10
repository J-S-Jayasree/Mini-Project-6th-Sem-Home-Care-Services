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
else{  
echo 'Connected successfully','<br>';
}

$mailid=$_POST["email"]??null;
$pass=$_POST["pwd"]??null;
$sql = "SELECT cemail,cpassword from home_care_services.customer";
$result = $conn->query($sql);
$flag=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
        if($mailid==$row["cemail"] && $pass==$row["cpassword"])
		{
			echo "Welcome Back";
			$flag=1;
			break;
		}
    }
} else {
    echo "0 results";
}
if($flag==0)
{
	echo '<script type="text/JavaScript"> 
     alert("Invalid Credentials");
     </script>';
}
else{
echo '<a href="http://localhost/Mini%20Project/About/bookaservice.html"><center><button class="btn" type="button"  style=" border: none;color: white;padding: 15px 32px;text-align: center; text-decoration: none;
  display: inline-block;font-size: 20px;margin: 4px 2px;cursor: pointer;background-color: #4CAF50;width:50%;">Book a Service !!</button></center></a>'.'<br>';
 
}




?>  


</body>
</html>