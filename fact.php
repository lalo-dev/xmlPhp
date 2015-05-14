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

$url = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/factsheets/".$_POST['hotel'];
//$url = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/factsheets/4967";
    
//obtener el xml usarndo curl y simplexml
$res = curl_get($url, array());
$object = simplexml_load_string($res);
$count = 0;

echo '<div class="row">';

if ($object->code == '404') {
    echo '</div><h4>No Facts</h4>';
} else {
    foreach ($object->item->factsheet->sections->section as $section) {
        if ($count == 4) {
            echo '<div class="row">';
        } elseif ($count == 8) {
            echo '<div class="row">';
        }

        switch ($section['name']) {
            case 'object_information':

                echo '<div class="col-sm-3">
                        <h4>Objekt-Informationen</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '3':
                            echo '<div class="form-group">
                                    <label class="col-sm-7 control-label">Hotelkette</label>
                                    <div class="col-sm-5">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '6':
                            echo '<div class="form-group">
                                    <label class="col-sm-7 control-label">Post-Code</label>
                                    <div class="col-sm-5">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '8':
                            echo '<div class="form-group">
                                    <label class="col-sm-7 control-label">Telefon Empfang</label>
                                    <div class="col-sm-5">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '9':
                            echo '<div class="form-group">
                                    <label class="col-sm-7 control-label">Telefon Hotelleitung</label>
                                    <div class="col-sm-5">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '10':
                            echo '<div class="form-group">
                                    <label class="col-sm-7 control-label">Fax</label>
                                    <div class="col-sm-5">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '11':
                            echo '<div class="form-group">
                                    <label class="col-sm-7 control-label">E-mail</label>
                                    <div class="col-sm-5">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '12':
                            echo '<div class="form-group">
                                    <label class="col-sm-7 control-label">Web-Adresse</label>
                                    <div class="col-sm-5">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '234':
                            echo '<div class="form-group">
                                    <label class="col-sm-7 control-label">Telefon Hotel</label>
                                    <div class="col-sm-5">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }
               
                echo '</div>';
                $count++;
                break;

            case 'category':
                echo '<div class="col-sm-3">
                        <h4>Kategorie</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '16':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kategorie (offiziell)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '17':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kategorie (empfohlen)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }
               
                echo '</div>';
                $count++;
                break;

            case 'building_info':
                echo '<div class="col-sm-3">
                        <h4>Gebäude-Informationen</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '18':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">An e. Hauptstr. gelegen</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '19':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Erbaut im Jahr</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '20':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Jahr der Renovierung</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '21':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Nebengebäude</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '22':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Stockwerke - Hauptgebäude</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '23':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Stockwerke - Nebengebäude</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '24':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Garten (m²)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '25':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Terrasse (m²)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '26':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der Zimmer (gesamt)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '27':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der EZ</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '28':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der DZ</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '29':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der Suiten</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '30':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der Apartments</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '206':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Junior Suites</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '207':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der Studios</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '208':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der Bungalows</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '209':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der Villen / Häuser</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

            case 'hotel_type':
                echo '<div class="col-sm-3">
                        <h4>Hoteltyp</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '31':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Cityhotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '32':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Strandhotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '33':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Apartmenthotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '34':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bungalowkomplex</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '35':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Gästehaus</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '36':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Landhaus</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '38':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Skihotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '39':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Club Resort</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '40':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Finca</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '41':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Village</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '42':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kurhotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '43':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Golfhotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '44':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Casino-Resort</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '45':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Airport-Hotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '46':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Eco-Hotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '47':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Historien-Hotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '48':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Konferenz-Hotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '49':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Hostel/Jugendhotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '50':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Hotel de Charme</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '51':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Berghotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '52':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Berghütte</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '202':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Familienfreundliches Hotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '203':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Businesshotel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

            case 'payment':
                echo '<div class="col-sm-3">
                        <h4>Zahlungsmöglichkeiten</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '53':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">American Express</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '54':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Visa Card</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '55':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">MasterCard</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '56':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Diners Club</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '57':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">JCB</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '58':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">EC-Karte</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '59':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Sandy</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

            case 'beach':
                echo '<div class="col-sm-3">
                        <h4>Strand</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '59':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Sandstrand</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '60':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kiesstrand</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '61':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Steinig</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '62':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Liegestühle</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '63':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Sonnenschirme</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '64':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Direkt am Stand gelegen</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '65':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Vom Strand durch Str. getrennt</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

            case 'facilities':
                echo '<div class="col-sm-3">
                        <h4>Hotel-Ausstattung</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '67':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Klimaanlage</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '68':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Empfangsbereich</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '69':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Rezeption 24-h-Service</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '70':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Abfertigung 24-h-Service</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '71':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Hotel-Safe</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '72':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Geldwechsel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '73':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Garderobe</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '74':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Empfangshalle</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '75':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Aufzüge</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '76':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Café</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '77':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kiosk</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '78':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Minimarkt</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '79':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Geschäfte</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '80':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Friseur</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '81':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bar(s)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '82':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Pub(s)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '83':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Disco</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '84':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Theatersaal</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '86':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Casino</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '87':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Spielzimmer</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '88':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Restaurant(s)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '89':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Restaurant(s) mit Klimaanlage</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '90':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Restaurant(s) mit Nichtraucherbereich</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '91':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Restaurant(s) mit Kinderhochstühlen</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '92':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Konferenzraum</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '93':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Mobilfunknetz</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '94':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Öffentliches Internet</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '95':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">WLAN-Internet</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '96':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Zimmerservice</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '97':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Wäscheservice</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '98':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Medizinische Betreuung</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '99':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Fahrradkeller</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '100':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Fahrradverleih</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '101':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Parkplatz</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '102':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Garage</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '103':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Miniclub</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '104':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Spielplatz</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '194':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">TV-Raum</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '216':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Restaurant(s) mit Raucherbereich</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '217':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Waschgelegenheit</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

            case 'room_facilities':
                echo '<div class="col-sm-3">
                        <h4>Zimmer</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '106':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Badezimmer</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '107':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Dusche</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '108':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Badewanne</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '109':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bidet</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '110':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Haartrockner</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '111':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Direktwahltelefon</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '112':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Satelliten-/Kabel-TV</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '113':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Radio</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '114':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">HiFi-Anlage</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '115':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Internetzugang</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '116':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kochnische</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '117':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Minibar</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '118':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kühlschrank</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '119':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kingsize-Bett</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '120':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Fliesen</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '121':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Teppichboden</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '122':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Klimaanlage (zentral geregelt)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '123':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Zentralheizung</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '124':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Safe</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '125':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Endreinigung</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '126':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Lounge</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '127':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Balkon/Terrasse</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '143':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">TV</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '205':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Doppelbett</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '210':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Klimaanlage (individuell)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '211':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Heizung (individuell)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '212':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Herd</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '213':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Mikrowelle</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '214':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Tee-/Kaffeezubereiter</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '215':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Waschmaschine</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '230':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Rollstuhl geeignet</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

            case 'meals':
                echo '<div class="col-sm-3">
                        <h4>Verpflegung</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '129':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Halbpension</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '130':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Vollpension</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '131':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Frühstücksbuffet</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '132':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Frühstück serviert</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '133':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Mittagsbuffet</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '134':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Mittagsessen à la carte</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '135':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Mittagessen Menüwahl</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '136':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Abendessen Buffet</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '137':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Abendessen à la carte</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '138':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Abendessen Menüwahl</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '139':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">All-inclusive</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '140':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Getränke enthalten</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '141':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Diätische Küche</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '142':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Spezielle Angebote</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        case '199':
                            $ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kontinentales Frühstück</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$ans.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

            case 'sports_entertainment':
                echo '<div class="col-sm-3">
                        <h4>Sport / Unterhaltung</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '144':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Sandy</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '145':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Außenpool(s)</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '146':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Pool(s) mit Süßwasser</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '147':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Pool(s) mit Salzwasser</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '148':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kinderpool/-bereich</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '149':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Pool- / Snackbar</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '150':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Liegestühle</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '151':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Sonnenschirme</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '152':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Wasseraerobic</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '153':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Whirlpool</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '154':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Sauna</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '155':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Sonnenterrasse</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '156':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Dampfbad</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '157':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Massage</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '158':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Wellness-Angebote</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '159':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bananenboot</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '160':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Wasserski</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '161':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Jet Ski</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '162':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Motorboot</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '163':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Tauchen</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '164':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Wellenreiten</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '165':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Windsurfen</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '166':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Segeln</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '167':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Katamaran</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '168':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Kanu</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '169':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Tretboot</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '170':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Tischtennis</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '171':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Squash</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '172':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Aerobic</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '173':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Fitness-Studio</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '174':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bogenschießen</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '175':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Reiten</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '176':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Fahrrad/Mountainbike</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '177':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Basketball</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '178':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Beach-Volleyball</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '179':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Billard / Snooker</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '180':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Boccia</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '181':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bowlingbahn</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '182':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Minigolf</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '183':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Golf</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '184':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Animationsprogramm</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '185':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Animation für Kinder</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '195':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Tennis</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '196':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Badminton</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '198':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Anzahl der Pools</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '200':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">beheizbare Pools</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '201':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Gymnastik</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '204':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Darts</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        case '219':
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bräunungsstudio/Solarium</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.'</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

            case 'distances':
                echo '<div class="col-sm-3">
                        <h4>Entfernungen</h4>';

                foreach ($section->facts->fact as $fact) {
                    switch ($fact['id']) {
                        case '1001':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Stadtzentrum</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1002':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Touristenzentrum</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1003':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Strand</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1004':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Meer</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1005':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">See</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1006':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Fluss</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1007':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Wald</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1008':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Park</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1009':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Einkaufsmöglichkeiten</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1010':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Restaurants</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1011':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bars / Pubs</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1012':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Disco / Club</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1013':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Golfplatz</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1014':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Öff. Verkehrsmittel</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1015':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Busstation</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1016':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Bahnhof</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1017':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Skigebiet</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1018':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Skilift</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1019':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">Skilanglauf</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        case '1020':
                            //$ans = ($fact->value = 'true') ? 'Yes':'No';
                            echo '<div class="form-group">
                                    <label class="col-sm-9 control-label">U-/S-Bahnstation</label>
                                    <div class="col-sm-3">
                                        <span class="badge">'.$fact->value.' m</span>
                                    </div>
                                </div>';
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                echo '</div>';
                $count++;
                break;

        }

        if ($count == 4) {
            echo '</div>';
        } elseif ($count == 8) {
            echo '</div>';
        } elseif ($count == 12) {
            echo '</div>';
        }
    }
}

?>