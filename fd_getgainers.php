<?php
echo exec("phantomjs simple.js 2>&1",$output);
$html = join("", $output);
var_dump( $html );

?>