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

			 $change = str_replace(array('+','-','%'), array('','',''), $json[$i]->changePercent);
			 $temp->rawnumber = $change;

			 if ( $json[$i]->changeIndicator === 'increase'){
				 $temp->direction = 'Up';
			 }

			 			 if ( $json[$i]->changeIndicator === 'decrease'){
				 $temp->direction = 'Down';
			 }
             /*
	         $temp->direction =  $catch[3][$i];
	       

			if($this->datatype === 'pricedeltas')
			{
			     $temp->rawnumber =  $catch[4][$i];	
			}

			
			if($this->datatype === 'volumedeltas')
			{
			    $temp->rawnumber = str_replace(',', '', $catch[5][$i]);	
			}      	
			
		      */    
         
	        $gls[] = $temp;
        }
		
        var_dump( $gls);

//var_dump( $json );

}
?>