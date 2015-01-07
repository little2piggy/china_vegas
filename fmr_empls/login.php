<?php
global $_WORDS;
/**
 * Checks whether or not the given username is in the
 * database, if so it checks if the given password is
 * the same password in the database for that user.
 * If the user doesn't exist or if the passwords don't
 * match up, it returns an error code (1 or 2). 
 * On success it returns 0.
 */
include_once("include/database.php");

/**
 * checkLogin - Checks if the user has already previously
 * logged in, and a session with the user has already been
 * established. Also checks to see if user has been remembered.
 * If so, the database is queried to make sure of the user's 
 * authenticity. Returns true if the user has logged in.
 */
function checkLogin(){
	global $database, $session, $form;
   /* Check if user has been remembered */
   if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])){
      $_SESSION['username'] = $_COOKIE['cookname'];
      $_SESSION['password'] = $_COOKIE['cookpass'];
   }

   /* Username and password have been set */
   if(isset($_SESSION['username']) && isset($_SESSION['password'])){
      /* Confirm that username and password are valid */
	  if ($_SESSION['username'] =="" || $_SESSION['password']==""  ||
			$_SESSION['username'] ==NULL || $_SESSION['password']==NULL)
	  {
			return false;  
		}
	 	$conf = $database->confirmUserPass($_SESSION['username'], $_SESSION['password']) ;
      if($conf != 0){
         /* Variables are incorrect, user not logged in */
         unset($_SESSION['username']);
         unset($_SESSION['password']);
         return false;
      }
      return true;
   }
   /* User not logged in */
   else{
      return false;
   }
}

/**
 * Determines whether or not to display the login
 * form or to show the user that he is logged in
 * based on if the session variables are set.
 */
function displayLogin(){
	global $_WORDS;
   global $logged_in;
   if($logged_in){
     echo "$_SESSION[username], you are logged in. <a href=\"logout.php\">Logout</a>";
   }
   else{
?>
        <p align="center"><b><?php echo $_WORDS['login'];?></b></p>        
        <form action='' method='post'>
        <table align="center" border="0" cellspacing="0" cellpadding="3">
        <tr><td><?php echo $_WORDS['username']; ?>:</td><td><input type="text" name="user" id="user" maxlength="30"></td></tr>
        <tr><td><?php echo $_WORDS['pass'];?>:</td><td><input type="password" name="pass" id="pass" maxlength="30"></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" name="sublogin" value="<?php echo $_WORDS['login'];?>"></td></tr>
        </table>
        </form>

<?php
   }
}


/**
 * Checks to see if the user has submitted his
 * username and password through the login form,
 * if so, checks authenticity in database and
 * creates session.
 */
if(isset($_POST['sublogin'])){
	
   /* Check that all fields were typed in */
   if(!$_POST['user'] || !$_POST['pass']){
      die('You didn\'t fill in a required field.');
   }
   $_POST['pass'] = trim($_POST['pass']);
   if(strlen($_POST['pass'])< 6 || strlen($_POST['pass']) > 20){
      die(" Incorrect password, please try again.");
   }
   /* Spruce up username, check length */
   $_POST['user'] = trim($_POST['user']);
   if(strlen($_POST['user'])< 5 || strlen($_POST['user']) > 30){
      die(" Incorrect username, please try again.");
   }

   /* Checks that username is in database and password is correct */
   $md5pass = md5($_POST['pass']);
   $result = $database->confirmUserPass($_POST['user'], $md5pass);
   $_SESSION['level'] = $database->getUserLevel($_POST['user'], $md5pass);
													   
   /* Check error codes */
   if($result == 1){
      die(' Incorrect username, please try again.');
   }
   else if($result == 2){
      die(' Incorrect password, please try again.');
   }

   /* Username and password correct, register session variables */
   $_POST['user'] = stripslashes($_POST['user']);
   $_SESSION['username'] = $_POST['user'];
   $_SESSION['password'] = $md5pass;

   /**
    * This is the cool part: the user has requested that we remember that
    * he's logged in, so we set two cookies. One to hold his username,
    * and one to hold his md5 encrypted password. We set them both to
    * expire in 100 days. Now, next time he comes to our site, we will
    * log him in automatically.
    */
   if(isset($_POST['remember'])){
      setcookie("cookname", $_SESSION['username'], time()+60*60*24*100, "/");
      //setcookie("cookpass", $_SESSION['password'], time()+60*60*24*100, "/");
   }

   /* Quick self-redirect to avoid resending data on refresh */
   echo "<meta http-equiv=\"Refresh\" content=\"0;url=$HTTP_SERVER_VARS[PHP_SELF]\">";
   return;
}

/* Sets the value of the logged_in variable, which can be used in your code */
$logged_in = checkLogin();

?>
