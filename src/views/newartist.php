<?php include('includes/header.php'); ?>
<form method="post">
  <input placeholder="Artist First Name" type="" name="artistFirstName">
  <input placeholder="Artist Last Name" type="" name="artistLastName">
  <input placeholder="Artist Nickname" type="" name="artistNickName">
  <input placeholder="Description" type="" name="artistDescription">
  <input name="submit" type="submit" value="Add New Artist">
</form>
<?php
if(isset($_POST['submit'])){
  $artist = new music;
  $artist->addArtist($_POST['artistFirstName'],$_POST['artistLastName'],$_POST['artistNickName'],$_POST['artistDescription']);
}
?>
<?php include('includes/footer.php'); ?>
