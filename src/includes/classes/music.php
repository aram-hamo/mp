<?php

class music extends db{

  public function upload($title,$artist,$keywoards,$file_name){
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

    $m_stmt = "insert into songs_metadata (title,keywoards,sId) values (:title,:keywoards,:sId)";
    $metadata = $this->conn->prepare($m_stmt);
    $metadata->bindValue(":title",$title);
    $metadata->bindValue(":keywoards",$keywoards);
    $metadata->bindValue(":sId",$Id[0]["id"]);
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
}
