<?php include('includes/header.php'); ?>
<!-- {{{ -->
<style>
body{
  background-color:#696969;
}
form{
  border:solid 2px ;
  padding:10px;
}
input{
  font-size:1.1em;
}
.hp{
  width:100%;
}
.block{
  display:block;
}
.file{
  cursor:pointer
}
</style>
<!-- }}} -->

<form method="post" enctype="multipart/form-data">
  <input class="hp block file" name="file" type="file">
  <input class="hp block" name="title"      placeholder="Title" >
<!--
  <input type="radio" id=classic name=music_type value="classic">
  <label for="classic">classic</label> <br>
  <input type="radio" id=rap name=music_type value="rap">
  <label for="rap">Rap</label><br>
-->
  <input class="hp block" name="artist"     placeholder="Artist" >
  <input class="hp block" name="keywoards"  placeholder="Keywoards (comma seperated)" >
  <input class="hp block" name="submit" type="submit" value="upload">
</form>
<?php
if(isset($_POST['submit'])){
  $fileName = bin2hex(openssl_random_pseudo_bytes(16));
  $file = file_get_contents($_FILES['file']['tmp_name']);
  move_uploaded_file($_FILES['file']['tmp_name'], 'content/music/'.$fileName);

  $song = new music;
  $song->upload($_POST["title"],$_POST["artist"],$_POST["keywoards"],$fileName);
  
  print_r($_POST);
}
?>
<?php include('includes/footer.php'); ?>
<!-- 
vim:fdm=marker
-->
