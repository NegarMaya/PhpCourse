<?php
include "../publics.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$job=isset($_REQUEST['job']) ? $_REQUEST['job'] : '';
//echo $job;

if ($job=="login")
{
        $email= getCleanText(isset($_POST['email']) ? $_REQUEST['email'] : '');
        $password= isset($_POST['password']) ? $_REQUEST['password'] : '';
        $code = $_REQUEST ['captcha'];
    if ($code == $_SESSION['captcha'])
    {
        $conn = getConnection();
        $pwd = "rasmuslerdorf";
    if ($password!='')
    {
	$query = "select password,userfullname,userphoto from users where username=? or email=? ";
	$stmt = $conn->stmt_init();
	if ($stmt->prepare($query)) 
	{
		$stmt->bind_param("ss", $email,$email);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($row = $result->fetch_array(MYSQLI_NUM)) 
		{
			//echo $row[1];
			if( password_verify($pwd,$row[0]) )
			{
				$_SESSION["username"] = $row[1];
				$_SESSION["userphoto"] = $row[2];
				//echo $_SESSION["username"] ;

				header ("refresh:4; url=../panelCMS.php"); // echo must be the first line
				echo "WELCOME". $row[1];
			}                
            else
			{
				print "The username or password do not match";
				header ("refresh:4; url=login.php");
				echo "Usename or password is not correct";
			}
		}
	}
}
else
{
   print "The username or password do not match";
	header ("refresh:4; url=login.php");
	echo "Usename or password is not correct"; 
}

} 
else 
{
  echo "captcha is wrong";
}
}	
   
if(isset($_POST['Log-out'])) {
	$_SESSION["username"] = null;
}

if(isset($_POST['sign-up'])) {
	$_SESSION["username"] = null;
}

/*==========================================================================*/

if ($job=="checkDuplicate")
{
	//$Name= mysql_real_escape_string($_REQUEST['name']);
	$email= isset($_POST['email']) ? $_POST['email'] : '';
	$conn=getConnection();
	
	//mysqli_query($con,$sql)  or $conn->query($duplicate)
	
	//$duplicate= "select * from users where userfullname='Ali Hamedi'";
	$result = $conn->query("Select * From users Where email='$email'");
	//$result = mysql_query("SELECT * FROM article WHERE articleName='".$ArticleName."'",$conn);
	
	if (mysqli_num_rows($result)!=0)
	{
	//$data=array("0","duplicate"); // This is your data array/result
    //echo json_encode($data); // use json_encode to convert it to json encoded string //duplicate behtar as =t az number use konim
		//die(json_encode($data));
		echo "false";
	}
	else
	{
	 /*$data=array("id"=>1, "text"=>"non-duplicate"); // This is your data array/result
    echo json_encode($data);
		die(json_encode($data));*/
		echo "true";
	}
}
	
/*==========================================================================*/

if ($job=="submitRegister")
{
    //echo "here";
	//$Name= mysql_real_escape_string($_REQUEST['name']);
	$name= isset($_POST['name']) ? $_REQUEST['name'] : '';
	$email= isset($_POST['email']) ? $_REQUEST['email'] : '';
	$username= isset($_POST['username']) ? $_REQUEST['username'] : '';
	$password= isset($_POST['password']) ? $_REQUEST['password'] : '';
	
	//echo $email;
	
	if($password!='')
	{
		/*$options = [
			'cost' => 11,
			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];*/
		//$hashpass=password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
		$hashpass=password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
	}
	
	$conn=getConnection();

$uploadedFile = $_FILES['photo']['tmp_name'];
$size = getimagesize($uploadedFile);
$destination = "uploaded/".$_FILES['photo']['name'];

//if(move_uploaded_file($uploadedFile, $destination))
//{
    $query = "INSERT INTO users (userfullname,username,password,email) VALUES (?, ?, ?, ?)";
	$stmt = $conn->stmt_init();
	if ($stmt->prepare($query)) 
	{
		$stmt->bind_param("ssss", $name, $username, $hashpass, $email);
		$result =$stmt->execute();
		//$result = $stmt->get_result();
        
        /*prepare sql query here and insert
        $sql = "INSERT INTO users (userfullname,username,password,email) VALUES ('$name','$username','$hashpass','$email');";
		$result = $conn->query($sql);*/
		
        if($result){

			header ("refresh:4; url=login.php");
			echo "User saved in database successfully <strong>{$filePath}</strong>";
			echo "submitOk";

        }else
        {
			header ("refresh:4; url=register.php");
			echo "submitFailed";
        }
                
        $stmt->close();
//
}
// else
// {
//     echo $uploadedFile;
//     echo "File not uploaded there are an error <strong>{$file}</strong>";

// }

}

/*==========================================================================*/

if ($job=="sumbitpost")
{
    //echo "here";
	//$Name= mysql_real_escape_string($_REQUEST['name']);
	$titlepost= isset($_POST['titlepost']) ? $_REQUEST['titlepost'] : '';
	$writerpost= isset($_POST['writerpost']) ? $_REQUEST['writerpost'] : '';
	$bodypost= isset($_POST['bodypost']) ? $_REQUEST['bodypost'] : '';	
	//echo $email;
	
	$conn=getConnection();

    $file = $_FILES["file"]["name"];
    $filePath = "uploaded/" . $file;

//	if(move_uploaded_file($_FILES["file"]["tmp_name"], $filePath))
//	{
    $query = "INSERT INTO blogpost (titlepost,writerpost,bodypost) VALUES (?,?,?)";
	$stmt = $conn->stmt_init();
	if ($stmt->prepare($query)) 
	{
		$stmt->bind_param("sss", $titlepost, $writerpost, $bodypost);
		$result =$stmt->execute();
		//$result = $stmt->get_result();

        /*prepare sql query here and insert
        $sql = "INSERT INTO users (userfullname,username,password,email) VALUES ('$name','$username','$hashpass','$email');";
		$result = $conn->query($sql);*/
        if($result){

			header ("refresh:4; url=blog.php?job=allblog");
			echo "post saved in database successfully <strong>{$filePath}</strong>";
			echo "submitOk";

        }else{
			header ("refresh:4; url=register.php");
		    echo "submitFailed";
        }
                
        $stmt->close();

        /*prepare sql query here and insert
        $sql = "INSERT INTO blogpost (titlepost,writerpost,bodypost) VALUES ('$titlepost','$writerpost','$bodypost');";
		$result = $conn->query($sql);
        if(mysqli_errno($conn)==0){
			header ("refresh:4; url=blog.php?job=allblog");
			echo "File saved in database successfully <strong>{$filePath}</strong>";
			echo "submitOk";

        }else{

            echo "File not uploaded there are an error <strong>{$filePath}</strong>";
				header ("refresh:4; url=register.php");
		echo "submitFailed";
        }*/


//    }
//	else
//	{
//        echo "File not uploaded there are an error <strong>{$file}</strong>";

//    } 
}
}

/*==========================================================================*/

if ($job=="edituser")
{
	
  $id = $_REQUEST['id'];  
  $username = $_REQUEST['name'];
  $userfullname = $_REQUEST['fullname'];
  $email = $_REQUEST['email'];
  $conn = getConnection();
  
  $query = "UPDATE users SET username=?, userfullname=?, email=? WHERE id='$id'";
	$stmt = $conn->stmt_init();
	if ($stmt->prepare($query)) 
	{
		$stmt->bind_param("sss", $username, $userfullname, $email);
		$result =$stmt->execute();
		// $stmt->get_result();
		
  //$updateQuery = "UPDATE users SET username='$username', userfullname='$userfullname', email='$email' WHERE id='$id'";  
  //$result = $conn -> query ($updateQuery);  

  if ($result)
  {
    header ("refresh:2; url=users.php?job=alluser");
    echo "user with id".$id."has been updated";
  }
  else
  {
    echo mysqli_error($conn);
  }
}
}

?>