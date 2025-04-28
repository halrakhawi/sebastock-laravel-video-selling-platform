<?php 
return [ 
    'client_id' => 'AWERPUE0U4_7BrRTl5HlySna4B1m3wwZc_9eZO_pX6VEVYEiPM2JKDYCzwcSMwQCaMba9iOMIircAVGi',
	'secret' => 'EMZMbaUHE-UM9dIVEad79gwKH1aHiadRYgst2BCimkA4CeDppHmqkVVfK5zzPw6iKlWyfuME15YLIEYx',
    'settings' => array(
        'mode' => 'live',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];