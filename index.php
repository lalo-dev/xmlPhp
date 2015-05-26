<?php 
  function showCountry($code) {
      $result = '';
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
                      'Mv' => 'Maldives',
                      'MW' => 'malawi',
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

?>
<!DOCTYPE html>
<html lang="es">
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
    <style type="text/css">
      .containerLoad {width: 960px; margin: 0 auto; overflow: hidden;}
      .contentLoad {width:800px; margin:0 auto; padding-top:50px;}

      /* Loading Circle */
      .ball {
        background-color: rgba(0,0,0,0);
        border:5px solid rgba(0,183,229,0.9);
        opacity:.9;
        border-top:5px solid rgba(0,0,0,0);
        border-left:5px solid rgba(0,0,0,0);
        border-radius:50px;
        box-shadow: 0 0 35px #2187e7;
        width:50px;
        height:50px;
        margin:0 auto;
        -moz-animation:spin .5s infinite linear;
        -webkit-animation:spin .5s infinite linear;
      }

      .ball1 {
        background-color: rgba(0,0,0,0);
        border:5px solid rgba(0,183,229,0.9);
        opacity:.9;
        border-top:5px solid rgba(0,0,0,0);
        border-left:5px solid rgba(0,0,0,0);
        border-radius:50px;
        box-shadow: 0 0 15px #2187e7; 
        width:30px;
        height:30px;
        margin:0 auto;
        position:relative;
        top:-50px;
        -moz-animation:spinoff .5s infinite linear;
        -webkit-animation:spinoff .5s infinite linear;
      }

      @-moz-keyframes spin {
        0% { -moz-transform:rotate(0deg); }
        100% { -moz-transform:rotate(360deg); }
      }
      @-moz-keyframes spinoff {
        0% { -moz-transform:rotate(0deg); }
        100% { -moz-transform:rotate(-360deg); }
      }
      @-webkit-keyframes spin {
        0% { -webkit-transform:rotate(0deg); }
        100% { -webkit-transform:rotate(360deg); }
      }
      @-webkit-keyframes spinoff {
        0% { -webkit-transform:rotate(0deg); }
        100% { -webkit-transform:rotate(-360deg); }
      }
    </style>
    
  </head>
  <body>

    <div class="container">

      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h1>Hotels</h1>
          <form class="form-horizontal">
            <div class="form-group">
              <label for="slcPais" class="col-sm-2 control-label">Country</label>
              <div class="col-sm-10">
                <select name="slcPais" id="slcPais" class="form-control">
                  <option value="0">Select</option>
                  <option value="DE">Germany</option>
                  <option value="US">United States</option>
                  <option>------------------</option>
                  <option value="AF">Afghanistan</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="AG">Antigua And Barbuda</option>
                  <option value="AR">Argentina</option>
                  <option value="AM">Armenia</option>
                  <option value="AW">Aruba</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="AZ">Azerbaijan</option>
                  <option value="BS">Bahamas</option>
                  <option value="BH">Bahrain</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BB">Barbados</option>
                  <option value="BY">Belarus</option>
                  <option value="BE">Belgium</option>
                  <option value="BZ">Belize</option>
                  <option value="BJ">Benin</option>
                  <option value="BM">Bermuda</option>
                  <option value="BT">Bhutan</option>
                  <option value="BO">Bolivia</option>
                  <option value="BA">Bosnia And Herzegovina</option>
                  <option value="BW">Botswana</option>
                  <option value="BV">Bouvet Island</option>
                  <option value="BR">Brazil</option>
                  <option value="IO">British Indian Ocean Territory</option>
                  <option value="BN">Brunei Darussalam</option>
                  <option value="BG">Bulgaria</option>
                  <option value="BF">Burkina Faso</option>
                  <option value="BI">Burundi</option>
                  <option value="KH">Cambodia</option>
                  <option value="CM">Cameroon</option>
                  <option value="CA">Canada</option>
                  <option value="CV">Cape Verde</option>
                  <option value="KY">Cayman Islands</option>
                  <option value="CF">Central African Republic</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (keeling) Islands</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros</option>
                  <option value="CG">Congo</option>
                  <option value="CD">Congo, The Democratic Republic Of The</option>
                  <option value="CK">Cook Islands</option>
                  <option value="CR">Costa Rica</option>
                  <option value="CI">C&#212;te D'ivoire</option>
                  <option value="HR">Croatia</option>
                  <option value="CU">Cuba</option>
                  <option value="CY">Cyprus</option>
                  <option value="CZ">Czech Republic</option>
                  <option value="DK">Denmark</option>
                  <option value="DJ">Djibouti</option>
                  <option value="DM">Dominica</option>
                  <option value="DO">Dominican Republic</option>
                  <option value="EC">Ecuador</option>
                  <option value="EG">Egypt</option>
                  <option value="SV">El Salvador</option>
                  <option value="GQ">Equatorial Guinea</option>
                  <option value="ER">Eritrea</option>
                  <option value="EE">Estonia</option>
                  <option value="ET">Ethiopia</option>
                  <option value="FK">Falkland Islands (malvinas)</option>
                  <option value="FO">Faroe Islands</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finland</option>
                  <option value="FR">France</option>
                  <option value="GF">French Guiana</option>
                  <option value="PF">French Polynesia</option>
                  <option value="TF">French Southern Territories</option>
                  <option value="GA">Gabon</option>
                  <option value="GM">Gambia</option>
                  <option value="GE">Georgia</option>
                  <option value="GH">Ghana</option>
                  <option value="GI">Gibraltar</option>
                  <option value="GR">Greece</option>
                  <option value="GL">Greenland</option>
                  <option value="GD">Grenada</option>
                  <option value="GP">Guadeloupe</option>
                  <option value="GU">Guam</option>
                  <option value="GT">Guatemala</option>
                  <option value="GG">Guernsey</option>
                  <option value="GN">Guinea</option>
                  <option value="GW">Guinea-bissau</option>
                  <option value="GY">Guyana</option>
                  <option value="HT">Haiti</option>
                  <option value="HM">Heard Island And Mcdonald Islands</option>
                  <option value="HN">Honduras</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IR">Iran, Islamic Republic Of</option>
                  <option value="IQ">Iraq</option>
                  <option value="IE">Ireland</option>
                  <option value="IM">Isle Of Man</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JM">Jamaica</option>
                  <option value="JP">Japan</option>
                  <option value="JE">Jersey</option>
                  <option value="JO">Jordan</option>
                  <option value="KZ">Kazakhstan</option>
                  <option value="KE">Kenya</option>
                  <option value="KI">Kiribati</option>
                  <option value="KP">Korea, Democratic People's Republic Of</option>
                  <option value="KR">Korea, Republic Of</option>
                  <option value="KW">Kuwait</option>
                  <option value="KG">Kyrgyzstan</option>
                  <option value="LA">Lao People's Democratic Republic</option>
                  <option value="LV">Latvia</option>
                  <option value="LB">Lebanon</option>
                  <option value="LS">Lesotho</option>
                  <option value="LR">Liberia</option>
                  <option value="LY">Libyan Arab Jamahiriya</option>
                  <option value="LI">Liechtenstein</option>
                  <option value="LT">Lithuania</option>
                  <option value="LU">Luxembourg</option>
                  <option value="MO">Macao</option>
                  <option value="MK">Macedonia, The Former Yugoslav Republic Of</option>
                  <option value="MG">Madagascar</option>
                  <option value="MW">Malawi</option>
                  <option value="MY">Malaysia</option>
                  <option value="MV">Maldives</option>
                  <option value="ML">Mali</option>
                  <option value="MT">Malta</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MQ">Martinique</option>
                  <option value="MR">Mauritania</option>
                  <option value="MU">Mauritius</option>
                  <option value="YT">Mayotte</option>
                  <option value="MX">Mexico</option>
                  <option value="FM">Micronesia, Federated States Of</option>
                  <option value="MD">Moldova</option>
                  <option value="MC">Monaco</option>
                  <option value="MN">Mongolia</option>
                  <option value="ME">Montenegro</option>
                  <option value="MS">Montserrat</option>
                  <option value="MA">Morocco</option>
                  <option value="MZ">Mozambique</option>
                  <option value="MM">Myanmar</option>
                  <option value="NA">Namibia</option>
                  <option value="NR">Nauru</option>
                  <option value="NP">Nepal</option>
                  <option value="NL">Netherlands</option>
                  <option value="AN">Netherlands Antilles</option>
                  <option value="NC">New Caledonia</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NI">Nicaragua</option>
                  <option value="NE">Niger</option>
                  <option value="NG">Nigeria</option>
                  <option value="NU">Niue</option>
                  <option value="NF">Norfolk Island</option>
                  <option value="MP">Northern Mariana Islands</option>
                  <option value="NO">Norway</option>
                  <option value="OM">Oman</option>
                  <option value="PK">Pakistan</option>
                  <option value="PW">Palau</option>
                  <option value="PS">Palestinian Territory, Occupied</option>
                  <option value="PA">Panama</option>
                  <option value="PG">Papua New Guinea</option>
                  <option value="PY">Paraguay</option>
                  <option value="PE">Peru</option>
                  <option value="PH">Philippines</option>
                  <option value="PN">Pitcairn</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="QA">Qatar</option>
                  <option value="RE">R&#233;union</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russian Federation</option>
                  <option value="RW">Rwanda</option>
                  <option value="BL">Saint Barth&#233;lemy</option>
                  <option value="SH">Saint Helena</option>
                  <option value="KN">Saint Kitts And Nevis</option>
                  <option value="LC">Saint Lucia</option>
                  <option value="MF">Saint Martin</option>
                  <option value="PM">Saint Pierre And Miquelon</option>
                  <option value="VC">Saint Vincent And The Grenadines</option>
                  <option value="WS">Samoa</option>
                  <option value="SM">San Marino</option>
                  <option value="ST">Sao Tome And Principe</option>
                  <option value="SA">Saudi Arabia</option>
                  <option value="SN">Senegal</option>
                  <option value="RS">Serbia</option>
                  <option value="SC">Seychelles</option>
                  <option value="SL">Sierra Leone</option>
                  <option value="SG">Singapore</option>
                  <option value="SK">Slovakia</option>
                  <option value="SI">Slovenia</option>
                  <option value="SB">Solomon Islands</option>
                  <option value="SO">Somalia</option>
                  <option value="ZA">South Africa</option>
                  <option value="GS">South Georgia And The South Sandwich Islands</option>
                  <option value="ES">Spain</option>
                  <option value="LK">Sri Lanka</option>
                  <option value="SD">Sudan</option>
                  <option value="SR">Suriname</option>
                  <option value="SJ">Svalbard And Jan Mayen</option>
                  <option value="SZ">Swaziland</option>
                  <option value="SE">Sweden</option>
                  <option value="CH">Switzerland</option>
                  <option value="SY">Syrian Arab Republic</option>
                  <option value="TW">Taiwan, Province Of China</option>
                  <option value="TJ">Tajikistan</option>
                  <option value="TZ">Tanzania, United Republic Of</option>
                  <option value="TH">Thailand</option>
                  <option value="TL">Timor-leste</option>
                  <option value="TG">Togo</option>
                  <option value="TK">Tokelau</option>
                  <option value="TO">Tonga</option>
                  <option value="TT">Trinidad And Tobago</option>
                  <option value="TN">Tunisia</option>
                  <option value="TR">Turkey</option>
                  <option value="TM">Turkmenistan</option>
                  <option value="TC">Turks And Caicos Islands</option>
                  <option value="TV">Tuvalu</option>
                  <option value="UG">Uganda</option>
                  <option value="UA">Ukraine</option>
                  <option value="AE">United Arab Emirates</option>
                  <option value="GB">United Kingdom</option>
                  <option value="UM">United States Minor Outlying Islands</option>
                  <option value="UY">Uruguay</option>
                  <option value="UZ">Uzbekistan</option>
                  <option value="VU">Vanuatu</option>
                  <option value="VA">Vatican City State</option>
                  <option value="VE">Venezuela</option>
                  <option value="VN">Viet Nam</option>
                  <option value="VG">Virgin Islands, British</option>
                  <option value="VI">Virgin Islands, U.s.</option>
                  <option value="WF">Wallis And Futuna</option>
                  <option value="EH">Western Sahara</option>
                  <option value="YE">Yemen</option>
                  <option value="ZM">Zambia</option>
                  <option value="ZW">Zimbabwe</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="slcPais" class="col-sm-2 control-label">City</label>
              <div class="col-sm-10">
                <select name="slcCity" id="slcCity" class="form-control">
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="slcPais" class="col-sm-2 control-label">Hotel</label>
              <div class="col-sm-10">
                <input type="text" id="txtHotel" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-primary" id="btnBuscar">Search</button>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <label for="" class="col-sm-2 control-label">Filter</label>
              </div>
            </div>

            
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Images</label>
              <div class="col-sm-4">
                <select name="slcImages" id="slcImages" class="form-control">
                  <option value="0">All</option>
                  <option value="YES">Yes</option>
                  <option value="NO">No</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Stars</label>
              <div class="col-sm-4">
                <select name="slcStars" id="slcStars" class="form-control">
                  <option value="0">All</option>
                  <option value="stars_0">0</option>
                  <option value="stars_1">1</option>
                  <option value="stars_15">1.5</option>
                  <option value="stars_2">2</option>
                  <option value="stars_25">2.5</option>
                  <option value="stars_3">3</option>
                  <option value="stars_35">3.5</option>
                  <option value="stars_4">4</option>
                  <option value="stars_45">4.5</option>
                  <option value="stars_5">5</option>
                </select>
              </div>
            </div>
            
          </form>
        </div>
      </div>

       <div class="row text-center" id="divLoad" style="display: none;">
        <div>
          <img src="img/spiffygif.gif">
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h3 id="countryName"></h3>
          <table class="table" id="hotelList">
            <thead>
              <tr>
                <td>City</td>
                <td>Images</td>
                <td>Stars</td>
                <td>Hotel</td>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>

      <form id="formHotel" action="dataHotel.php" method="POST" target="_blank">
        <input type="hidden" name="hotel" id="hotel">
      </form>

      <input type="hidden" id="statusyn" value="a">
      <input type="hidden" id="statuss" value="a">

    </div>
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        function viewHotel(id) {
            $('#hotel').val(id);
            $('#formHotel').submit();
        }

        $(document).ready(function(){
          $('#slcPais').change(function(){
            var country = $('#slcPais').val();

            $.post('datosCity.php',{ country:country },function(data){
                //alert('data');
                $('#slcCity > option').remove();
                $('#slcCity').append(data);
              });
          });

          $('#slcImages, #slcStars').change(function(){

            var cimage = $('#slcImages').val();
            var cstar = $('#slcStars').val();
            $('#hotelList > tbody > tr').hide();

            if (cimage == 0 && cstar == 0) {
              $('#hotelList > tbody > tr').show();
            } else if (cimage == 0) {
              $('.'+cstar).show();
            } else if (cstar == 0) {
              $('.'+cimage).show();
            } else {
              $('.'+cimage).addClass('onList').show();
              $('#hotelList > tbody > tr').filter('.onList').not('.'+cstar).hide();
            }
            
          });

          $('#btnBuscar').click(function(){

            if ($('#slcPais').val() != 0) {
              $('#divLoad').show();
              //alert('buscar');
              var country = $('#slcPais').val();
              var city = $('#slcCity').val();
              var hotel   = $('#txtHotel').val();
              //alert(hotel);
              $.post('datos.php',{ country:country, hotel:hotel, city:city },function(data){
                //alert('data');
                $('#hotelList > tbody >tr').remove();
                $('#hotelList > tbody').append(data);
                $('#countryName').text($('#slcPais :selected').text());
              });
              $('#divLoad').hide();
            } else {
              alert('Select Country');
            }

          });
        });
        
    </script>
  </body>
</html>