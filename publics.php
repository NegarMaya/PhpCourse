<?php
error_reporting(0);

//echo phpinfo();
function getCleanText($data) 
{
	$data= trim($data);
	$data= stripcslashes($data);
	$data= htmlspecialchars($data);
	
	return $data;
}

function getIMDB($movieName)
{
    //$content= file_get_contents("http://netflixroulette.net/api/api.php?title=$movieName");
    
	/*$query = http_build_query(array('title'=>$movieName));
    $url = "http://netflixroulette.net/api/api.php?" . $query;
    //echo var_dump($url);
    
	$content= file_get_contents($url);
	
	//echo var_dump($movieName);
	echo var_dump($content);
	$imdbArray=JSON_decode($content, true);
	
	return $imdbArray;*/
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://netflixroulette.net/api/api.php?title='.$movieName);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);

//echo $result;
$imdbArray= json_decode($result, true);

return $imdbArray;
}

function getConnection()
{
	//$con= new mysqli("localhost", "negares_adminNeg", "T!@~Na.RAI93", "negares_db");
	$con= new mysqli("localhost", "root", "", "negardb");
	if ($con->connect_error)
	{
	if (mysqli_connect_errno())
	{
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	return null;
}
		else
		{
	  		//echo "successfull connecion";
			$con->set_charset("utf8");//echo "jjj";
	        return $con;
}
}
?>