<?php

getMovers( 'active');
getMovers( 'gainer');
getMovers( 'loser');

function getMovers( $type ){
$url = 'https://www.msn.com/en-us/money/markets/marketmovers';

$html = file_get_contents( $url );

$pattern = '/var '. $type .'.*?\]\)\);/';

preg_match( $pattern, $html, $catch);

$json = str_replace(array('var '. $type .' = JSON.parse(JSON.stringify(', '));'), array('', ''), $catch[0]);
$json = json_decode( $json);

var_dump( $json );
}
?>