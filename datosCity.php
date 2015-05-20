<?php    
  $id    = $_POST['country'];
  //$id    = strtolower('DE');
  //$hotel = $_POST['hotel'];
  //$hotel = 'adler';
  $file  = 'cityData/city'.$id.'.txt';
  $lines = file($file);
  echo '<option value="0">City option</option>';

  foreach($lines as $line){
    echo  '<option value="'.$line.'">'.$line.'</option>';
  }

?>
