<?php    
  $id    = strtolower($_POST['country']);
  //$id    = strtolower('DE');
  $city  = $_POST['city'];
  $hotel = $_POST['hotel'];
  //$hotel = 'adler';
  $file  = 'countryData/country'.$id.'.txt';
  $lines = file($file);
  //echo $city;
  //$classStars = '';
  //$stars = '';

  foreach($lines as $line){
    $line = explode("|",$line);
    $find = strripos($line[1], $hotel);
    $lineStar = $line[4];
    echo '<p>'.$lineStar.'</p>';

    switch ($lineStar) {
      case 'stars_1':
        $stars      = '1';
        $classStars = 'stars_1';
        break;

      case 'stars_1.5':
        $stars      = '1.5';
        $classStars = 'stars_15';
        break;

      case 'stars_2':
        $stars      = '2';
        $classStars = 'stars_2';
        break;

      case 'stars_2.5':
        $stars      = '2.5';
        $classStars = 'stars_25';
        break;

      case 'stars_3':
        $stars      = '3';
        $classStars = 'stars_3';
        break;

      case 'stars_3.5':
        $stars      = '3.5';
        $classStars = 'stars_35';
        break;

      case 'stars_4':mmm
        $stars      = '4';
        $classStars = 'stars_4';
        break;

      case 'stars_4':
        $stars      = '4.5';
        $classStars = 'stars_45';
        break;

      case 'stars_5':
        $stars      = '5';
        $classStars = 'stars_5';
        break;

      case 'stars_0':
        $stars      = '0';
        $classStars = 'stars_0';
        break;
      
      default:
        # code...
        break;
    }

    if ($city != '' && $hotel != '') {
      if ($find !== false && trim($city) == $line[2]) {
        echo '<tr class="'.$line[3].' '.$classStars.'">
                  <th>'.$line[2].'</th>
                  <th>'.$line[3].'</th>
                  <th>'.$stars.'</th>
                  <th>
                    <a href="javascript:viewHotel('.$line[0].')" href="javascript:void(0)">
                      '.$line[1].'
                    </a>
                  </th>
                </tr>';
        } 
    } elseif ($city != '') {
      if (trim($city) == $line[2]) {
        echo '<tr class="'.$line[3].' '.$classStars.'">
                  <th>'.$line[2].'</th>
                  <th>'.$line[3].'</th>
                  <th>'.$stars.'</th>
                  <th>
                    <a href="javascript:viewHotel('.$line[0].')" href="javascript:void(0)">
                      '.$line[1].'
                    </a>
                  </th>
                </tr>';
        }
    } elseif ($hotel != '') {
      if ($find !== false) {
        echo '<tr class="'.$line[3].' '.$classStars.'">
                  <th>'.$line[2].'</th>
                  <th>'.$line[3].'</th>
                  <th>'.$stars.'</th>
                  <th>
                    <a href="javascript:viewHotel('.$line[0].')" href="javascript:void(0)">
                      '.$line[1].'
                    </a>
                  </th>
                </tr>';
        }
    } else {
      echo  '<tr class="'.$line[3].' '.$classStars.'">
                  <th>'.$line[2].'</th>
                  <th>'.$line[3].'</th>
                  <th>'.$stars.'</th>
                  <th>
                    <a href="javascript:viewHotel('.$line[0].')" href="javascript:void(0)">
                      '.$line[1].'
                    </a>
                  </th>
                </tr>';
    }

    
  }

?>
