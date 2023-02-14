<?php include('includes/header.php'); ?>
<style>
form > a{
  text-decoration:0;
}
@media(min-width:400px ){body{ margin-top:5%; padding-left:5%; padding-right:5%; }}
@media(min-width:700px ){body{ margin-top:5%; padding-left:10%; padding-right:10%; } }
@media(min-width:1000px){body{ margin-top:5%; padding-left:20%; padding-right:20%; } }
</style>
<?php
$auth = new auth;
if($auth->tokanCheck()){
  header("Location: /dashboard");
  exit();
}
if(isset($_GET['register'])){
  include('includes/register.php');
}else{
  include('includes/login.php');
}
if($auth->tokanCheck()){
  header("Location: /dashboard");
  exit();
}
?>
<?php include('includes/footer.php'); ?>
