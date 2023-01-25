<?php
class Detect{
  function mime($file_path){
    $file_info = new finfo(FILEINFO_MIME);
    $mime_type = $file_info->buffer(file_get_contents($file_path));
    return preg_split("/[\s;]+/",$mime_type)[0];
  }
}
