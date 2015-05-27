<?php
/**
 * Send a GET requst using cURL
 * @param string $url to request
 * @param array $get values to send
 * @param array $options for cURL
 * @return string
 */

ini_set('max_execution_time', 6000); //300 seconds = 5 minutes

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

$countrys =  array(
              'AD' => 'Andorra',
              'AE' => 'United Arab Emirates',
              'AF' => 'Afghanistan',
              'AG' => 'Antigua and Barbuda',
              'AI' => 'Anguilla',
              'AL' => 'Albania',
              'AM' => 'Armenia',
              'AR' => 'Argentina',
              'AS' => 'American Samoa',
              'AT' => 'Austria',
              'AU' => 'Australia',
              'AW' => 'Aruba',
              'AZ' => 'Azerbaijan',
              'BA' => 'Bosnia and Herzegovina',
              'BB' => 'Barbados',
              'BD' => 'Bangladesh',
              'BE' => 'Belgium',
              'BF' => 'Burkina Faso',
              'BG' => 'Bulgaria',
              'BH' => 'Bahrain',
              'BJ' => 'Benin',
              'BM' => 'Bermuda',
              'BN' => 'Brunei Darrussalam',
              'BO' => 'Bolivia',
              'BR' => 'Brazil',
              'BS' => 'Bahamas',
              'BT' => 'Bhutan',
              'BW' => 'Botswana',
              'BY' => 'Belarus',
              'BZ' => 'Belize',
              'CA' => 'Canada',
              'CD' => 'Congo, Democratic PeopleÕs Republic',
              'CG' => 'Congo, Republic of',
              'CH' => 'Switzerland',
              'CI' => 'Cote dÕIvoire',
              'CK' => 'Cook Islands',
              'CL' => 'Chile',
              'CM' => 'Cameroon',
              'CN' => 'China',
              'CO' => 'Colombia',
              'CR' => 'Costa Rica',
              'CU' => 'Cuba',
              'CV' => 'Cap Verde',
              'CY' => 'Cyprus Island',
              'CZ' => 'Czech Republic',
              'DE' => 'Germany',
              'DJ' => 'Djibouti',
              'DK' => 'Denmark',
              'DM' => 'Dominica',
              'DO' => 'Dominican Republic',
              'DZ' => 'Algeria',
              'EC' => 'Ecuador',
              'EE' => 'Estonia',
              'EG' => 'Egypt',
              'ES' => 'Spain',
              'ET' => 'Ethiopia',
              'FI' => 'Finland',
              'FJ' => 'Fiji',
              'FM' => 'Micronesia, Federal State of',
              'FR' => 'France',
              'GA' => 'Gabon',
              'GB' => 'United Kingdom (GB)',
              'GD' => 'Grenada',
              'GE' => 'Georgia',
              'GF' => 'French Guiana',
              'GH' => 'Ghana',
              'GI' => 'Gibraltar',
              'GL' => 'Greenland',
              'GM' => 'Gambia',
              'GP' => 'Guadeloupe',
              'GR' => 'Greece',
              'GT' => 'Guatemala',
              'GU' => 'Guam',
              'HK' => 'Hong Kong',
              'HN' => 'Honduras',
              'HR' => 'Croatia/Hrvatska',
              'HT' => 'Haiti',
              'HU' => 'Hungary',
              'ID' => 'Indonesia',
              'IE' => 'Ireland',
              'IL' => 'Israel',
              'IN' => 'India',
              'IQ' => 'Iraq',
              'IS' => 'Iceland',
              'IT' => 'Italy',
              'JM' => 'Jamaica',
              'JO' => 'Jordan',
              'JP' => 'Japan',
              'KE' => 'Kenya',
              'KG' => 'Kyrgyzstan',
              'KH' => 'Cambodia',
              'KM' => 'Comoros',
              'KN' => 'Saint Kitts and Nevis',
              'KR' => 'Korea, Republic of',
              'KW' => 'Kuwait',
              'KY' => 'Cayman Islands',
              'KZ' => 'Kazakhstan',
              'LA' => 'Lao PeopleÕs Democratic Republic',
              'LB' => 'Lebanon',
              'LC' => 'Saint Lucia',
              'LI' => 'Liechtenstein',
              'LK' => 'Sri Lanka',
              'LS' => 'Lesotho',
              'LT' => 'Lithuania',
              'LU' => 'Luxembourgh',
              'LV' => 'Latvia',
              'LY' => 'Libyan Arab Jamahiriya',
              'MA' => 'Morocco',
              'MC' => 'Monaco',
              'MD' => 'Moldova, Republic of',
              'MG' => 'Madagascar',
              'MK' => 'Macedonia',
              'ML' => 'Mali',
              'MM' => 'Myanmar',
              'MN' => 'Mongolia',
              'MP' => 'Northern Mariana Islands',
              'MQ' => 'Martinique',
              'MT' => 'Malta',
              'MU' => 'Mauritius',
              'MV' => 'Maldives',
              'MW' => 'Malawi',
              'MX' => 'México',
              'MY' => 'Malaysia',
              'MZ' => 'Mozambique',
              'NA' => 'Namibia',
              'NC' => 'New Caledonia',
              'NG' => 'Nigeria',
              'NI' => 'Nicaragua',
              'NL' => 'Netherlands',
              'NO' => 'Norway',
              'NP' => 'Nepal',
              'NZ' => 'New Zealand',
              'OM' => 'Oman',
              'PA' => 'Panama',
              'PE' => 'Peru',
              'PF' => 'French Polynesia',
              'PG' => 'papua New Guinea',
              'PH' => 'Phillipines',
              'PK' => 'Pakistan',
              'PL' => 'Poland',
              'PR' => 'Puerto Rico',
              'PT' => 'Portugal',
              'PW' => 'Palau',
              'PY' => 'Paraguay',
              'QA' => 'Qatar',
              'RE' => 'Reunion Island',
              'RO' => 'Romania',
              'RU' => 'Russian Federation',
              'RW' => 'Rwanda',
              'SA' => 'Saudi Arabia',
              'SC' => 'Seychelles',
              'SE' => 'Sweden',
              'SG' => 'Singapore',
              'SI' => 'Slovenia',
              'SK' => 'Slovak Republic',
              'SM' => 'San Marino',
              'SN' => 'Senegal',
              'SR' => 'Suriname',
              'ST' => 'Sao Tome and Principe',
              'SV' => 'El Salvador',
              'SY' => 'Syrian Arab Republic',
              'SZ' => 'Swaziland',
              'TC' => 'Turks and Caicos Islands',
              'TD' => 'Chad',
              'TH' => 'Thailand',
              'TM' => 'Turkmenistan',
              'TN' => 'Tunisia',
              'TO' => 'Tonga',
              'TR' => 'Turkey',
              'TT' => 'Trinidad and Tobago',
              'TW' => 'Taiwan',
              'TZ' => 'Tanzania',
              'UA' => 'Ukraine',
              'UG' => 'Uganda',
              'US' => 'United States',
              'UY' => 'Uruguay',
              'UZ' => 'Uzbekistan',
              'VC' => 'Saint Vincent and the Grenadines',
              'VE' => 'Venezuela',
              'VG' => 'Virgin Islands (British)',
              'VI' => 'Virgin Islands (USA)',
              'VN' => 'Vietnam',
              'VU' => 'Vanuatu',
              'WS' => 'Western Samoa',
              'ZA' => 'South Africa',
              'ZM' => 'Zambia',
              'ZW' => 'Zimbabwe'
          );



// Establecer el tipo de contenido
//header('Content-type: application/xml');
$cvePais = $_GET["cvePais"];
$url = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/items/?country=".$cvePais;
// $url = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/items/?country=AE";

    
//obtener el xml usarndo curl y simplexml
$res = curl_get($url, array());
$object = simplexml_load_string($res);


$strTxt = "";
$saltoLinea="\r\n";

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

        $strTxt .= $item['giataId'].'|'.utf8_decode($hotel->item->name).'|'.utf8_decode($hotel->item->city).'|'.$classImage.'|'.$classCategory;
        $strTxt .= $saltoLinea;
        //$strTxt .= "\n";
    //}    
}

//function generaArchivo()
//{
  global $strTxt;
  global $cvePais;
  $nombreArchivo = "countryData/country".$cvePais.".txt";
  $miArchivo = fopen($nombreArchivo, "w");
  fwrite($miArchivo, $strTxt);
  fclose($miArchivo);
//}

?>