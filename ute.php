<?php

/** 
 * a class for the movers with a sort function on volume desc, delta desc, and symbol alphabetical
 */
	class mover {}

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

//var_dump($json[1]);

$gls= array();
  for ($i=0; $i < count($json); $i++)     {
			 $temp = new mover();
	         $temp->symbol = $json[$i]->tkr;
	         $temp->name =  $json[$i]->name;

			

			 if ( $json[$i]->changeIndicator === 'increase'){
				 $temp->direction = 'Up';
			 }

			 			 if ( $json[$i]->changeIndicator === 'decrease'){
				 $temp->direction = 'Down';
			 }

			 if ($type === 'active'){
				  if (strpos($json[$i]->volume, 'M') !== false) {
                               $volume = str_replace('M', 'm', $json[$i]->volume) * 1000000;
                  }

				   if (strpos($json[$i]->volume, 'B') !== false) {
                               $volume = str_replace('M', 'm', $json[$i]->volume) * 1000000000;
                  }
				  $temp->rawnumber = $volume;
			 } else {
				  $change = str_replace(array('+','-','%'), array('','',''), $json[$i]->changePercent);
			      $temp->rawnumber = $change;
			 }

			            
         
	        $gls[] = $temp;
        }
		
        var_dump( $gls);

//var_dump( $json );

}
?>