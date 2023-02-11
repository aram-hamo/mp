<?php

class music extends db{

  public function upload($file_name){
    $fileDetect = new FileDetect;

    $s_stmt = "insert into songs (format,fileName)values(:format,:fileName)";
    $song = $this->conn->prepare($s_stmt);
    $song->bindValue(":format",$fileDetect->mime("content/music/".$file_name));
    $song->bindValue(":fileName",$file_name);
    $song->execute();

    // getting the song id
    $getId = $this->conn->prepare("select id from songs where fileName=:fileName");
    $getId->bindValue(':fileName',$file_name);
    $getId->execute();
    $Id =  $getId->fetchAll();

    $auth = new auth;
    $m_stmt = "insert into songs_metadata (sId,uploader_id) values (:sId,:uploader_id)";
    $metadata = $this->conn->prepare($m_stmt);
    $metadata->bindValue(":sId",$Id[0]["id"]);
    $metadata->bindValue(":uploader_id",$auth->getUserDataByToken($_COOKIE['tokan'])[0]['id']);
    $metadata->execute();

  }
  public function addArtist($firstName,$lastName,$nickName,$description){
    $astmt = "insert into artists (firstName,lastName,nickName,description) values (:firstName,:lastName,:nickName,:description)";
    $artist = $this->conn->prepare($astmt);
    $artist->bindValue(":firstName",$firstName);
    $artist->bindValue(":lastName",$lastName);
    $artist->bindValue(":nickName",$nickName);
    $artist->bindValue(":description",$description);
    $artist->execute();
  }
  public function createPlaylist($uId,$title){
    $createPlaylist = $this->conn->prepare("INSERT INTO playlists (uId,title,p_id)values(:uId,:title,:p_id);");
    $createPlaylist->bindValue(":uId",$uId);
    $createPlaylist->bindValue(":title",$title);
    $createPlaylist->bindValue(":p_id",bin2hex(openssl_random_pseudo_bytes(8)));
    $createPlaylist->execute();
  }
  public function getPlaylist($uId){
    $getId = $this->conn->prepare("select * from playlists where uId=:uId");
    $getId->bindValue(':uId',$uId);
    $getId->execute();
    return($getId->fetchAll());
  }
  public function addToPlaylist($p_id,$song_id){
    $addToPlaylist = $this->conn->prepare("insert into in_playlist (p_id,songs_id)values(:p_id,:song_id)");
    $addToPlaylist->bindValue(':p_id',$p_id);
    $addToPlaylist->bindValue(':song_id',$song_id);
    $addToPlaylist->execute();
  }
  public function getAllSongs($uId){
    $cmd = "SELECT * FROM songs  INNER JOIN songs_metadata ON songs.id = songs_metadata.sId WHERE uploader_id=:uId;";
    $getAllSongs = $this->conn->prepare($cmd);
    $getAllSongs->bindValue(':uId',$uId);
    $getAllSongs->execute();
    return($getAllSongs->fetchAll());
  }
}
