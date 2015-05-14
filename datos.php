<?php    
  $id    = strtolower($_POST['country']);
  //$id    = strtolower('DE');
  $hotel = $_POST['hotel'];
  //$hotel = 'adler';
  $file  = 'data/'.$id.'.txt';
  $lines = file($file);
  $tr    = '';
  $trh   = '';

  foreach($lines as $line){
    $line = explode("|",$line);
    $find = strripos($line[1], $hotel);

    if ($hotel != '') {
        if ($find !== false) {
            echo '<tr>
                      <th>
                        <a href="javascript:viewHotel('.$line[0].')" href="javascript:void(0)">
                          '.$line[1].'
                        </a>
                      </th>
                    </tr>';
        }
    } else {
        echo  '<tr>
                  <th>
                    <a href="javascript:viewHotel('.$line[0].')" href="javascript:void(0)">
                      '.$line[1].'
                    </a>
                  </th>
                </tr>';
    }
  }

?>
