<?php

$url = 'https://www.google.com/finance?catid=58211593';

$html = file_get_contents( $url );

var_dump( $html );
?>