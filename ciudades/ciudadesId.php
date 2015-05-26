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

$countrys =  array(
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

$micontador = 0;

foreach ($countrys as $key => $value) {
    // if ($micontador == 1) {
    //     exit();
    // }
    $citys = '';

    $url      = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/items/?country=".$key;
    
    //obtener el xml usarndo curl y simplexml
    $res      = curl_get($url, array());
    $object   = simplexml_load_string($res);
    $fileName = 'city'.$key.'.txt';
    
    $file     =fopen($fileName,"a") or die("Problemas");

    foreach ($object->items->item as $item) {
        //if ($item['giataId'] > 168409) {
            $link          = $item->attributes( 'xlink', true);
            //echo $link;
            $url           = explode("ghgml",$link['href']);
            $url           = $url[0]."de|travelgroup24.com:7ykKY5BR@ghgml".$url[1];
            
            $res2          = curl_get($url, array());
            $hotel         = simplexml_load_string($res2);
            
            //$textoAgregado =  $item['giataId'].'|'.utf8_decode($hotel->item->city);

            //echo $item['giataId'].'|'.$hotel->item->city;
            //echo '<br>';

            $citys[] = utf8_decode($hotel->item->city);
            //echo utf8_decode($hotel->item->city);
            //echo '<br>';

            //fputs($file,$textoAgregado);
            //fputs($file,"\n");
        //}    
    }

    $citys = array_unique($citys);
    asort($citys);

    //print_r($citys);

    foreach ($citys as $cityOk) {
      fputs($file,$cityOk);
      fputs($file,"\n");
      //echo $cityOk;
      //echo '<br>';
    }

    //fclose($file);

     //$micontador++;
}

?>