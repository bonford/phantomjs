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

$gls= array();
  for ($i=0; $i < count($json); $i++)     {
			 $temp = new mover();
	         $temp->symbol = $json[$i]->tkr;
	         $temp->name =  $json[$i]->name;
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
		
      //  var_dump( $gls);

//var_dump( $json );

}
?>