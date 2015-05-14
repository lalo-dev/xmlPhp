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

$url = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/texts/de/".$_POST['hotel'];
//$url = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/texts/de/4967";
    
//obtener el xml usarndo curl y simplexml
$res = curl_get($url, array());
$object = simplexml_load_string($res);

if ($object->code == '404') {
    echo '<div class="row"></div><h4>No Texts</h4>';
} else {

    foreach ($object->item->texts->text->sections->section as $section) {
    echo '<div class="col-sm-12">
            <h4>'.addslashes($section->title).'</h4>'
            .addslashes($section->para).
        '</div>';
    }
}

?>