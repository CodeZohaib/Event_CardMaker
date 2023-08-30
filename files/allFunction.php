<?php 
  session_start();
  global $con;
  $con = connection();

   define("BASEURL","http://localhost/cardmaker");

  function connection()
  {
  	try
  	{
	    $db=new PDO("mysql:host=localhost;dbname=cardmaker","root","");
	    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	    return $db;
	  }

	  catch(PDOException $e)
	  {
	    echo "Sorry database connection error:-".$e->getMessage();
	    exit();
	  }

  }


  function check($array)
  {
  	echo "<pre>";
  	print_r($array);
  	exit();
  }

  function formatDate($date)
  {
      return date('F j, Y, g:i A',strtotime($date));
  }
 

  function viewMessage($status,$msg,$url=NULL)
  {

	if ($status==='success' && !empty($url)) 
	{
		echo json_encode([
			'success'=>'success',
			'message'=>$msg,
			'url'=>$url,
			
		]);
	}
	else if ($status==='error' && !empty($url)) 
	{
		echo json_encode([
			'error'=>'error',
			'message'=>$msg,
			'url'=>$url,
			
		]);
	}
	else if ($status==='success' && empty($url)) 
	{
		echo json_encode([
			'success'=>'success',
			'message'=>$msg,
	    ]);
	}
	else if ($status==='error' && empty($url)) 
	{
		echo json_encode([
			'error'=>'error',
			'message'=>$msg,
	    ]);
	}
  else if ($status==='refersh') 
  {
    echo json_encode([
        'success'=>'success',
        'message'=>$msg,
        'signout'=>1,
    ]);
  }
 }

 function password_method($password)
 {
	$uppercase = preg_match('@[A-Z]@',$password);
  $lowercase = preg_match('@[a-z]@',$password);
  $number    = preg_match('@[0-9]@',$password);

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) 
    {
      return false;
    }
    else
    {
    	return true;
    }
 }


 function getUser($value)
 {
 	 global $con;
 	 if(is_numeric($value))
 	 {
 	 	 $run=$con->prepare("SELECT * FROM `users` WHERE id=?");
 	 	 $run->bindParam(1,$value,PDO::PARAM_INT);
 	 }
 	 else
 	 {
 	 	$run=$con->prepare("SELECT * FROM `users` WHERE email=?");
 	 	 $run->bindParam(1,$value,PDO::PARAM_STR);
 	 }

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetch(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }


 function getAllWedding()
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `wedding` WHERE u_id=? ORDER BY id DESC");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetchAll(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }

  function getAllEid()
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `eid` WHERE u_id=? ORDER BY id DESC");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetchAll(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }

 function getAllBirthday()
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `birthday` WHERE u_id=? ORDER BY id DESC");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetchAll(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }

  function getAllAnniversary()
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `anniversary` WHERE u_id=? ORDER BY id DESC");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetchAll(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }


 function getAllThankYou()
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `thankyou` WHERE u_id=? ORDER BY id DESC");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetchAll(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }



 function getVisitingCard()
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `visitingcard` WHERE u_id=? ORDER BY id DESC");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetchAll(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }

 function getEditWedding($id)
 {
 	global $con;

 	if(is_numeric($id))
 	{
	 	$userID=$_SESSION['userLogin'][1];

	 	$run=$con->prepare("SELECT * FROM `wedding` WHERE u_id=? AND id=? ORDER BY id DESC");
	 	$run->bindParam(1,$userID,PDO::PARAM_INT);
	 	$run->bindParam(2,$id,PDO::PARAM_INT);

	 	 if($run->execute())
	 	 {
	 	 	 if($run->rowCount()>0)
	 	 	 {
	 	 	 	 return $run->fetch(PDO::FETCH_ASSOC);
	 	 	 }
	 	 }
	 }

 	 return false;
 }


 function getEditBirthday($id)
 {
 	global $con;

 	if(is_numeric($id))
 	{
	 	$userID=$_SESSION['userLogin'][1];

	 	$run=$con->prepare("SELECT * FROM `birthday` WHERE u_id=? AND id=? ORDER BY id DESC");
	 	$run->bindParam(1,$userID,PDO::PARAM_INT);
	 	$run->bindParam(2,$id,PDO::PARAM_INT);

	 	 if($run->execute())
	 	 {
	 	 	 if($run->rowCount()>0)
	 	 	 {
	 	 	 	 return $run->fetch(PDO::FETCH_ASSOC);
	 	 	 }
	 	 }
	 }

 	 return false;
 }

 function getEditEid($id)
 {
 	global $con;

 	if(is_numeric($id))
 	{
	 	$userID=$_SESSION['userLogin'][1];

	 	$run=$con->prepare("SELECT * FROM `eid` WHERE u_id=? AND id=? ORDER BY id DESC");
	 	$run->bindParam(1,$userID,PDO::PARAM_INT);
	 	$run->bindParam(2,$id,PDO::PARAM_INT);

	 	 if($run->execute())
	 	 {
	 	 	 if($run->rowCount()>0)
	 	 	 {
	 	 	 	 return $run->fetch(PDO::FETCH_ASSOC);
	 	 	 }
	 	 }
	 }

 	 return false;
 }


 function getEditAnniversary($id)
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `anniversary` WHERE u_id=? AND id=?");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);
 	$run->bindParam(2,$id,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetch(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }


  function getEditThankYou($id)
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `thankyou` WHERE u_id=? AND id=?");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);
 	$run->bindParam(2,$id,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetch(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }


 function getEditVisiting($id)
 {
 	global $con;
 	$userID=$_SESSION['userLogin'][1];

 	$run=$con->prepare("SELECT * FROM `visitingcard` WHERE u_id=? AND id=?");
 	$run->bindParam(1,$userID,PDO::PARAM_INT);
 	$run->bindParam(2,$id,PDO::PARAM_INT);

 	 if($run->execute())
 	 {
 	 	 if($run->rowCount()>0)
 	 	 {
 	 	 	 return $run->fetch(PDO::FETCH_ASSOC);
 	 	 }
 	 }

 	 return false;
 }

?>