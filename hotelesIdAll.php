<?php
/**
 * Send a GET requst using cURL
 * @param string $url to request
 * @param array $get values to send
 * @param array $options for cURL
 * @return string
 */
function curl_get($url, array $get = NULL, array $options = array()) {
    $defaults = array(
        CURLOPT_URL => $url . (strpos($url, '?') === FALSE ? '?' : '') . http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 0
    );
     
    $ch = curl_init();
 
    curl_setopt_array($ch, ($options + $defaults));
 
    if (!$result = curl_exec($ch)) {
        trigger_error(curl_error($ch));
    }
 
    curl_close($ch);
    return $result;
}

// Establecer el tipo de contenido
//header('Content-type: application/xml');
$url = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/items/?country=DE";

    
//obtener el xml usarndo curl y simplexml
$res = curl_get($url, array());
$object = simplexml_load_string($res);


foreach ($object->items->item as $item) {
    $classImage = 'NO';
    $classCategory = '0';
    //if ($item['giataId'] > 52855) {
        $link    = $item->attributes( 'xlink', true);
        //echo $link;
        $url     = explode("ghgml",$link['href']);
        $url     = $url[0]."de|travelgroup24.com:7ykKY5BR@ghgml".$url[1];
        
        $res2     = curl_get($url, array());
        $hotel   = simplexml_load_string($res2);
        if ($hotel->item->images) {
            $classImage = 'YES';
        }

        $url2 = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/factsheets/".$item['giataId'];
        $res3 = curl_get($url2, array());
        $fact = simplexml_load_string($res3);

        if ($fact->code == '404') {
            $classCategory = '0';
        } else {
            foreach ($fact->item->factsheet->sections->section as $section) {
                switch ($section['name']) {
                    case 'category':
                        foreach ($section->facts->fact as $fact) {
                            switch ($fact['id']) {
                                case '16':
                                    $classCategory = 'stars_'.$fact->value;
                                    break;

                                default:
                                    # code...
                                    break;
                            }
                        }
                    break;
                }
            }
        }
        
        echo $item['giataId'].'|'.utf8_decode($hotel->item->name).'|'.utf8_decode($hotel->item->city).'|'.$classImage.'|'.$classCategory.'<br/>';
    //}    
}


?>