<?php
class Metadata{

  function get($media_path){
    $cmd = "mediainfo --Output=JSON " .$media_path;
    $metadata = json_decode(shell_exec($cmd),1);
    $trackMetadata = 
    array("title"=>$metadata['media']['track'][0]['Title'],
    "album"=>$metadata['media']['track'][0]['Album'],
    "track"=>$metadata['media']['track'][0]['Track']);

    return $trackMetadata;
  }

  function remove($fileName){
    $cmd = "ffmpeg -i tmp/$fileName -map_metadata -1 -c:v copy -c:a copy content/music/$fileName";

  }
}
