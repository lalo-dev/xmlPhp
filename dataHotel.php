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

function showCountry($code) {
    $result = '.........';
    $countrys =  array(
                    'AD' => 'Andorra',
                    'AE' => 'United Arab Emirates',
                    'AF' => 'Afghanistan',
                    'AG' => 'Antigua and Barbuda',
                    'AI' => 'Anguilla',
                    'AL' => 'Albania',
                    'AM' => 'Armenia',
                    'AN' => 'Netherlands Antilles',
                    'AO' => 'Angola',
                    'AQ' => 'Antarctica',
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
                    'BI' => 'Burundi',
                    'BJ' => 'Benin',
                    'BM' => 'Bermuda',
                    'BN' => 'Brunei Darrussalam',
                    'BO' => 'Bolivia',
                    'BR' => 'Brazil',
                    'BS' => 'Bahamas',
                    'BT' => 'Bhutan',
                    'BV' => 'Bouvet Island',
                    'BW' => 'Botswana',
                    'BY' => 'Belarus',
                    'BZ' => 'Belize',
                    'CA' => 'Canada',
                    'CC' => 'Cocos (keeling) Islands',
                    'CD' => 'Congo, Democratic PeopleÕs Republic',
                    'CF' => 'Central African Republic',
                    'CG' => 'Congo, Republic of',
                    'CH' => 'Switzerland',
                    'CI' => 'Cote dÕIvoire',
                    'CK' => 'Cook Islands',
                    'CL' => 'Chile',
                    'CM' => 'Cameroon',
                    'CN' => 'China',
                    'CO' => 'Colombia',
                    'CR' => 'Costa Rica',
                    'CS' => 'Serbia and Montenegro',
                    'CU' => 'Cuba',
                    'CV' => 'Cap Verde',
                    'CX' => 'Christmas Island',
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
                    'EH' => 'Western Sahara',
                    'ER' => 'Eritrea',
                    'ES' => 'Spain',
                    'ET' => 'Ethiopia',
                    'FI' => 'Finland',
                    'FJ' => 'Fiji',
                    'FK' => 'Falkland Islands (Malvina)',
                    'FM' => 'Micronesia, Federal State of',
                    'FO' => 'Faroe Islands',
                    'FR' => 'France',
                    'GA' => 'Gabon',
                    'GB' => 'United Kingdom (GB)',
                    'GD' => 'Grenada',
                    'GE' => 'Georgia',
                    'GF' => 'French Guiana',
                    'GG' => 'Guernsey',
                    'GH' => 'Ghana',
                    'GI' => 'Gibraltar',
                    'GL' => 'Greenland',
                    'GM' => 'Gambia',
                    'GN' => 'Guinea',
                    'GP' => 'Guadeloupe',
                    'GQ' => 'Equatorial Guinea',
                    'GR' => 'Greece',
                    'GS' => 'South Georgia',
                    'GT' => 'Guatemala',
                    'GU' => 'Guam',
                    'GW' => 'Guinea-Bissau',
                    'GY' => 'Guyana',
                    'HK' => 'Hong Kong',
                    'HM' => 'Heard and McDonald Islands',
                    'HN' => 'Honduras',
                    'HR' => 'Croatia/Hrvatska',
                    'HT' => 'Haiti',
                    'HU' => 'Hungary',
                    'ID' => 'Indonesia',
                    'IE' => 'Ireland',
                    'IL' => 'Israel',
                    'IM' => 'Isle of Man',
                    'IN' => 'India',
                    'IO' => 'British Indian Ocean Territory',
                    'IQ' => 'Iraq',
                    'IR' => 'Iran (Islamic Republic of)',
                    'IS' => 'Iceland',
                    'IT' => 'Italy',
                    'JE' => 'Jersey',
                    'JM' => 'Jamaica',
                    'JO' => 'Jordan',
                    'JP' => 'Japan',
                    'KE' => 'Kenya',
                    'KG' => 'Kyrgyzstan',
                    'KH' => 'Cambodia',
                    'KI' => 'Kiribati',
                    'KM' => 'Comoros',
                    'KN' => 'Saint Kitts and Nevis',
                    'KP' => 'Korea, Democratic PeopleÕs Republic',
                    'KR' => 'Korea, Republic of',
                    'KW' => 'Kuwait',
                    'KY' => 'Cayman Islands',
                    'KZ' => 'Kazakhstan',
                    'LA' => 'Lao PeopleÕs Democratic Republic',
                    'LB' => 'Lebanon',
                    'LC' => 'Saint Lucia',
                    'LI' => 'Liechtenstein',
                    'LK' => 'Sri Lanka',
                    'LR' => 'Liberia',
                    'LS' => 'Lesotho',
                    'LT' => 'Lithuania',
                    'LU' => 'Luxembourgh',
                    'LV' => 'Latvia',
                    'LY' => 'Libyan Arab Jamahiriya',
                    'MA' => 'Morocco',
                    'MC' => 'Monaco',
                    'MD' => 'Moldova, Republic of',
                    'MG' => 'Madagascar',
                    'MH' => 'Marshall Islands',
                    'MK' => 'Macedonia',
                    'ML' => 'Mali',
                    'MM' => 'Myanmar',
                    'MN' => 'Mongolia',
                    'MO' => 'Macau',
                    'MP' => 'Northern Mariana Islands',
                    'MQ' => 'Martinique',
                    'MR' => 'Mauritania',
                    'MS' => 'Montserrat',
                    'MT' => 'Malta',
                    'MU' => 'Mauritius',
                    'MV' => 'Maldives',
                    'MW' => 'Malawi',
                    'MX' => 'México',
                    'MY' => 'Malaysia',
                    'MZ' => 'Mozambique',
                    'NA' => 'Namibia',
                    'NC' => 'New Caledonia',
                    'NE' => 'Niger',
                    'NF' => 'Norfolk Island',
                    'NG' => 'Nigeria',
                    'NI' => 'Nicaragua',
                    'NL' => 'Netherlands',
                    'NO' => 'Norway',
                    'NP' => 'Nepal',
                    'NR' => 'Nauru',
                    'NU' => 'Niue',
                    'NZ' => 'New Zealand',
                    'OM' => 'Oman',
                    'PA' => 'Panama',
                    'PE' => 'Peru',
                    'PF' => 'French Polynesia',
                    'PG' => 'papua New Guinea',
                    'PH' => 'Phillipines',
                    'PK' => 'Pakistan',
                    'PL' => 'Poland',
                    'PM' => 'St. Pierre and Miquelon',
                    'PN' => 'Pitcairn Island',
                    'PR' => 'Puerto Rico',
                    'PS' => 'Palestinian Territories',
                    'PT' => 'Portugal',
                    'PW' => 'Palau',
                    'PY' => 'Paraguay',
                    'QA' => 'Qatar',
                    'RE' => 'Reunion Island',
                    'RO' => 'Romania',
                    'RU' => 'Russian Federation',
                    'RW' => 'Rwanda',
                    'SA' => 'Saudi Arabia',
                    'SB' => 'Solomon Islands',
                    'SC' => 'Seychelles',
                    'SD' => 'Sudan',
                    'SE' => 'Sweden',
                    'SG' => 'Singapore',
                    'SH' => 'St. Helena',
                    'SI' => 'Slovenia',
                    'SJ' => 'Svalbard and Jan Mayen Islands',
                    'SK' => 'Slovak Republic',
                    'SL' => 'Sierra Leone',
                    'SM' => 'San Marino',
                    'SN' => 'Senegal',
                    'SO' => 'Somalia',
                    'SR' => 'Suriname',
                    'ST' => 'Sao Tome and Principe',
                    'SV' => 'El Salvador',
                    'SY' => 'Syrian Arab Republic',
                    'SZ' => 'Swaziland',
                    'TC' => 'Turks and Caicos Islands',
                    'TD' => 'Chad',
                    'TF' => 'French Southern Territories',
                    'TG' => 'Togo',
                    'TH' => 'Thailand',
                    'TJ' => 'Tajikistan',
                    'TK' => 'Tokelau',
                    'TM' => 'Turkmenistan',
                    'TN' => 'Tunisia',
                    'TO' => 'Tonga',
                    'TP' => 'East Timor',
                    'TR' => 'Turkey',
                    'TT' => 'Trinidad and Tobago',
                    'TV' => 'Tuvalu',
                    'TW' => 'Taiwan',
                    'TZ' => 'Tanzania',
                    'UA' => 'Ukraine',
                    'UG' => 'Uganda',
                    'UM' => 'US Minor Outlying Islands',
                    'US' => 'United States',
                    'UY' => 'Uruguay',
                    'UZ' => 'Uzbekistan',
                    'VA' => 'Holy See (City Vatican State)',
                    'VC' => 'Saint Vincent and the Grenadines',
                    'VE' => 'Venezuela',
                    'VG' => 'Virgin Islands (British)',
                    'VI' => 'Virgin Islands (USA)',
                    'VN' => 'Vietnam',
                    'VU' => 'Vanuatu',
                    'WF' => 'Wallis and Futuna Islands',
                    'WS' => 'Western Samoa',
                    'YE' => 'Yemen',
                    'YT' => 'Mayotte',
                    'YU' => 'Yugoslavia',
                    'ZA' => 'South Africa',
                    'ZM' => 'Zambia',
                    'ZW' => 'Zimbabwe'
                );

    foreach ($countrys as $codeCountry => $country) {
        if ($code == $codeCountry) {
            $result = $country;
        }
    }

    return $result;
}

//$url = "http://ghgml.giatamedia.com/webservice/rest/1.0/items/".$_POST['hotel'];
$url = "http://de|travelgroup24.com:7ykKY5BR@ghgml.giatamedia.com/webservice/rest/1.0/items/".$_POST['hotel'];
//$hotel = 2415;
$hotel = $_POST['hotel'];
    
//obtener el xml usarndo curl y simplexml
$res = curl_get($url, array());
$object = simplexml_load_string($res);
$count = 0;
$data = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hoteles</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        function showText(hotel,selector) {
            $.post('text.php', { hotel:hotel }, function(data) {
                $('#'+selector+'>td').remove();
                $('#'+selector).append(data);
            });
        }

        function showFact(hotel,selector) {
            $.post('fact.php', { hotel:hotel }, function(data) {
                $('#'+selector+'>td').remove();
                $('#'+selector).append(data);
            });
        }

        $(document).ready(function() {
            showFact(<?php echo $hotel; ?>,'divFacts');
            showText(<?php echo $hotel; ?>,'divTexts');
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-2 text-center">
                        <br/><br/>
                        <!--
                        <a href="./" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
                        -->
                    </div>
                    <div class="col-sm-10">
                        <br/>
                        <h1 class="text-primary"><?php echo $object->item->name; ?><small> Hotel</small></h1>
                        <h2 class="text-primary"><?php echo $object->item->city; ?><small> City</small></h2>
                        <h3 class="text-primary"><?php echo showCountry($object->item->country); ?><small> Country</small></h3>
                    </div>
                </div>

                <div class="row">
                    <hr/>
                    <h3 class="text-primary">Facts</h3>

                    <div id="divFacts"></div>
                </div>

                <div class="row">
                    <h3 class="text-primary">Text</h3>

                    <div id="divTexts"></div>
                </div>
                
                <div class="row">
                    <h3 class="text-primary">Images</h3>
                    <div class="row">
                        
                    <?php 
                        if ($object->item->images) {
                            foreach ($object->item->images->image as $image) {
                                if ($image->sizes[0]->size[2]) {
                                    $img = $image->sizes[0]->size[2]->attributes('xlink', true);
                                    $img = explode('ghgml',$img);
                                    $img = $img[0]."de|travelgroup24.com:7ykKY5BR@ghgml".$img[1];
                                    echo '<div class="col-sm-12 text-center"><img src="'.$img.'" /><p></p></div>';
                                } elseif ($image->sizes[0]->size[1]) {
                                    $img = $image->sizes[0]->size[1]->attributes('xlink', true);
                                    $img = explode('ghgml',$img);
                                    $img = $img[0]."de|travelgroup24.com:7ykKY5BR@ghgml".$img[1];
                                    echo '<div class="col-sm-6 text-center"><img src="'.$img.'" /></div>';
                                } elseif ($image->sizes[0]->size[0]) {
                                    $img = $image->sizes[0]->size[0]->attributes('xlink', true);
                                    $img = explode('ghgml',$img);
                                    $img = $img[0]."de|travelgroup24.com:7ykKY5BR@ghgml".$img[1];
                                    echo '<div class="col-sm-2 text-center"><img src="'.$img.'" /></div>';
                                }
                            }
                        } else {
                            echo '<div class="col-sm-10 col-sm-offset-1 text-center"><img src="noimage.jpg" style="width:800px; height:600px;" /></div>';
                        }
                    ?>
                        
                    </div>
                    
                </div>

                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>

            </div>
        </div>
    </div>
    
</body> 
</html>