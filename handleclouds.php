<?php /**/ ?><?php



   



    //------------- retrieve variables ---------------------------   	      
    //callback function to wrap the JSON in
	isset($_GET['callback']) ? $callback = $_GET['callback'] : $callback = 'getMovers';

	//possible values for type are 'volumedelta' and 'pricedelta'
	// no default: return 0 if the client doesn't know what type of cloud he's getting
	isset($_GET['type']) ? $type = $_GET['type'] : exit($callback . '({"results":' . 0 . '});');

	//number of stocks in the cloud (default 10)
	isset($_GET['numstocks']) ? $numstocks = $_GET['numstocks'] : $numstocks = 20;

	//min and max font size of the cloud (default 100 and 200 respectively)
    isset($_GET['min']) ? $min = $_GET['min'] : $min = 100; 
	isset($_GET['max']) ? $max = $_GET['min'] : $max = 200;  
   
    //echo $callback . ' ' . $numstocks . ' ' . $min . ' ' . $max . "\n";
     //$type = 'pricedeltas';
     //$type = 'volumedeltas';
   // $numstocks = 20;

    //
    $mr = new dataRipper($numstocks, $type, $min, $max);
	

    if($mr->getMoverArray())
	{
	    $json = $mr->getMoverArray();
	    echo $callback . '({"results":' . $json . '});';   
		$mr->updateMoverDb($json);
	}	
	elseif($mr->getMoverArrayFromDb())
	{
	   echo $callback . '({"results":' . $mr->getMoverArrayFromDb() . '});';
	}
   
		
   

  

/** 
 * a class for the movers with a sort function on volume desc, delta desc, and symbol alphabetical
 */
	class mover { 
	    static function cmp_volumes($a, $b)
        {
			//sort by volume (ints)
            $al = intval($a->rawnumber, 10);
            $bl =  intval($b->rawnumber, 10);
            if ($al == $bl) {
                   return 0;
            }
            return ($al < $bl) ? +1 : -1;
        }

        //sort by price change (floats)
		static function cmp_deltas($a, $b)
        {
            $al = $a->rawnumber;
            $bl =  $b->rawnumber;
            if ($al == $bl) {
                   return 0;
            }
            return ($al < $bl) ? +1 : -1;
        }

        //sort by symbol
		static function cmp_symbols($a, $b)
        {
            $al = $a->symbol;
            $bl =  $b->symbol;
            if ($al == $bl) {
                   return 0;
            }
            return ($al > $bl) ? +1 : -1;
        }
	}


class dataRipper {
	

	//private $url_gainers = 'localhost/twitter/clouds/sample_gainers_data.html';
	//private $url_losers = 'localhost/twitter/clouds/sample_losers_data.html';
	//private $url_movers = 'localhost/twitter/clouds/movers.html';
	

    //$_GET variables
    private $desiredmax = 200;
	private $desiredmin = 100;
	private $numstocks = 20;
	private $datatype;

	//the regex pattern that grabs the yahoo data
	private $pattern = '/<div id="yfitp" class="yfitabsc"><table[^>]*>(.*?)<\/table>/s';
	

    public function __construct ()
    { 
        $num_args = func_num_args();
    
        //make sure there's a single argument 
        //and set status accordingly
        if ($num_args == 4)
        {
            $args = func_get_args();
			$this->numstocks = $args[0];
            $this->datatype = $args[1]; 
			$this->desiredmin = $args[2];
			$this->desiredmax = $args[3];
		}
	}

/**
 *  point of entry: the only public function necessary
 *  returns an array of mover objects that each have a
 *     symbol, name, rawnumber, and a normnumber
 */
	public function getMoverArray()
	{
		if($this->datatype === 'pricedeltas') $movers = $this->getPriceDeltas();
		if($this->datatype === 'volumedeltas') $movers = $this->getVolumeDeltas();

        //will return undefined if movers isn't created above
		return $movers;
	}

/**
 *  get the price delta data
 */
    private function getPriceDeltas()
    {

	   
        $gainers =$this->getMovers('gainer');

       
        $losers = $this->getMovers('loser');

	    if($gainers && $losers)
	    {
			//put the gainers and losers together 
		    $movers = array_merge($gainers, $losers);			
		    usort($movers, array("mover", "cmp_deltas"));
			$movers = array_slice($movers, 0, $this->numstocks);
			//$this->debug($movers);
			$this->compressOutliers($movers);
			//$this->debug($movers);
			$this->setNormalizedData($movers);	
			//$this->debug($movers);
			 usort($movers, array("mover", "cmp_symbols"));
			
		    $data = json_encode($movers);
	    }	    
		return $data ? $data : 0;	  
    }	
	
/**
 *  get the volume delta data
 */
    private function getVolumeDeltas()
    {
	  
	    
		
        $movers = $this->getMovers('active');
	    //var_dump($movers);
      	   
	    if($movers)
 	    {	
			//sort by volume change
			usort($movers, array("mover", "cmp_volumes"));			
			$movers = array_slice($movers, 0, $this->numstocks);
			//$this->debug($movers);
			$this->compressOutliers($movers);
			//$this->debug($movers);
			$this->setNormalizedData($movers);
			//$this->debug($movers);

			//make alphabetical
			 usort($movers, array("mover", "cmp_symbols"));
			//$this->debug($movers);
		    $data = json_encode($movers);
	    }	    
		return $data ? $data : 0;	  
    }	   
   
       
 
   

/**
 *  utility function that tests if the returned page has an html tag
 */
    private function testHtml($html)
	{ 
	    return preg_match('/<html>/', $html, $catch);
	}


/**
 *  the workhorse: rips the data from the page and sends back as array of objects
 */
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
		
        //var_dump( $gls);
		return $gls;



}


/**
 *  if the yahoo call fails this grabs the latest cloud of type $datatype from the db
 */
    public function getMoverArrayFromDb()
	{
		
		$this->datatype == 'pricedeltas' ? $mover_id = 1 : $mover_id = 2;
		$query = "select json from movers where mover_id = " . $mover_id;
		echo "getMoverArrayFromDb: " . $query . "\n";
         /*
		$result = mysql_query($query) or die ('Query failed: ' . mysql_error());

        while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
        {
			$json = $row['json'];
        }
		return $json;
		*/
	}


/**
 *  if the yahoo call is successful this stores the result in the db
 */
    public function updateMoverDb($json)
	{		
		$this->datatype == 'pricedeltas' ? $mover_id = 1 : $mover_id = 2;
		//$query = "update movers set json = '" . mysql_real_escape_string($json) . "' where mover_id = " . $mover_id;
		$query = "update movers set json = '" . $json . "' where mover_id = " . $mover_id;
		//echo "<br><br>";
		//echo "updateMoverDb query: " . $query . "\n";	    
		//$result = mysql_query($query) or die ('Query failed: ' . mysql_error());      
	}



/**
 *  adds a normalized number to each object in the array
 */
    private function setNormalizedData(&$movers)
    {
		$desiredrange = $this->desiredmax - $this->desiredmin;
		$max = $movers[0]->compressed;
		$min = $movers[count($movers)-1]->compressed;
		//echo $min . ' ' . $max . "\n\n";
		$currentrange = $max - $min;
		$normfactor = $desiredrange / $currentrange;
		$translationfactor = $min * $normfactor - $this->desiredmin;
		//get lowest number (the array is sorted high to low 
		
	//	mutiply each element by desiredrange/currentrange	
    //find stepfactor (currentminrange - desiredminrange	
    //subtract stepfactor from each element	

		for($i = 0; $i < count($movers); $i++)
		{
			$movers[$i]->normalized = ($movers[$i]->compressed * $normfactor) - $translationfactor;

		}
		
	}


/**
 *  makes sure an outlier is never more than twice the next lowest number
 */
		private function compressOutliers(&$movers){	 
		
		
	        for ($i = 0; ($i < count($movers) - 1); $i++)
	        { 
				if( $movers[$i+1]->rawnumber && (($movers[$i]->rawnumber / $movers[$i+1]->rawnumber) > 2))
				{
		
		            $movers[$i]->compressed = 1.5 * $movers[$i + 1]->rawnumber; 
	            }
		        else
		        {
				    //otherwise the smoothed volume is the same as the regular volume
		            $movers[$i]->compressed = $movers[$i]->rawnumber;
		        }
			//	line += $movers[$i].symbol + ' ' + $movers[$i].smoothed + ' ' + objs[$i].direction + "<br>";
	        }    
			 $movers[count($movers) - 1]->compressed = $movers[count($movers) - 1]->rawnumber;
			//document.getElementById("debug").innerHTML = line;
        }

/**
 *  prints out the movers array
 */
    private function debug(&$movers)
    {
		echo "\n****\n";
		foreach($movers as $value)
			echo $value->symbol . 'raw: ' . number_format($value->rawnumber, 2) .
			    ' compressed: ' . number_format($value->compressed, 2) . 
			    ' normalized: ' . number_format($value->normalized, 2) . "\n";
		echo "****\n";
	}



}


	


 



 
?>