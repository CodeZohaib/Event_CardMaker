<?php 

include "allFunction.php";

if(isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['c_password']) AND isset($_FILES['image']))
{
	$image=$_FILES['image'];

	$fullname=strtolower($_POST['name']);
	$email=strtolower($_POST['email']);
	$password=$_POST['password'];
	$confirm_pass=$_POST['c_password'];

	$image_types = array('png','jpg','jpeg');
	$profile_file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	if($password!=$confirm_pass)
	{
		return viewMessage('error','Missmatch Password AND Confirm Password...... !','');
	}
	else if (!in_array($profile_file_ext, $image_types)) 
	{
		return viewMessage('error','Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
	}
	else if(password_method($_POST['password'])===false)
	{
		return viewMessage('error','Password Required<br> 1=Minimum 8 characters<br> 2=One uppercase letter<br> 3=One lowercase letter,<br> 4=One number,');
	}
	else if(is_array(getUser($email)))
	{
		return viewMessage('error','Email Address Already Exist. Please Use Anthor Email.....!');
	}
	else
	{
		$profile_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
		$profile_path="upload/usersProfile/".$profile_name;
		$profile_temp=$_FILES['image']['tmp_name'];

		if (!move_uploaded_file($profile_temp, $profile_path))
		{
			return viewMessage('error','Profile Image Not Uploaded.....!','');
		}

		$run=$con->prepare("INSERT INTO `users`(`name`, `email`, `password`, `profile_image`) VALUES (?,?,?,?)");
		$run->bindParam(1,$fullname,PDO::PARAM_STR);
		$run->bindParam(2,$email,PDO::PARAM_STR);
		$run->bindParam(3,$password,PDO::PARAM_STR);
		$run->bindParam(4,$profile_name,PDO::PARAM_STR);

		if($run->execute())
		{
			$_SESSION['userLogin']=[
          	  $email,
          	  $con->lastInsertId(),
            ];

			$url=BASEURL."/index2.php";
			return viewMessage('success','Account Created Successfully...... !',$url);
		}
	}
}
else if(isset($_POST['login_email']) AND isset($_POST['login_pass']))
{
	$userData=getUser(strtolower($_POST['login_email']));

	$login_email=strtolower($_POST['login_email']);
	$login_password=$_POST['login_pass'];


	if(is_array($userData))
	{
		if($userData['password']==$login_password)
		{
			$_SESSION['userLogin']=[
          	  $login_email,
          	  $userData['id'],
            ];

			$url=BASEURL."/index2.php";
			return viewMessage('success','Login Successfully...... !',$url);
		}
		else
		{
			return viewMessage('error','Invalid Password.....!');
		}
	}
	else
	{
		return viewMessage('error','Invalid Email Address.....!');
	}
}
else if(isset($_POST['weddingCard']) AND !empty($_POST['weddingCard']))
{
	$titleBgColor=$_POST['titleBgColor'];
	$fontColor=$_POST['fontColor'];
	$fontStyle=$_POST['fontStyle'];
	$fontSize=$_POST['fontSize'];
	$title=$_POST['title'];
	$name=$_POST['name'];
	$Occasion=$_POST['Occasion'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$Location=$_POST['Location'];
	$message=$_POST['message'];
	$RSVP=$_POST['RSVP'];
	$email=$_POST['email'];
	$userID=$_SESSION['userLogin'][1];

	if(!empty($_FILES['image']['name']))
	{
		$image_types = array('png','jpg','jpeg');
		$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($file_ext, $image_types)) 
		{
			return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
		}
    }

	$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
	$background_path="upload/weddingCardImages/".$background_name;
	$background_temp=$_FILES['image']['tmp_name'];

	$run=$con->prepare("INSERT INTO `wedding`(`u_id`, `title`, `name`, `occasion`, `date`, `time`, `location`, `message`, `rsvp`, `email`, `background_img`, `title_bg_color`, `fontColor`, `fontStyle`, `fontSize`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

	$run->bindParam(1,$userID,PDO::PARAM_INT);
	$run->bindParam(2,$title,PDO::PARAM_STR);
	$run->bindParam(3,$name,PDO::PARAM_STR);
	$run->bindParam(4,$Occasion,PDO::PARAM_STR);
	$run->bindParam(5,$date,PDO::PARAM_STR);
	$run->bindParam(6,$time,PDO::PARAM_STR);
	$run->bindParam(7,$Location,PDO::PARAM_STR);
	$run->bindParam(8,$message,PDO::PARAM_STR);
	$run->bindParam(9,$RSVP,PDO::PARAM_STR);
	$run->bindParam(10,$email,PDO::PARAM_STR);
	$run->bindParam(11,$background_name,PDO::PARAM_STR);
	$run->bindParam(12,$titleBgColor,PDO::PARAM_STR);
	$run->bindParam(13,$fontColor,PDO::PARAM_STR);
	$run->bindParam(14,$fontStyle,PDO::PARAM_STR);
	$run->bindParam(15,$fontSize,PDO::PARAM_STR);

	if($run->execute())
	{
		if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

		return viewMessage('refersh','Wedding Card Desgin Save Successfully.....!','');
	}
}
else if(isset($_POST['weddingCardUpdate']) AND !empty($_POST['weddingCardUpdate']))
{
	$weddingData=getEditWedding($_POST['weddingCardUpdate']);

	if(is_array($weddingData))
	{

	$updateID=$_POST['weddingCardUpdate'];
	$titleBgColor=$_POST['titleBgColor'];
	$fontColor=$_POST['fontColor'];
	$fontStyle=$_POST['fontStyle'];
	$fontSize=$_POST['fontSize'];
	$title=$_POST['title'];
	$name=$_POST['name'];
	$Occasion=$_POST['Occasion'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$Location=$_POST['Location'];
	$message=$_POST['message'];
	$RSVP=$_POST['RSVP'];
	$email=$_POST['email'];
	$userID=$_SESSION['userLogin'][1];

	if(!empty($_FILES['image']['name']))
	{
		$image_types = array('png','jpg','jpeg');
		$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($file_ext, $image_types)) 
		{
			return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
		}

		$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
		$background_path="upload/weddingCardImages/".$background_name;
		$background_temp=$_FILES['image']['tmp_name'];
    }
    else
    {
    	$background_name=$weddingData['background_img'];
    }

	$run = $con->prepare("UPDATE `wedding` SET `title`=?, `name`=?, `occasion`=?, `date`=?, `time`=?, `location`=?, `message`=?, `rsvp`=?, `email`=?, `background_img`=?, `title_bg_color`=?, `fontColor`=?, `fontStyle`=?, `fontSize`=? WHERE `u_id`=? AND id=?");

	$run->bindParam(1,$title,PDO::PARAM_STR);
	$run->bindParam(2,$name,PDO::PARAM_STR);
	$run->bindParam(3,$Occasion,PDO::PARAM_STR);
	$run->bindParam(4,$date,PDO::PARAM_STR);
	$run->bindParam(5,$time,PDO::PARAM_STR);
	$run->bindParam(6,$Location,PDO::PARAM_STR);
	$run->bindParam(7,$message,PDO::PARAM_STR);
	$run->bindParam(8,$RSVP,PDO::PARAM_STR);
	$run->bindParam(9,$email,PDO::PARAM_STR);
	$run->bindParam(10,$background_name,PDO::PARAM_STR);
	$run->bindParam(11,$titleBgColor,PDO::PARAM_STR);
	$run->bindParam(12,$fontColor,PDO::PARAM_STR);
	$run->bindParam(13,$fontStyle,PDO::PARAM_STR);
	$run->bindParam(14,$fontSize,PDO::PARAM_STR);
	$run->bindParam(15,$userID,PDO::PARAM_INT);
	$run->bindParam(16,$updateID,PDO::PARAM_INT);

	if($run->execute())
	{
		if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

		return viewMessage('refersh','Wedding Card Desgin Updated Successfully.....!','');
	}

   }
   else
   {
   	return viewMessage('error','Invalid Wedding Card Edit.....!','');
   }
}
else if (isset($_POST['deleteWedding'])) 
{
	$delete_id=$_POST['deleteID'];
	$weddingData=getEditWedding($delete_id);
	if(is_array($weddingData))
	{
		$run=$con->prepare("DELETE FROM `wedding` WHERE id=?");
		$run->bindParam(1,$delete_id,PDO::PARAM_INT);
		if($run->execute())
		{
			return viewMessage('refersh','Wedding Card Desgin Deleted Successfully.....!','');
		}
	}
	else
	{
		return viewMessage('error','Invalid Wedding Card Delete.....!','');
	}

	return viewMessage('error','Something Was Wrong Please Try Again.....!','');

}
else if(isset($_POST['birthdayCardCreate'])) 
{

	$titleBgColor = $_POST['titleBgColor'];
	$fontColor = $_POST['fontColor'];
	$fontStyle = $_POST['fontStyle'];
	$fontSize = $_POST['fontSize'];
	$title = $_POST['title'];
	$name = $_POST['name'];
	$DOB = $_POST['DOB'];
	$subtitle = $_POST['subtitle'];
	$message = $_POST['message'];
	$footer = $_POST['footer'];
	$userID=$_SESSION['userLogin'][1];

	if(!empty($_FILES['image']['name']))
	{
		$image_types = array('png','jpg','jpeg');
		$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($file_ext, $image_types)) 
		{
			return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
		}

		$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
	    $background_path="upload/birthdayCardImages/".$background_name;
	    $background_temp=$_FILES['image']['tmp_name'];
    }
    else
    {
    	$background_name='';
    }

	$run=$con->prepare("INSERT INTO `birthday`(`u_id`, `title`, `name`, `DOB`, `subtitle`, `message`, `footer`, `title_bg_color`, `font_color`, `font_style`, `font_size`,`background_img`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	$run->bindParam(1,$userID,PDO::PARAM_INT);
	$run->bindParam(2,$title,PDO::PARAM_STR);
	$run->bindParam(3,$name,PDO::PARAM_STR);
	$run->bindParam(4,$DOB,PDO::PARAM_STR);
	$run->bindParam(5,$subtitle,PDO::PARAM_STR);
	$run->bindParam(6,$message,PDO::PARAM_STR);
	$run->bindParam(7,$footer,PDO::PARAM_STR);
	$run->bindParam(8,$titleBgColor,PDO::PARAM_STR);
	$run->bindParam(9,$fontColor,PDO::PARAM_STR);
	$run->bindParam(10,$fontStyle,PDO::PARAM_STR);
	$run->bindParam(11,$fontSize,PDO::PARAM_STR);
	$run->bindParam(12,$background_name,PDO::PARAM_STR);

	if($run->execute())
	{
		if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

		return viewMessage('refersh','Birthday Card Desgin Save Successfully.....!','');
	}

	return viewMessage('error','Something Was Wrong Please Try Again....!','');

}
else if(isset($_POST['birthdayCardEdit']))
{

	$birthdayID = $_POST['birthdayCardEdit'];
	$titleBgColor = $_POST['titleBgColor'];
	$fontColor = $_POST['fontColor'];
	$fontStyle = $_POST['fontStyle'];
	$fontSize = $_POST['fontSize'];
	$title = $_POST['title'];
	$name = $_POST['name'];
	$DOB = $_POST['DOB'];
	$subtitle = $_POST['subtitle'];
	$message = $_POST['message'];
	$footer = $_POST['footer'];
	$userID=$_SESSION['userLogin'][1];
	$birthdayData=getEditBirthday($birthdayID);

	if(is_array($birthdayData))
	{
		if(!empty($_FILES['image']['name']))
		{
			$image_types = array('png','jpg','jpeg');
			$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

		    if (!in_array($file_ext, $image_types)) 
			{
				return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
			}

			$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
			$background_path="upload/birthdayCardImages/".$background_name;
			$background_temp=$_FILES['image']['tmp_name'];
	    }
	    else
	    {
	    	$background_name=$birthdayData['background_img'];
	    }

		$run = $con->prepare("UPDATE `birthday` SET `title`=?,`name`=?,`DOB`=?,`subtitle`=?,`message`=?,`footer`=?,`title_bg_color`=?,`font_color`=?,`font_style`=?,`font_size`=?,`background_img`=? WHERE `u_id`=? AND id=?");

		$run->bindParam(1,$title,PDO::PARAM_STR);
		$run->bindParam(2,$name,PDO::PARAM_STR);
		$run->bindParam(3,$DOB,PDO::PARAM_STR);
		$run->bindParam(4,$subtitle,PDO::PARAM_STR);
		$run->bindParam(5,$message,PDO::PARAM_STR);
		$run->bindParam(6,$footer,PDO::PARAM_STR);
		$run->bindParam(7,$titleBgColor,PDO::PARAM_STR);
		$run->bindParam(8,$fontColor,PDO::PARAM_STR);
		$run->bindParam(9,$fontStyle,PDO::PARAM_STR);
		$run->bindParam(10,$fontSize,PDO::PARAM_STR);
		$run->bindParam(11,$background_name,PDO::PARAM_STR);
		$run->bindParam(12,$userID,PDO::PARAM_INT);
		$run->bindParam(13,$birthdayID,PDO::PARAM_INT);

		if($run->execute())
		{
			if(!empty($_FILES['image']['name']))
			{
				if (!move_uploaded_file($background_temp, $background_path))
				{
					return viewMessage('error','Background Image Not Uploaded.....!','');
				}
			}

			return viewMessage('refersh','Birthday Card Desgin Updated Successfully.....!','');
		}

   }
   else
   {
   	return viewMessage('error','Invalid Birthday Card Edit.....!','');
   }
}
else if(isset($_POST['deleteBirthday']) AND isset($_POST['deleteID']))
{
	$delete_id=$_POST['deleteID'];

	$birthdayData=getEditBirthday($delete_id);

	if(is_array($birthdayData))
	{
		$run=$con->prepare("DELETE FROM `birthday` WHERE id=?");
		$run->bindParam(1,$delete_id,PDO::PARAM_INT);
		if($run->execute())
		{
			return viewMessage('refersh','Birthday Card Desgin Deleted Successfully.....!','');
		}
	}
	else
	{
		return viewMessage('error','Invalid Birthday Card Delete.....!','');
	}

	return viewMessage('error','Something Was Wrong Please Try Again.....!','');
}
else if(isset($_POST['eidCardCreate']))
{
	$titleBgColor = $_POST['titleBgColor'];
	$fontColor = $_POST['fontColor'];
	$fontStyle = $_POST['fontStyle'];
	$fontSize = $_POST['fontSize'];
	$title = $_POST['title'];
	$message = $_POST['message'];
	$userID=$_SESSION['userLogin'][1];

	if(!empty($_FILES['image']['name']))
	{
		$image_types = array('png','jpg','jpeg');
		$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($file_ext, $image_types)) 
		{
			return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
		}

		$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
		$background_path="upload/eidCardBgImages/".$background_name;
		$background_temp=$_FILES['image']['tmp_name'];
    }
    else
    {
    	$background_name='';
    }

    if(!empty($_FILES['add_image']['name']))
	{
		$add_image_types = array('png','jpg','jpeg');
		$add_file_ext = pathinfo($_FILES['add_image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($add_file_ext, $add_image_types)) 
		{
			return viewMessage('error','Image files with the following extensions are allowed: ' . implode(', ', $add_image_types),'');
		}

		$add_img_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['add_image']['name']);
		$add_path="upload/eidCardAddImages/".$add_img_name;
		$add_temp=$_FILES['add_image']['tmp_name'];
    }
    else
    {
    	$add_img_name='';
    }


    $run=$con->prepare("INSERT INTO `eid`(`u_id`,`title`, `message`, `title_bg_color`, `font_color`, `font_style`, `font_size`, `background_img`, `add_img`) VALUES (?,?,?,?,?,?,?,?,?)");

    $run->bindParam(1,$userID,PDO::PARAM_INT);
    $run->bindParam(2,$title,PDO::PARAM_STR);
    $run->bindParam(3,$message,PDO::PARAM_STR);
    $run->bindParam(4,$titleBgColor,PDO::PARAM_STR);
    $run->bindParam(5,$fontColor,PDO::PARAM_STR);
    $run->bindParam(6,$fontStyle,PDO::PARAM_STR);
    $run->bindParam(7,$fontSize,PDO::PARAM_STR);
    $run->bindParam(8,$background_name,PDO::PARAM_STR);
    $run->bindParam(9,$add_img_name,PDO::PARAM_STR);

    if($run->execute())
	{
		if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

		if(!empty($_FILES['add_image']['name']))
		{
			if (!move_uploaded_file($add_temp, $add_path))
			{
				return viewMessage('error','Image Not Uploaded.....!','');
			}
		}

		return viewMessage('refersh','Eid Card Desgin Save Successfully.....!','');
	}
}
else if(isset($_POST['eidCardEdit']))
{
	$userID=$_SESSION['userLogin'][1];
	$updateID=$_POST['eidCardEdit'];
	$titleBgColor=$_POST['titleBgColor'];
	$fontColor= $_POST['fontColor'];
	$fontSize = $_POST['fontSize'];
	$fontStyle=$_POST['fontStyle'];
	$title = $_POST['title'];
	$message = $_POST['message'];

	if(is_numeric($updateID))
	{
		$editData=getEditEid($updateID);
		if(is_array($editData))
		{
			if(!empty($_FILES['image']['name']))
			{
				$image_types = array('png','jpg','jpeg');
				$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

			    if (!in_array($file_ext, $image_types)) 
				{
					return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
				}

				$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
				$background_path="upload/eidCardBgImages/".$background_name;
				$background_temp=$_FILES['image']['tmp_name'];
		    }
		    else
		    {
		    	$background_name=$editData['background_img'];
		    }

		    if(!empty($_FILES['add_image']['name']))
			{
				$add_image_types = array('png','jpg','jpeg');
				$add_file_ext = pathinfo($_FILES['add_image']['name'], PATHINFO_EXTENSION);

			    if (!in_array($add_file_ext, $add_image_types)) 
				{
					return viewMessage('error','Image files with the following extensions are allowed: ' . implode(', ', $add_image_types),'');
				}

				$add_img_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['add_image']['name']);
				$add_path="upload/eidCardAddImages/".$add_img_name;
				$add_temp=$_FILES['add_image']['tmp_name'];
		    }
		    else
		    {
		    	$add_img_name=$editData['add_img'];
		    }


		    $run=$con->prepare("UPDATE `eid` SET `title`=?,`message`=?,`title_bg_color`=?,`font_color`=?,`font_style`=?,`font_size`=?,`background_img`=?,`add_img`=? WHERE u_id=? AND id=?");

		    $run->bindParam(1,$title,PDO::PARAM_STR);
		    $run->bindParam(2,$message,PDO::PARAM_STR);
		    $run->bindParam(3,$titleBgColor,PDO::PARAM_STR);
		    $run->bindParam(4,$fontColor,PDO::PARAM_STR);
		    $run->bindParam(5,$fontStyle,PDO::PARAM_STR);
		    $run->bindParam(6,$fontSize,PDO::PARAM_STR);
		    $run->bindParam(7,$background_name,PDO::PARAM_STR);
		    $run->bindParam(8,$add_img_name,PDO::PARAM_STR);
		    $run->bindParam(9,$userID,PDO::PARAM_INT);
		    $run->bindParam(10,$updateID,PDO::PARAM_INT);

		    if($run->execute())
		    {
		    	if(!empty($_FILES['image']['name']))
				{
					if (!move_uploaded_file($background_temp, $background_path))
					{
						return viewMessage('error','Background Image Not Uploaded.....!','');
					}
				}

				if(!empty($_FILES['add_image']['name']))
				{
					if (!move_uploaded_file($add_temp, $add_path))
					{
						return viewMessage('error','Image Not Uploaded.....!','');
					}
				}

		    	return viewMessage('refersh','Eid Card Desgin Updated Successfully.....!','');
		    }
		}
		else
		{
			return viewMessage('error','Invalid Eid Card Edit.....!','');
		}
	}
	else
	{
		return viewMessage('error','Invalid Eid Card Edit.....!','');
	}

	return viewMessage('error','Something Was Wrong Please Try Again.....!','');
}
else if(isset($_POST['deleteEidCard']))
{
	if(isset($_POST['eidCardID']) AND !empty($_POST['eidCardID']) AND is_numeric($_POST['eidCardID']))
	{
		$delete_id=$_POST['eidCardID'];
		$eidData=getEditEid($delete_id);
		if(is_array($eidData))
		{
			$run=$con->prepare("DELETE FROM `eid` WHERE id=?");
			$run->bindParam(1,$delete_id,PDO::PARAM_INT);
			if($run->execute())
			{
				return viewMessage('refersh','Eid Card Desgin Deleted Successfully.....!','');
			}
		}
		else
		{
			return viewMessage('error','Invalid Eid Card Delete.....!','');
		}

		return viewMessage('error','Something Was Wrong Please Try Again.....!','');

	}
}
else if(isset($_POST['updateProfile']))
{
	$name=$_POST['u_name'];
	$email=$_POST['u_email'];
	$password=$_POST['u_password'];
	$confirm_pass=$_POST['u_c_password'];
	$userID=$_SESSION['userLogin'][1];
	$userData=getUser($userID);

	if(is_array($userData))
	{
		if(!empty($_FILES['image']['name']))
		{
			$image_types = array('png','jpg','jpeg');
			$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

		    if (!in_array($file_ext, $image_types)) 
			{
				return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
			}

			$profile_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
			$profile_path="upload/usersProfile/".$profile_name;
			$profile_temp=$_FILES['image']['tmp_name'];
	    }
	    else
	    {
	    	$profile_name=$userData['profile_image'];
	    }

	    if(empty($password) AND empty($confirm_pass))
		{
			$password=$userData['password'];
		}
		else
		{
			if(password_method($_POST['u_password'])===false)
			{
				return viewMessage('error','Password Required<br> 1=Minimum 8 characters<br> 2=One uppercase letter<br> 3=One lowercase letter,<br> 4=One number,');
			}
			
			if(empty($password) AND !empty($confirm_pass))
			{
				return viewMessage('error','Please Enter New Password.....!','');
			}
			else if(!empty($password) AND empty($confirm_pass))
			{
				return viewMessage('error','Please Enter Confirm Password.....!','');
			}
			else
			{
				if($password!=$confirm_pass)
				{
					return viewMessage('error','Missmatch New Password And Confirm Password.....!','');
				}
			}



		}


		if(empty($name))
		{
			$name=$userData['name'];
		}

		if(empty($email))
		{
			$email=$userData['email'];
		}

		$checkEmail=getUser($email);

		if(is_array($checkEmail))
		{
			if($checkEmail['email']!=$userData['email'])
			{
				return viewMessage('error','Email Address Already Exist.....!','');
			}
		}
		

		$run=$con->prepare("UPDATE `users` SET `name`=?,`email`=?,`password`=?,`profile_image`=? WHERE id=?");
		$run->bindParam(1,$name,PDO::PARAM_STR);
		$run->bindParam(2,$email,PDO::PARAM_STR);
		$run->bindParam(3,$password,PDO::PARAM_STR);
		$run->bindParam(4,$profile_name,PDO::PARAM_STR);
		$run->bindParam(5,$userID,PDO::PARAM_STR);

		if($run->execute())
		{
			if(!empty($_FILES['image']['name']))
			{
				if (!move_uploaded_file($profile_temp, $profile_path))
				{
					return viewMessage('error','Profile Image Not Uploaded.....!','');
				}
			}

			$_SESSION['userLogin'][0]=$email;

			return viewMessage('refersh','Profile Updated Successfully.....!','');
		}

	}

}
else if(isset($_POST['anniversaryCardCreate']))
{
	$titleBgColor = $_POST['titleBgColor'];
	$fontColor = $_POST['fontColor'];
	$fontStyle = $_POST['fontStyle'];
	$fontSize = $_POST['fontSize'];
	$title = $_POST['title'];
	$subtitle = $_POST['subtitle'];
	$footerText = $_POST['footerText'];
	$name = $_POST['name'];
	$message = $_POST['message'];
	$userID=$_SESSION['userLogin'][1];


	if(!empty($_FILES['image']['name']))
	{
		$image_types = array('png','jpg','jpeg');
		$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($file_ext, $image_types)) 
		{
			return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
		}

		$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
		$background_path="upload/anniversaryCardBGImage/".$background_name;
		$background_temp=$_FILES['image']['tmp_name'];
    }
    else
    {
    	$background_name='';
    }

    $run=$con->prepare("INSERT INTO `anniversary`(`u_id`, `title`, `name`, `subtitle`, `footer`, `message`, `title_bg_color`, `font_color`, `font_style`, `font_size`, `background_img`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

    $run->bindParam(1,$userID,PDO::PARAM_INT);
    $run->bindParam(2,$title,PDO::PARAM_STR);
    $run->bindParam(3,$name,PDO::PARAM_STR);
    $run->bindParam(4,$subtitle,PDO::PARAM_STR);
    $run->bindParam(5,$footerText,PDO::PARAM_STR);
    $run->bindParam(6,$message,PDO::PARAM_STR);
    $run->bindParam(7,$titleBgColor,PDO::PARAM_STR);
    $run->bindParam(8,$fontColor,PDO::PARAM_STR);
    $run->bindParam(9,$fontStyle,PDO::PARAM_STR);
    $run->bindParam(10,$fontSize,PDO::PARAM_STR);
    $run->bindParam(11,$background_name,PDO::PARAM_STR);

    if($run->execute())
    {
    	if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

    	return viewMessage('refersh','Anniversary Card Desgin Save Successfully.....!','');
    }

    return viewMessage('error','Something Was Wrong Please Try Again.....!','');

}
else if(isset($_POST['anniversaryCardUpdate']))
{

	$anniversaryUpdate = $_POST['anniversaryCardUpdate'];
	$titleBgColor = $_POST['titleBgColor'];
	$fontColor = $_POST['fontColor'];
	$fontStyle = $_POST['fontStyle'];
	$fontSize = $_POST['fontSize'];
	$title = $_POST['title'];
	$subtitle = $_POST['subtitle'];
	$footerText = $_POST['footerText'];
	$name = $_POST['name'];
	$message = $_POST['message'];
	$userID=$_SESSION['userLogin'][1];

	if(!is_numeric($anniversaryUpdate))
	{
		 return viewMessage('error','Invalid Anniversary Card Update.....!','');
	}

	$anniversaryData=getEditAnniversary($anniversaryUpdate);


	if(!is_array($anniversaryData))
	{
		 return viewMessage('error','Invalid Anniversary Card Update.....!','');
	}

	if(!empty($_FILES['image']['name']))
	{
		$image_types = array('png','jpg','jpeg');
		$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($file_ext, $image_types)) 
		{
			return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
		}

		$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
		$background_path="upload/anniversaryCardBGImage/".$background_name;
		$background_temp=$_FILES['image']['tmp_name'];
    }
    else
    {
    	$background_name=$anniversaryData['background_img'];
    }

    $run = $con->prepare("UPDATE `anniversary` SET `title`=?, `name`=?, `subtitle`=?, `footer`=?, `message`=?, `title_bg_color`=?, `font_color`=?, `font_style`=?, `font_size`=?, `background_img`=? WHERE `u_id`=? AND id=?");
	
	$run->bindParam(1,$title,PDO::PARAM_STR);
	$run->bindParam(2,$name,PDO::PARAM_STR);
	$run->bindParam(3,$subtitle,PDO::PARAM_STR);
	$run->bindParam(4,$footerText,PDO::PARAM_STR);
	$run->bindParam(5,$message,PDO::PARAM_STR);
	$run->bindParam(6,$titleBgColor,PDO::PARAM_STR);
	$run->bindParam(7,$fontColor,PDO::PARAM_STR);
	$run->bindParam(8,$fontStyle,PDO::PARAM_STR);
	$run->bindParam(9,$fontSize,PDO::PARAM_STR);
	$run->bindParam(10,$background_name,PDO::PARAM_STR);
	$run->bindParam(11,$userID,PDO::PARAM_INT);
	$run->bindParam(12,$anniversaryUpdate,PDO::PARAM_INT);


	if($run->execute())
	{
		if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

    	return viewMessage('refersh','Anniversary Card Desgin Updated Successfully.....!','');
	}

	 return viewMessage('error','Something Was Wrong Please Try Again.....!','');
}
else if (isset($_POST['deleteAnniversaryCard'])) 
{
	if(isset($_POST['anniversaryCardID']) AND !empty($_POST['anniversaryCardID']) AND is_numeric($_POST['anniversaryCardID']))
	{
		$delete_id=$_POST['anniversaryCardID'];
		$data=getEditAnniversary($delete_id);
		if(is_array($data))
		{
			$run=$con->prepare("DELETE FROM `anniversary` WHERE id=?");
			$run->bindParam(1,$delete_id,PDO::PARAM_INT);
			if($run->execute())
			{
				return viewMessage('refersh','Anniversary Card Desgin Deleted Successfully.....!','');
			}
		}
		else
		{
			return viewMessage('error','Anniversary Wedding Card Delete.....!','');
		}

		return viewMessage('error','Something Was Wrong Please Try Again.....!','');
	}
}
else if(isset($_POST['thankYouCardCreate']))
{
	$fontColor=$_POST['fontColor'];
    $fontStyle=$_POST['fontStyle'];
    $fontSize=$_POST['fontSize'];
    $title=$_POST['title'];
    $message=$_POST['message'];
    $userID=$_SESSION['userLogin'][1];

    if(!empty($_FILES['image']['name']))
	{
		$image_types = array('png','jpg','jpeg');
		$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($file_ext, $image_types)) 
		{
			return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
		}

		$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
		$background_path="upload/thankYouBgImages/".$background_name;
		$background_temp=$_FILES['image']['tmp_name'];
    }
    else
    {
    	$background_name='';
    }

    $run=$con->prepare("INSERT INTO `thankyou`(`u_id`, `title`, `message`, `font_color`, `font_style`, `font_size`,background_img) VALUES (?,?,?,?,?,?,?)");
    $run->bindParam(1,$userID,PDO::PARAM_INT);
    $run->bindParam(2,$title,PDO::PARAM_STR);
    $run->bindParam(3,$message,PDO::PARAM_STR);
    $run->bindParam(4,$fontColor,PDO::PARAM_STR);
    $run->bindParam(5,$fontStyle,PDO::PARAM_STR);
    $run->bindParam(6,$fontSize,PDO::PARAM_STR);
    $run->bindParam(7,$background_name,PDO::PARAM_STR);

    if($run->execute())
    {
    	if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

    	return viewMessage('refersh','Thank You Card Desgin Save Successfully.....!','');
    }
}
else if (isset($_POST['thankYouCardEdit'])) 
{
	if(!empty($_POST['thankYouCardEdit']) and is_numeric($_POST['thankYouCardEdit']))
	{
		$updateID=$_POST['thankYouCardEdit'];
		$data=getEditThankYou($updateID);

		if(is_array($data))
		{
			$fontColor=$_POST['fontColor'];
		    $fontStyle=$_POST['fontStyle'];
		    $fontSize=$_POST['fontSize'];
		    $title=$_POST['title'];
		    $message=$_POST['message'];
		    $userID=$_SESSION['userLogin'][1];


		    if(!empty($_FILES['image']['name']))
			{
				$image_types = array('png','jpg','jpeg');
				$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

			    if (!in_array($file_ext, $image_types)) 
				{
					return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
				}

				$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
				$background_path="upload/thankYouBgImages/".$background_name;
				$background_temp=$_FILES['image']['tmp_name'];
		    }
		    else
		    {
		    	$background_name=$data['background_img'];
		    }

		    $run=$con->prepare('UPDATE `thankyou` SET `title`=?,`message`=?,`font_color`=?,`font_style`=?,`font_size`=?,`background_img`=? WHERE u_id=? AND id=?');

		    $run->bindParam(1,$title,PDO::PARAM_STR);
		    $run->bindParam(2,$message,PDO::PARAM_STR);
		    $run->bindParam(3,$fontColor,PDO::PARAM_STR);
		    $run->bindParam(4,$fontStyle,PDO::PARAM_STR);
		    $run->bindParam(5,$fontSize,PDO::PARAM_STR);
		    $run->bindParam(6,$background_name,PDO::PARAM_STR);
		    $run->bindParam(7,$userID,PDO::PARAM_INT);
		    $run->bindParam(8,$updateID,PDO::PARAM_INT);

		    if($run->execute())
		    {
		    	if(!empty($_FILES['image']['name']))
				{
					if (!move_uploaded_file($background_temp, $background_path))
					{
						return viewMessage('error','Background Image Not Uploaded.....!','');
					}
				}

				return viewMessage('refersh','Thank You Card Desgin Update Successfully.....!','');
		    }


		}

	}


}
else if (isset($_POST['deleteThankYouCard']))
{
	$thankYouCardID=$_POST['thankYouCardID'];

	if(!empty($_POST['thankYouCardID']) and is_numeric($_POST['thankYouCardID']))
	{
		$delete_id=$_POST['thankYouCardID'];
		$data=getEditThankYou($delete_id);

		if(is_array($data))
		{
			$run=$con->prepare('DELETE FROM `thankyou` WHERE id=?');
			$run->bindParam(1,$delete_id,PDO::PARAM_INT);
			if($run->execute())
			{
				return viewMessage('refersh','Thank You Card Desgin Deleted Successfully.....!','');
			}
		}
	}
}
else if(isset($_POST['visitingCardCreate']))
{
	$fontColor = $_POST['fontColor'];
	$fontStyle = $_POST['fontStyle'];
	$fontSize = $_POST['fontSize'];
	$name = $_POST['name'];
	$profession = $_POST['profession'];
	$website = $_POST['website'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$twitter = $_POST['twitter'];
	$facebook = $_POST['facebook'];
	$linkedin = $_POST['linkedin'];
	$github = $_POST['github'];
	$userID=$_SESSION['userLogin'][1];

	if(!empty($_FILES['image']['name']))
	{
		$image_types = array('png','jpg','jpeg');
		$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($file_ext, $image_types)) 
		{
			return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
		}

		$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
		$background_path="upload/visitingCardBgImages/".$background_name;
		$background_temp=$_FILES['image']['tmp_name'];
    }
    else
    {
    	$background_name='';
    }

    if(!empty($_FILES['add_image']['name']))
	{
		$add_image_types = array('png','jpg','jpeg');
		$add_file_ext = pathinfo($_FILES['add_image']['name'], PATHINFO_EXTENSION);

	    if (!in_array($add_file_ext, $add_image_types)) 
		{
			return viewMessage('error','Image files with the following extensions are allowed: ' . implode(', ', $add_image_types),'');
		}

		$add_img_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['add_image']['name']);
		$add_path="upload/visitingCardProfile/".$add_img_name;
		$add_temp=$_FILES['add_image']['tmp_name'];
    }
    else
    {
    	$add_img_name='';
    }


    $run=$con->prepare("INSERT INTO `visitingcard`(`u_id`, `name`, `profession`, `email`, `phone_no`, `address`, `background_img`, `website_link`, `twitter_link`, `facebook_link`, `linkedin_link`, `github_link`, `font_color`, `font_style`, `font_size`, `add_img`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $run->bindParam(1, $userID, PDO::PARAM_INT);
	$run->bindParam(2, $name, PDO::PARAM_STR);
	$run->bindParam(3, $profession, PDO::PARAM_STR);
	$run->bindParam(4, $email, PDO::PARAM_STR);
	$run->bindParam(5, $phone_number, PDO::PARAM_STR);
	$run->bindParam(6, $address, PDO::PARAM_STR);
	$run->bindParam(7, $background_name,PDO::PARAM_STR);
	$run->bindParam(8, $website, PDO::PARAM_STR);
	$run->bindParam(9, $twitter, PDO::PARAM_STR);
	$run->bindParam(10, $facebook, PDO::PARAM_STR);
	$run->bindParam(11, $linkedin, PDO::PARAM_STR);
	$run->bindParam(12, $github, PDO::PARAM_STR);
	$run->bindParam(13, $fontColor, PDO::PARAM_STR);
	$run->bindParam(14, $fontStyle, PDO::PARAM_STR);
	$run->bindParam(15, $fontSize, PDO::PARAM_STR);
	$run->bindParam(16, $add_img_name, PDO::PARAM_STR);

	if($run->execute())
	{
		if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

		if(!empty($_FILES['add_image']['name']))
		{
			if (!move_uploaded_file($add_temp, $add_path))
			{
				return viewMessage('error','Image Not Uploaded.....!','');
			}
		}

		return viewMessage('refersh','Visiting Card Desgin Save Successfully.....!','');
	}

}
else if(isset($_POST['visitingCardUpdate'])) 
{
	$updateID=$_POST['visitingCardUpdate'];
	$userID=$_SESSION['userLogin'][1];
	if(is_numeric($updateID))
	{
		$data=getEditVisiting($updateID);
	   if(is_array($data))
	   {
			$fontColor = $_POST['fontColor'];
			$fontStyle = $_POST['fontStyle'];
			$fontSize = $_POST['fontSize'];
			$name = $_POST['name'];
			$profession = $_POST['profession'];
			$email = $_POST['email'];
			$website = $_POST['website'];
			$phone_number = $_POST['phone_number'];
			$address = $_POST['address'];
			$twitter = $_POST['twitter'];
			$facebook = $_POST['facebook'];
			$linkedin = $_POST['linkedin'];
			$github = $_POST['github'];

			if(!empty($_FILES['image']['name']))
			{
				$image_types = array('png','jpg','jpeg');
				$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

			    if (!in_array($file_ext, $image_types)) 
				{
					return viewMessage('error','Background Image files with the following extensions are allowed: ' . implode(', ', $image_types),'');
				}

				$background_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['image']['name']);
				$background_path="upload/visitingCardBgImages/".$background_name;
				$background_temp=$_FILES['image']['tmp_name'];
		    }
		    else
		    {
		    	$background_name=$data['background_img'];
		    }

		    if(!empty($_FILES['add_image']['name']))
			{
				$add_image_types = array('png','jpg','jpeg');
				$add_file_ext = pathinfo($_FILES['add_image']['name'], PATHINFO_EXTENSION);

			    if (!in_array($add_file_ext, $add_image_types)) 
				{
					return viewMessage('error','Image files with the following extensions are allowed: ' . implode(', ', $add_image_types),'');
				}

				$add_img_name=mt_rand(1111,9999).'_'.preg_replace('/\s+/', '', $_FILES['add_image']['name']);
				$add_path="upload/visitingCardProfile/".$add_img_name;
				$add_temp=$_FILES['add_image']['tmp_name'];
		    }
		    else
		    {
		    	$add_img_name=$data['add_img'];
		    }
		}
		else
		{
			return viewMessage('error','Invalid Visiting Card Edit.....!');
		}
	}
	else
	{
		return viewMessage('error','Invalid Visiting Card Edit.....!');
	}


	$run = $con->prepare("UPDATE `visitingcard` SET `name` = ?, `profession` = ?, `email` = ?, `phone_no` = ?, `address` = ?, `background_img` = ?, `website_link` = ?, `twitter_link` = ?, `facebook_link` = ?, `linkedin_link` = ?, `github_link` = ?, `font_color` = ?, `font_style` = ?, `font_size` = ?, `add_img` = ? WHERE `u_id` = ? AND `id` = ?");

	$run->bindParam(1, $name, PDO::PARAM_STR);
	$run->bindParam(2, $profession, PDO::PARAM_STR);
	$run->bindParam(3, $email, PDO::PARAM_STR);
	$run->bindParam(4, $phone_number, PDO::PARAM_STR);
	$run->bindParam(5, $address, PDO::PARAM_STR);
	$run->bindParam(6, $background_name, PDO::PARAM_STR);
	$run->bindParam(7, $website, PDO::PARAM_STR);
	$run->bindParam(8, $twitter, PDO::PARAM_STR);
	$run->bindParam(9, $facebook, PDO::PARAM_STR);
	$run->bindParam(10, $linkedin, PDO::PARAM_STR);
	$run->bindParam(11, $github, PDO::PARAM_STR);
	$run->bindParam(12, $fontColor, PDO::PARAM_STR);
	$run->bindParam(13, $fontStyle, PDO::PARAM_STR);
	$run->bindParam(14, $fontSize, PDO::PARAM_STR);
	$run->bindParam(15, $add_img_name, PDO::PARAM_STR);
	$run->bindParam(16, $userID, PDO::PARAM_INT);
	$run->bindParam(17, $updateID, PDO::PARAM_INT);

	if ($run->execute()) 
	{

		if(!empty($_FILES['image']['name']))
		{
			if (!move_uploaded_file($background_temp, $background_path))
			{
				return viewMessage('error','Background Image Not Uploaded.....!','');
			}
		}

		if(!empty($_FILES['add_image']['name']))
		{
			if (!move_uploaded_file($add_temp, $add_path))
			{
				return viewMessage('error','Image Not Uploaded.....!','');
			}
		}

	    return viewMessage('refersh', 'Visiting Card Design Updated Successfully.....!', '');


	}


	return viewMessage('error','Something Was Wrong Please Try Again.....!','');

}
else if(isset($_POST['deleteVisitingCard']))
{
	$visitingCardID=$_POST['visitingCardID'];

	if(is_numeric($visitingCardID))
	{
		$data=getEditVisiting($visitingCardID);
		if(is_array($data))
		{
			$run=$con->prepare("DELETE FROM `visitingcard` WHERE id=?");
			$run->bindParam(1,$visitingCardID,PDO::PARAM_INT);

			if($run->execute())
			{
				 return viewMessage('refersh', 'Visiting Card Deleted Successfully.....!', '');
			}
		}
		else
		{
			return viewMessage('error','Invalid Visiting Card Delete.....!','');
		}
	}
	else
	{
		return viewMessage('error','Invalid Visiting Card Delete.....!','');
	}

	return viewMessage('error','Something Was Wrong Please Try Again.....!','');
}
else if(isset($_POST['searchCard']) AND isset($_POST['searchValue']))
{
	$search = $_POST['searchValue'];
	$search = str_replace(' ', '', $search);
	$keywords = ['anniversary', 'birthday', 'eid', 'thankyou', 'visiting', 'wedding',
	             'anniversaryCard', 'birthdayCard', 'eidCard', 'thankyouCard', 'visitingCard', 'weddingCard'
	];

	$matchedKeyword = '';
	foreach ($keywords as $keyword) {
	    if (stripos($search, $keyword) !== false) {
	        $matchedKeyword = $keyword;
	        break;
	    }
	}

	// Perform action based on the matched keyword
	if ($matchedKeyword) 
	{
	   if($matchedKeyword=='anniversary')
	   {
	   	 $url=BASEURL."/anniversaryCardCreate.php";
		 return viewMessage('success','',$url);
	   }
	   else if($matchedKeyword=='birthday')
	   {
	   	 $url=BASEURL."/happayBirthday.php";
		 return viewMessage('success','',$url);
	   }
	   else if($matchedKeyword=='eid')
	   {
	   	 $url=BASEURL."/eidCardCreate.php";
		 return viewMessage('success','',$url);
	   }
	   else if($matchedKeyword=='thankyou')
	   {
	   	 $url=BASEURL."/thankYouCardCreate.php";
		 return viewMessage('success','',$url);
	   }
	   else if($matchedKeyword=='visiting')
	   {
	   	 $url=BASEURL."/visitingCardCreate.php";
		 return viewMessage('success','',$url);
	   }
	   else if($matchedKeyword=='wedding')
	   {
	   	 $url=BASEURL."/weddingCard.php";
		 return viewMessage('success','',$url);
	   }



	} 
	else 
	{
		$url=BASEURL."/searchData.php";
	    return viewMessage('error','No matching keyword found.....!',$url);
	}

}


?>