<?php
session_start();
  echo '<div class="jumbotron">';
  echo '<h1>Contact Form</h1>';
  if (isset($_REQUEST['msg']) && ($_REQUEST['msg']=="success"))
  {
  	echo '<div class="alert alert-success alert-dismissable">';
  	echo '<button type="button" class="close" data-dismss="alert" aria-hidden="true"></button>';
  	echo 'Contact info successfully entered to the Database!</div>';
  }

  if (!isset($_POST['submit']))
  {
    echo '<form id="contact" method="post" action="">';
// EMAIL--------------------------------------------------------------------------------------------------
    if (!isset($_GET['email'])) //if no error
    {
        if (isset($_SESSION['email']))
        {
          echo '<div class="form-group">';
          echo '<label for="Personal Info">Email Address</label>';  
          echo '<input name="email" type="text" class="form-control" id="email"
          value="'.$_SESSION['email'].'">';  
          echo '<p id="emailStatus"></p>';
          echo '</div>';
        }
        else
        {
          echo '<div class="form-group">';
          echo '<label for="Personal Info">Email Address</label>';  
          echo '<input name="email" type="text" class="form-control" id="email" placeholder="Email">';  
          echo '<p id="emailStatus"></p>';
          echo '</div>';
        }
    }
    elseif (isset($_GET['email'])) //is Error
    {
      if($_GET['email']=="emailNULL")
      {
        echo '<div class="form-group has-error">';
        echo '<label for="email">Email Address</label>';  
        echo '<input name="email" type="text" class="form-control" id="email" placeholder="Email">';  
        echo '<p class="alert-danger" id="emailStatus">Email cannot be blank</p>';
        echo '</div>';
      }
      else
      {
          if(isset($_SESSION['email'])) //bad match
          {
            echo '<div class="form-group has-error">';
            echo '<label for="inputError1">Email Address</label>';  
            echo '<input name="email" type="text" class="form-control" id="inputError1" 
            value="'.$_SESSION['email'].'">';  
            echo '<p class="alert-danger" id="emailStatus">Invalid email</p>';
            echo '</div>';
          }
      }   
    }
//FIRST NAME--------------------------------------------------------------------------
    if (!isset($_GET['fname'])) // no error found,
    {
        if (isset($_SESSION['fname']))// check for previously submitted data
        {
            echo '<div class="form-group">';
            echo '<label for="Personal Info">First Name</label>'; 
            echo '<input name="firstName" type="text" class="form-control" 
            value="'.$_SESSION['fname'].'">';  
            echo '<p id="nameStatus_f"></p>';
            echo '</div>';
        }
        else //no previously submitted data found, display default input group
        {
            echo '<div class="form-group">';
            echo '<label for="Personal Info">First Name</label>'; 
            echo '<input name="firstName" type="text" class="form-control" id="fname" placeholder="First Name">';  
            echo '<p id="nameStatus_f"></p>';
            echo '</div>';
        }
    }
    elseif (isset($_GET['fname']))
    {
        if ($_GET['fname']=="fnameNULL") //no data to be grabbed bc SESSION var is NULL
        {
            echo '<div class="form-group has-error">';
            echo '<label for="inputError1">First Name</label>'; 
            echo '<input name="firstName" type="text" class="form-control" id="fname" placeholder="First Name">';  
            echo '<p class="alert-danger" id="nameStatus_f">First Name cannot be blank!</p>';
            echo '</div>';
        }
        else //there IS an error and the SESSION has been set so display the error
        {
            if (isset($_SESSION['fname'])) //bad match
            {
                echo '<div class="form-group has-error">';
                echo '<label for="inputError1">First Name</label>'; 
                echo '<input name="firstName" type="text" class="form-control" id="inputError1" 
                value="'.$_SESSION['fname'].'">';  
                echo '<p class="alert-danger" id="nameStatus_f">Invalid First Name</p>';
                echo '</div>';
            }
        }
    }
//LAST NAME-----------------------------------------------------------------------------
if (!isset($_GET['lname'])) // no error found,
{
    if (isset($_SESSION['lname']))// check for previously submitted data
    {
        echo '<div class="form-group">';
        echo '<label for="Personal Info">Last Name</label>'; 
        echo '<input name="lastName" type="text" class="form-control" 
        value="'.$_SESSION['fname'].'">';  
        echo '<p id="nameStatus_l"></p>';
        echo '</div>';
    }
    else //no previously submitted data found, display default input group
    {
        echo '<div class="form-group">';
        echo '<label for="Personal Info">Last Name</label>'; 
        echo '<input name="lastName" type="text" class="form-control" id="lname" placeholder="Last Name">';  
        echo '<p id="nameStatus_l"></p>';
        echo '</div>';
    }
}
elseif (isset($_GET['lname']))
{
    if ($_GET['lname']=="lnameNULL") //no data to be grabbed bc SESSION var is NULL
    {
        echo '<div class="form-group has-error">';
        echo '<label for="inputError1">Last Name</label>'; 
        echo '<input name="lastName" type="text" class="form-control" id="lname" placeholder="Last Name">';  
        echo '<p class="alert-danger" id="nameStatus_l">Last Name cannot be blank!</p>';
        echo '</div>';
    }
    else //there IS an error and the SESSION has been set so display the error
    {
        if (isset($_SESSION['lname'])) //bad match
        {
            echo '<div class="form-group has-error">';
            echo '<label for="inputError1">Last Name</label>'; 
            echo '<input name="lastName" type="text" class="form-control" id="inputError1" 
            value="'.$_SESSION['lname'].'">';  
            echo '<p class="alert-danger" id="nameStatus_l">Invalid Last Name</p>';
            echo '</div>';
        }
    }
}

//PHONE NUMBER---------------------------------------------------------------------------------
if (!isset($_GET['pn'])) // no error found,
{
    if (isset($_SESSION['pn']))// check for previously submitted data
    {
        echo '<div class="form-group">';
        echo '<label for="Personal Info">Phone Number</label>'; 
        echo '<input name="phNum" type="text" class="form-control" 
        value="'.$_SESSION['pn'].'">';  
        echo '<p id="pnStatus"></p>';
        echo '</div>';
    }
    else //no previously submitted data found, display default input group
    {
        echo '<div class="form-group">';
        echo '<label for="Personal Info">Phone Number</label>'; 
        echo '<input name="phNum" type="text" class="form-control" id="pn" placeholder="Phone Number">';  
        echo '<p id="pnStatus"></p>';
        echo '</div>';
    }
}
elseif (isset($_GET['pn']))
{
    if ($_GET['pn']=="phNumNULL") //no data to be grabbed bc SESSION var is NULL
    {
        echo '<div class="form-group has-error">';
        echo '<label for="inputError1">Phone Number</label>'; 
        echo '<input name="phNum" type="text" class="form-control" id="pn" placeholder="Phone Number">';  
        echo '<p class="alert-danger" id="pnStatus">Phone Number cannot be blank!</p>';
        echo '</div>';
    }
    else //there IS an error and the SESSION has been set so display the error
    {
        if (isset($_SESSION['pn'])) //bad match
        {
            echo '<div class="form-group has-error">';
            echo '<label for="inputError1">Phone Number</label>'; 
            echo '<input name="phNum" type="text" class="form-control" id="inputError1" 
            value="'.$_SESSION['pn'].'">';  
            echo '<p class="alert-danger" id="pnStatus">Invalid Phone Number</p>';
            echo '</div>';
        }
    }
}
// COMMMENTS---------------------------------------------------------------------------------------
if (!isset($_GET['comm'])) // no error found,
{
    if (isset($_SESSION['comm']))// check for previously submitted data
    {
        echo '<div class="form-group">';
        echo '<label for="Personal Info">Comments</label>'; 
        echo '<textarea name="comments" type="text" class="form-control" 
        value="'.$_SESSION['comm'].'"></textarea>';  
        echo '<p id="comStatus"></p>';
        echo '</div>';
    }
    else //no previously submitted data found, display default input group
    {
        echo '<div class="form-group">';
        echo '<label for="Personal Info">Comments</label>'; 
        echo '<textarea name="comments" type="text" class="form-control" id="comm" placeholder="Comments"></textarea>';  
        echo '<p id="comStatus"></p>';
        echo '</div>';
    }
}
elseif (isset($_GET['comm']))
{
    if ($_GET['comm']=="commNULL") //no data to be grabbed bc SESSION var is NULL
    {
        echo '<div class="form-group has-error">';
        echo '<label for="inputError1">Comments</label>'; 
        echo '<textarea name="comments" type="text" class="form-control" id="comm" placeholder="Comments"></textarea>';  
        echo '<p class="alert-danger" id="comStatus">Comments cannot be blank!</p>';
        echo '</div>';
    }

}    
echo '<button name="submit" type="submit" value="submit">Submit</button>';  
echo '</form>';
}
//----------------------------------------------------------------
if (isset($_POST['submit']))
{
    if ($_POST['submit']=="submit")
    {
      $errStatus=array();
      $email=$_POST['email'];
      $firstName=$_POST['firstName'];
      $lastName=$_POST['lastName'];
      $phNum=$_POST['phNum'];
      $comments=$_POST['comments'];
      //firstname -------------------------------------------------
      $nameRegex = "/^[a-zA-Z]+(['-]?[a-zA-Z]+)*$/";
      if ($firstName==NULL)
          $errStatus[]="fname=fnameNULL";
      elseif (preg_match($nameRegex, $firstName)==FALSE)
      {
        $errStatus[]="fname=fnameInvalid";
        $_SESSION['fname']=$firstName;
      }
      $_SESSION['fname']=$firstName;
      //lastname -----------------------------------------------
      if ($firstName==NULL)
        $errStatus[]="lname=lnameNULL";
      elseif (preg_match($nameRegex, $lastName)==FALSE)
      {
        $errStatus[]="lname=lnameInvalid";
        $_SESSION['lname']=$lastName;
      }
      $_SESSION['lname']=$lastName;
      //email ----------------------------------------------------
      $emailRe = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
      if ($email==NULL)
          $errStatus[]="email=emailNULL";
      elseif (preg_match($emailRe, $email)==FALSE)
      {
          $errStatus[]="email=emailInvalid";
          $_SESSION['email']=$email;
      }
      $_SESSION['email']=$email;
      //phone number ------------------------------------------
      $phRe ="/^[0-9]{10}$/";
      if ($phNum==NULL)
          $errStatus[]="pn=phNumNULL";
      elseif (preg_match($phRe, $phNum)==FALSE)
      {
        $errStatus[]="pn=phNumInvalid";
        $_SESSION['pn']=$email;
      }
      $_SESSION['pn']=$phNum;
      //comments ------------------------------------------------
      if ($comments==NULL)
          $errStatus[]="comm=commNULL";
      else
          $_SESSION['comm']=$comments;
      $_SESSION['comm']=$comments;

      //---------------------------------------------------------
      if (count($errStatus)>0)                                    //No input Errors found.
      {
        $errString=implode("&",$errStatus);
        redirect("https://ec2-18-223-133-190.us-east-2.compute.amazonaws.com/hw19/index.php?page=contact&$errString");
      }
	  $dblink=db_connect("contact");
	  $fnameClean=addslashes($firstName);
	  $lnameClean=addslashes($lastName);
	  $emailClean=addslashes($email);
	  $phNumClean=addslashes($phNum);
	  $commentsClean=addslashes($comments);
	  //add sanitized data created above to the database
	  $sql="Insert into `contact_info` (`first_name`, `last_name`, `email`, `phone_number`, `comments`) values ('$fnameClean', '$lnameClean', '$emailClean', '$phNumClean', '$commentsClean')";
	  $dblink->query($sql) or
		  die("<p>Something went wrong with: $sql<br>".$dblink->error."</p>");
	  redirect("https://ec2-18-223-133-190.us-east-2.compute.amazonaws.com/hw19/index.php?page=contact&msg=success");

    }
  }
  echo '</div>';
?>