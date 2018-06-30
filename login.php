
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #4CAF50;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="password"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="password"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="password"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
</style>

<div class="container">  
  <form id="contact"  action="" method="post">

  
    <fieldset>
      <input placeholder="Username" type="text" tabindex="2"  name="user">
    </fieldset>
   
      <input placeholder="Enter Password" type="password" tabindex="2"  name ="pass">
    </fieldset>
     
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" >Submit</button>
    </fieldset>
   
  </form>
</div>

<?php 
require 'vendor/autoload.php';
include_once ('demo.php');
session_start();
if(isset($_POST["submit"]))
{
$user=$_POST["user"];
$pass=$_POST["pass"];

if(empty($user) && empty($pass))
{
echo "<script>alert('PLEASE ENTER USERNAME & PASSWORD ..... !!!');</script>";
}
else if(empty($user))
{
echo "<script>alert('PLEASE ENTER USERNAME ..... !!!');</script>";
}
else if(empty($pass))
{
echo "<script>alert('PLEASE ENTER PASSWORD ..... !!!');</script>";
}
else
{


$cursor = $db->registration->find();


foreach ($cursor as $obj)
{
if($obj['user']==$user && $obj['pass']==$pass)
{
$_SESSION['user_id']=$obj['_id'];
$_SESSION['fname']=$obj['fname'];

//$_SESSION['address']=$obj['address'];
//$_SESSION['pincode']=$obj['pincode'];
$_SESSION['phone']=$obj['phone'];
$_SESSION['user']=$obj['user'];

header("Location:index.php");
}
}
echo "<script>alert('WRONG USERNAME & PASSWORD ..... !!!');</script>";
}
echo "<script>alert('error..... !!!');</script>";
}
echo "eror";
?>
</body>
</html>