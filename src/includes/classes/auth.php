<?php

class auth extends db{

  public function register($firstName,$lastName,$username,$password,$email){

  $tokan = bin2hex(openssl_random_pseudo_bytes(16));
  $hashedPassword = password_hash($password,PASSWORD_BCRYPT);
  $stmt = "insert into users (firstName,lastName,username,password,email,verified,tokan) values (:firstName,:lastName,:username ,:password,:email,false,:tokan)";
	$createUser = $this->conn->prepare($stmt);
	$createUser->bindValue(':firstName',$firstName);
	$createUser->bindValue(':lastName',$lastName);
	$createUser->bindValue(':username',$username);
	$createUser->bindValue(':email',$email);
	$createUser->bindValue(':password',$hashedPassword);
  $createUser->bindValue(':tokan',$tokan);
	if($createUser->execute()){
    setcookie("tokan",$tokan,time()+60*60*24*30,null,null,true,true);
  }
  }

  public function login($username,$password){

  $stmt = $this->conn->prepare('select * from users where username=:username');
  $stmt->bindValue(':username',$username);
  $stmt->execute();
  $userData =  $stmt->fetchAll();
  $verify = password_verify($password,$userData[0]['password']);
  if($verify){
    setcookie("tokan",$userData[0]['tokan'],time()+60*60*24*30,null,null,true,true);
  }
  return $verify;
  }
  public function tokanCheck(){
    if(isset($_COOKIE['tokan'])){
      $stmt = $this->conn->prepare('select * from users where tokan=:tokan');
      $stmt->bindValue(':tokan',$_COOKIE['tokan']);
      $stmt->execute();
      return $stmt->fetchAll();
    }
  }
  public function getUserDataByToken($token){
    $stmt = $this->conn->prepare('select * from users where tokan=:token');
    $stmt->bindValue(':token',$token);
    $stmt->execute();
    return $stmt->fetchAll();

  }
  public function updateUserData($uid,$firstName,$lastName,$email){
    $stmt = $this->conn->prepare('update users set firstName=:firstName,lastName=:lastName,email=:email where id=:uid');
    $stmt->bindValue(':uid',$uid);
    $stmt->bindValue(':firstName',$firstName);
    $stmt->bindValue(':lastName',$lastName);
    $stmt->bindValue(':email',$email);
    $stmt->execute();

  }
}
