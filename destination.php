<?php
include "../publics.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$job=isset($_REQUEST['job']) ? $_REQUEST['job'] : '';
//echo $job;

if ($job=="login"){
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
	        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	        //mysqli_stmt_bind_result($stmt, $col1);

			/* fetch values */
			/*while (mysqli_stmt_fetch($stmt)) {
				printf("%s %s\n", $passwordHash);
			}*/
            //I can see that these values are identical to the ones
            //echoed out in the registration function
            /*echo $password;
            echo $passwordHash;

            if( password_verify($password,$passwordHash) )
                echo 'success';
            else echo 'failure';

        else : log_sql_error( $err_msg );
        endif;*/

	/*$sql = "select password from users where username='$username' or email='$username'";
	$result= mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    print "hashedPass = ${row['password']}";
    print "myPassword: " . $password;
		
    if(password_verify('1234', $row['password'])){
        print "Password match";
		session_start();
		$_SESSION["username"] = $username;
		echo $_SESSION["username"] ;

		header ("refresh:4; url=http://localhost:8080/negar/index.php"); // echo must be the first line
		echo "WELCOME $username";
    } 
	else
	{
        print "The username or password do not match";
		header ("refresh:4; url=login.php");
		echo "Usename or password is not correct";
	}*/

   
if(isset($_POST['Log-out'])) {
	$_SESSION["username"] = null;
}

if(isset($_POST['sign-up'])) {
	$_SESSION["username"] = null;
}

/*==========================================================================*/
	   
if ($job=="insertArt")
{
	$ArticleName= mysql_real_escape_string($_REQUEST['articleName']);
	$ArticleBody= $_POST['articleBody'];
	$conn=getConnection();
	
	//mysqli_query($con,$sql)  or $conn->query($duplicate)
	
	$duplicate= "select * from article where articleName='$ArticleName'";
	$result= mysqli_query($conn,$duplicate);
	//$result = mysql_query("SELECT * FROM article WHERE articleName='".$ArticleName."'",$conn);
	
	if (mysqli_num_rows($result)>0)
	{
		$data=array("id"=>0, "text"=>"This is duplicate content"); // This is your data array/result
    echo json_encode($data); // use json_encode to convert it to json encoded string //duplicate behtar as =t az number use konim
	}
	else
	{
	 $data=array("id"=>1, "text"=>"This is non-duplicate content"); // This is your data array/result
    echo json_encode($data);
	}
	die($result);
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

if(move_uploaded_file($uploadedFile, $destination))
{
        /*prepare sql query here and insert*/
        $sql = "INSERT INTO users (userfullname,username,password,email,userphoto) VALUES ('$name','$username','$hashpass','$email','$destination');";
		$result = $conn->query($sql);
        if($result){

			header ("refresh:4; url=login.php");
			echo "File saved in database successfully <strong>{$filePath}</strong>";
			echo "submitOk";

        }else{

            echo "FilePth not uploaded there are an error <strong>{$filePath}</strong>";
				header ("refresh:4; url=register.php");
		echo "submitFailed";
        }
    }
    else
    {
        echo $uploadedFile;
        echo "File not uploaded there are an error <strong>{$file}</strong>";

    }

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

	if(move_uploaded_file($_FILES["file"]["tmp_name"], $filePath))
	{

        /*prepare sql query here and insert*/
        $sql = "INSERT INTO blogpost (titlepost,writerpost,bodypost,picpost) VALUES ('$titlepost','$writerpost','$bodypost','$filePath');";
		$result = $conn->query($sql);
        if(mysqli_errno($conn)==0){
			header ("refresh:4; url=blog.php?job=allblog");
			echo "File saved in database successfully <strong>{$filePath}</strong>";
			echo "submitOk";

        }else{

            echo "File not uploaded there are an error <strong>{$filePath}</strong>";
				header ("refresh:4; url=register.php");
		echo "submitFailed";
        }


    }
	else
	{
        echo "File not uploaded there are an error <strong>{$file}</strong>";

    } 
}

/*==========================================================================*/

if ($job=="edituser"){
	
  $id = $_REQUEST['id'];  
  $username = $_REQUEST['name'];
  $userfullname = $_REQUEST['fullname'];
  $email = $_REQUEST['email'];
  $conn = getConnection();
  
  $updateQuery = "UPDATE users SET username='$username', userfullname='$userfullname', email='$email' WHERE id='$id'";  
  $result = $conn -> query ($updateQuery);  

  if (mysqli_errno($conn)==0)
  {
    header ("refresh:2; url=users.php?job=alluser");
    echo "user with id".$id."has been updated";
  }
  else
  {
    echo mysqli_error($conn);
  }
}
?>