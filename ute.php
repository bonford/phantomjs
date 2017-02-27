<?php

// Function to submit form using cURL POST method
function curlPost($postUrl, $postFields) {
     
    $useragent = 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3'; // Setting useragent of a popular browser
     
    $cookie = 'cookie.txt'; // Setting a cookie file to store cookie
     
    $ch = curl_init();  // Initialising cURL session
 
    // Setting cURL options
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // Prevent cURL from verifying SSL certificate
    curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);    // Script should fail silently on error
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);  // Use cookies
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // Follow Location: headers
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Returning transfer as a string
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);  // Setting cookiefile
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);   // Setting cookiejar
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);    // Setting useragent
    curl_setopt($ch, CURLOPT_URL, $postUrl);    // Setting URL to POST to
             
    curl_setopt($ch, CURLOPT_POST, TRUE);   // Setting method as POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);  // Setting POST fields as array
             
    $results = curl_exec($ch);  // Executing cURL session
    curl_close($ch);    // Closing cURL session
     
    return $results;
}

/*
 
$url = 'https://mystore.ncrsilver.com/app/Account/LogOn';   // Login POST URL
 
// Array built from login credentials
$credentials = array(
    'username' => $userEmail,       // Your email address
    'password' => $userPass,        // Your password
    'RememberMe' => 'true',         // Staying logged in
    'IsAjaxRequest' => 'false'      // Whether request is AJAX
);
 
 
 
// Performing the login!
$request = curlPost($url, $credentials);
  
$login = json_decode($request); // Decoding the JSON response
  
if ($login->success == 1) {
    // Successful login
    $message = 'Successful login.'; // Assigning successful login message
    print_r($request);
    echo $message . "\n";
} elseif ($login->success == 0) {
    $message = $login->error;    // Assigning login error message returned by server
    echo $message . "\n";
    print_r($request);
    exit(); // Ending program
} else {
    $message = 'Unknown login error.';  // Assigning unknown login error message
    echo $message . "\n";
    print_r($request);
    exit(); // Ending program
}
*/


$string = "q=select%20*%20from%20x%20where%20a%20%3D%20'%7B%22bp%22%3A%7B%22_pl%22%3A%221%22%2C%22A_v%22%3A%223.42.1%22%2C%22_R%22%3A%22https%3A%2F%2Fwww.google.ca%2F%22%2C%22test%22%3A%22topcomment-test3%2Cfincanvassbackrt%2Cfinvideo014%2Cfindd-test02%2Cfin-strm-bias-test3%22%2C%22_bt%22%3A%22rapid%22%2C%22A_pr%22%3A%22http%22%2C%22A_tzoff%22%3A%22-5%22%7D%2C%22r%22%3A%5B%7B%22t%22%3A%22lv%22%2C%22s%22%3A%221183331958%22%2C%22pp%22%3A%7B%22A_sid%22%3A%22WN1dUD9OyXXHmgXU%22%2C%22_w%22%3A%22finance.yahoo.com%2Fstock-center%2F%3Fbypass%3Dtrue%22%2C%22x%22%3A%22125%22%2C%22ssl%22%3A%220%22%2C%22juris%22%3A%22US%22%2C%22lang%22%3A%22en-US%22%2C%22lpstaid%22%3A%22%22%2C%22mrkt%22%3A%22US%22%2C%22pcp%22%3A%22%22%2C%22pct%22%3A%22%22%2C%22pd%22%3A%22utility_3_columns%22%2C%22psp%22%3A%22%22%2C%22pst%22%3A%22%22%2C%22pstaid%22%3A%22c554f39a-7dac-3899-a3ac-062b15810d16%22%2C%22pstcat%22%3A%22stock-center%22%2C%22pt%22%3A%225%22%2C%22pub%22%3A%22%22%2C%22site%22%3A%22finance%22%2C%22test%22%3A%22topcomment-test3%2Cfincanvassbackrt%2Cfinvideo014%2Cfindd-test02%2Cfin-strm-bias-test3%22%2C%22ver%22%3A%22grandslam%22%2C%22authfb%22%3A0%2C%22rid%22%3A%2228ob5blcb4qr7%22%2C%22A_am%22%3A%221%22%2C%22A_sr%22%3A%221920x1080%22%2C%22A_vr%22%3A%221920x1040%22%2C%22A_do%22%3A%221%22%7D%2C%22_ts%22%3A%221488087928%22%2C%22_ms%22%3A%22552%22%2C%22lv%22%3A%5B%7B%22m%22%3A%22mod_d44ce99d_1e63_30e9_8062_bfd5ceb9cf1d%22%2C%22l%22%3A%5B%7B%22_p%22%3A1%2C%22slk%22%3A%22S%26P%22%7D%2C%7B%22_p%22%3A2%2C%22slk%22%3A%22Dow%20Jones%22%7D%2C%7B%22_p%22%3A3%2C%22slk%22%3A%22Nasdaq%22%7D%2C%7B%22_p%22%3A4%2C%22slk%22%3A%22NYSE%22%7D%2C%7B%22_p%22%3A5%2C%22slk%22%3A%22Other%20US%20Indices%22%7D%2C%7B%22_p%22%3A6%2C%22slk%22%3A%22Stock%20Futures%22%7D%2C%7B%22_p%22%3A7%2C%22slk%22%3A%22S%26P%20100%20Index%22%7D%2C%7B%22_p%22%3A8%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A9%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A10%2C%22slk%22%3A%22S%26P%20400%20Midcap%20Index%22%7D%2C%7B%22_p%22%3A11%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A12%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A13%2C%22slk%22%3A%22S%26P%20500%22%7D%2C%7B%22_p%22%3A14%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A15%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A16%2C%22slk%22%3A%22S%26P%20600%22%7D%2C%7B%22_p%22%3A17%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A18%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A19%2C%22slk%22%3A%22S%26P%20Composite%201500%20Index%22%7D%2C%7B%22_p%22%3A20%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A21%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A22%2C%22slk%22%3A%22VOLATILITY%20S%26P%20500%22%7D%2C%7B%22_p%22%3A23%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A24%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A25%2C%22slk%22%3A%22%23name%23%22%7D%5D%2C%22ylk%22%3A%7B%7D%7D%2C%7B%22m%22%3A%22mediafinancegstablemultiple%22%2C%22l%22%3A%5B%7B%22_p%22%3A1%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A2%2C%22slk%22%3A%22S%26P%22%7D%2C%7B%22_p%22%3A3%2C%22slk%22%3A%22Dow%20Jones%22%7D%2C%7B%22_p%22%3A4%2C%22slk%22%3A%22Nasdaq%22%7D%2C%7B%22_p%22%3A5%2C%22slk%22%3A%22NYSE%22%7D%2C%7B%22_p%22%3A6%2C%22slk%22%3A%22Other%20US%20Indices%22%7D%2C%7B%22_p%22%3A7%2C%22slk%22%3A%22Stock%20Futures%22%7D%2C%7B%22_p%22%3A8%2C%22slk%22%3A%22S%26P%20100%20Index%22%7D%2C%7B%22_p%22%3A9%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A10%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A11%2C%22slk%22%3A%22S%26P%20400%20Midcap%20Index%22%7D%2C%7B%22_p%22%3A12%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A13%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A14%2C%22slk%22%3A%22S%26P%20500%22%7D%2C%7B%22_p%22%3A15%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A16%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A17%2C%22slk%22%3A%22S%26P%20600%22%7D%2C%7B%22_p%22%3A18%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A19%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A20%2C%22slk%22%3A%22S%26P%20Composite%201500%20Index%22%7D%2C%7B%22_p%22%3A21%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A22%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A23%2C%22slk%22%3A%22VOLATILITY%20S%26P%20500%22%7D%2C%7B%22_p%22%3A24%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A25%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A26%2C%22slk%22%3A%22%23name%23%22%7D%5D%2C%22ylk%22%3A%7B%7D%7D%2C%7B%22m%22%3A%22mod_85ac7b2b_640f_323f_a1c1_00b2f4865d18%22%2C%22l%22%3A%5B%7B%22_p%22%3A1%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A2%2C%22slk%22%3A%22Most%20Actives%22%7D%2C%7B%22_p%22%3A3%2C%22slk%22%3A%22%25%20Gainers%22%7D%2C%7B%22_p%22%3A4%2C%22slk%22%3A%22%25%20Losers%22%7D%2C%7B%22_p%22%3A5%2C%22slk%22%3A%22BAC%22%7D%2C%7B%22_p%22%3A6%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A7%2C%22slk%22%3A%22Bank%20of%20America%20Corporation%22%7D%2C%7B%22_p%22%3A8%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A9%2C%22slk%22%3A%22SE%22%7D%2C%7B%22_p%22%3A10%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A11%2C%22slk%22%3A%22Spectra%20Energy%20Corp%22%7D%2C%7B%22_p%22%3A12%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A13%2C%22slk%22%3A%22JCP%22%7D%2C%7B%22_p%22%3A14%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A15%2C%22slk%22%3A%22J.%20C.%20Penney%20Company%2C%20Inc.%22%7D%2C%7B%22_p%22%3A16%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A17%2C%22slk%22%3A%22CHK%22%7D%2C%7B%22_p%22%3A18%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A19%2C%22slk%22%3A%22Chesapeake%20Energy%20Corporation%22%7D%2C%7B%22_p%22%3A20%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A21%2C%22slk%22%3A%22HPE%22%7D%2C%7B%22_p%22%3A22%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A23%2C%22slk%22%3A%22Hewlett%20Packard%20Enterprise%20Company%22%7D%2C%7B%22_p%22%3A24%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A25%2C%22slk%22%3A%22AMD%22%7D%2C%7B%22_p%22%3A26%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A27%2C%22slk%22%3A%22Advanced%20Micro%20Devices%2C%20Inc.%22%7D%2C%7B%22_p%22%3A28%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A29%2C%22slk%22%3A%22F%22%7D%2C%7B%22_p%22%3A30%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A31%2C%22slk%22%3A%22Ford%20Motor%20Company%22%7D%2C%7B%22_p%22%3A32%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A33%2C%22slk%22%3A%22SWN%22%7D%2C%7B%22_p%22%3A34%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A35%2C%22slk%22%3A%22Southwestern%20Energy%20Company%22%7D%2C%7B%22_p%22%3A36%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A37%2C%22slk%22%3A%22VALE%22%7D%2C%7B%22_p%22%3A38%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A39%2C%22slk%22%3A%22Vale%20S.A.%22%7D%2C%7B%22_p%22%3A40%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A41%2C%22slk%22%3A%22ENB%22%7D%2C%7B%22_p%22%3A42%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A43%2C%22slk%22%3A%22Enbridge%20Inc.%22%7D%2C%7B%22_p%22%3A44%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A45%2C%22slk%22%3A%22Load%2010%20more%22%7D%2C%7B%22_p%22%3A46%2C%22slk%22%3A%22CEMP%22%7D%2C%7B%22_p%22%3A47%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A48%2C%22slk%22%3A%22Cempra%2C%20Inc.%22%7D%2C%7B%22_p%22%3A49%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A50%2C%22slk%22%3A%22RH%22%7D%2C%7B%22_p%22%3A51%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A52%2C%22slk%22%3A%22RH%22%7D%2C%7B%22_p%22%3A53%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A54%2C%22slk%22%3A%22AAOI%22%7D%2C%7B%22_p%22%3A55%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A56%2C%22slk%22%3A%22Applied%20Optoelectronics%2C%20Inc.%22%7D%2C%7B%22_p%22%3A57%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A58%2C%22slk%22%3A%22BBW%22%7D%2C%7B%22_p%22%3A59%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A60%2C%22slk%22%3A%22Build-A-Bear%20Workshop%2C%20Inc.%22%7D%2C%7B%22_p%22%3A61%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A62%2C%22slk%22%3A%22OLED%22%7D%2C%7B%22_p%22%3A63%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A64%2C%22slk%22%3A%22Universal%20Display%20Corporation%22%7D%2C%7B%22_p%22%3A65%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A66%2C%22slk%22%3A%22ZSAN%22%7D%2C%7B%22_p%22%3A67%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A68%2C%22slk%22%3A%22Zosano%20Pharma%20Corporation%22%7D%2C%7B%22_p%22%3A69%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A70%2C%22slk%22%3A%22IPCI%22%7D%2C%7B%22_p%22%3A71%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A72%2C%22slk%22%3A%22IntelliPharmaCeutics%20International%20Inc.%22%7D%2C%7B%22_p%22%3A73%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A74%2C%22slk%22%3A%22FIX%22%7D%2C%7B%22_p%22%3A75%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A76%2C%22slk%22%3A%22Comfort%20Systems%20USA%2C%20Inc.%22%7D%2C%7B%22_p%22%3A77%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A78%2C%22slk%22%3A%22CLSD%22%7D%2C%7B%22_p%22%3A79%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A80%2C%22slk%22%3A%22Clearside%20BioMedical%2C%20Inc.%22%7D%2C%7B%22_p%22%3A81%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A82%2C%22slk%22%3A%22BLPH%22%7D%2C%7B%22_p%22%3A83%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A84%2C%22slk%22%3A%22Bellerophon%20Therapeutics%2C%20Inc.%22%7D%2C%7B%22_p%22%3A85%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A86%2C%22slk%22%3A%22Load%2010%20more%22%7D%2C%7B%22_p%22%3A87%2C%22slk%22%3A%22NAO%22%7D%2C%7B%22_p%22%3A88%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A89%2C%22slk%22%3A%22Nordic%20American%20Offshore%20Ltd.%22%7D%2C%7B%22_p%22%3A90%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A91%2C%22slk%22%3A%22GRAM%22%7D%2C%7B%22_p%22%3A92%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A93%2C%22slk%22%3A%22Gra%C3%B1a%20y%20Montero%20S.A.A.%22%7D%2C%7B%22_p%22%3A94%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A95%2C%22slk%22%3A%22FNCX%22%7D%2C%7B%22_p%22%3A96%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A97%2C%22slk%22%3A%22Function(x)%20Inc.%22%7D%2C%7B%22_p%22%3A98%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A99%2C%22slk%22%3A%22CLIRW%22%7D%2C%7B%22_p%22%3A100%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A101%2C%22slk%22%3A%22ClearSign%20Combustion%20Corporatio%22%7D%2C%7B%22_p%22%3A102%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A103%2C%22slk%22%3A%22ARL%22%7D%2C%7B%22_p%22%3A104%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A105%2C%22slk%22%3A%22American%20Realty%20Investors%2C%20Inc.%22%7D%2C%7B%22_p%22%3A106%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A107%2C%22slk%22%3A%22HCLP%22%7D%2C%7B%22_p%22%3A108%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A109%2C%22slk%22%3A%22Hi-Crush%20Partners%20LP%22%7D%2C%7B%22_p%22%3A110%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A111%2C%22slk%22%3A%22MYSZ%22%7D%2C%7B%22_p%22%3A112%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A113%2C%22slk%22%3A%22My%20Size%2C%20Inc.%22%7D%2C%7B%22_p%22%3A114%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A115%2C%22slk%22%3A%22ACIA%22%7D%2C%7B%22_p%22%3A116%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A117%2C%22slk%22%3A%22Acacia%20Communications%2C%20Inc.%22%7D%2C%7B%22_p%22%3A118%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A119%2C%22slk%22%3A%22AZRE%22%7D%2C%7B%22_p%22%3A120%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A121%2C%22slk%22%3A%22Azure%20Power%20Global%20Limited%22%7D%2C%7B%22_p%22%3A122%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A123%2C%22slk%22%3A%22BPT%22%7D%2C%7B%22_p%22%3A124%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A125%2C%22slk%22%3A%22BP%20Prudhoe%20Bay%20Royalty%20Trust%22%7D%2C%7B%22_p%22%3A126%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A127%2C%22slk%22%3A%22Load%2010%20more%22%7D%2C%7B%22_p%22%3A128%2C%22slk%22%3A%22%23name%23%22%7D%5D%2C%22ylk%22%3A%7B%7D%7D%2C%7B%22m%22%3A%22mediafinancegstablemultiple_2%22%2C%22l%22%3A%5B%7B%22_p%22%3A1%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A2%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A3%2C%22slk%22%3A%22Most%20Actives%22%7D%2C%7B%22_p%22%3A4%2C%22slk%22%3A%22%25%20Gainers%22%7D%2C%7B%22_p%22%3A5%2C%22slk%22%3A%22%25%20Losers%22%7D%2C%7B%22_p%22%3A6%2C%22slk%22%3A%22BAC%22%7D%2C%7B%22_p%22%3A7%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A8%2C%22slk%22%3A%22Bank%20of%20America%20Corporation%22%7D%2C%7B%22_p%22%3A9%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A10%2C%22slk%22%3A%22SE%22%7D%2C%7B%22_p%22%3A11%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A12%2C%22slk%22%3A%22Spectra%20Energy%20Corp%22%7D%2C%7B%22_p%22%3A13%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A14%2C%22slk%22%3A%22JCP%22%7D%2C%7B%22_p%22%3A15%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A16%2C%22slk%22%3A%22J.%20C.%20Penney%20Company%2C%20Inc.%22%7D%2C%7B%22_p%22%3A17%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A18%2C%22slk%22%3A%22CHK%22%7D%2C%7B%22_p%22%3A19%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A20%2C%22slk%22%3A%22Chesapeake%20Energy%20Corporation%22%7D%2C%7B%22_p%22%3A21%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A22%2C%22slk%22%3A%22HPE%22%7D%2C%7B%22_p%22%3A23%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A24%2C%22slk%22%3A%22Hewlett%20Packard%20Enterprise%20Company%22%7D%2C%7B%22_p%22%3A25%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A26%2C%22slk%22%3A%22AMD%22%7D%2C%7B%22_p%22%3A27%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A28%2C%22slk%22%3A%22Advanced%20Micro%20Devices%2C%20Inc.%22%7D%2C%7B%22_p%22%3A29%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A30%2C%22slk%22%3A%22F%22%7D%2C%7B%22_p%22%3A31%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A32%2C%22slk%22%3A%22Ford%20Motor%20Company%22%7D%2C%7B%22_p%22%3A33%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A34%2C%22slk%22%3A%22SWN%22%7D%2C%7B%22_p%22%3A35%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A36%2C%22slk%22%3A%22Southwestern%20Energy%20Company%22%7D%2C%7B%22_p%22%3A37%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A38%2C%22slk%22%3A%22VALE%22%7D%2C%7B%22_p%22%3A39%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A40%2C%22slk%22%3A%22Vale%20S.A.%22%7D%2C%7B%22_p%22%3A41%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A42%2C%22slk%22%3A%22ENB%22%7D%2C%7B%22_p%22%3A43%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A44%2C%22slk%22%3A%22Enbridge%20Inc.%22%7D%2C%7B%22_p%22%3A45%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A46%2C%22slk%22%3A%22Load%2010%20more%22%7D%2C%7B%22_p%22%3A47%2C%22slk%22%3A%22CEMP%22%7D%2C%7B%22_p%22%3A48%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A49%2C%22slk%22%3A%22Cempra%2C%20Inc.%22%7D%2C%7B%22_p%22%3A50%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A51%2C%22slk%22%3A%22RH%22%7D%2C%7B%22_p%22%3A52%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A53%2C%22slk%22%3A%22RH%22%7D%2C%7B%22_p%22%3A54%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A55%2C%22slk%22%3A%22AAOI%22%7D%2C%7B%22_p%22%3A56%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A57%2C%22slk%22%3A%22Applied%20Optoelectronics%2C%20Inc.%22%7D%2C%7B%22_p%22%3A58%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A59%2C%22slk%22%3A%22BBW%22%7D%2C%7B%22_p%22%3A60%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A61%2C%22slk%22%3A%22Build-A-Bear%20Workshop%2C%20Inc.%22%7D%2C%7B%22_p%22%3A62%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A63%2C%22slk%22%3A%22OLED%22%7D%2C%7B%22_p%22%3A64%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A65%2C%22slk%22%3A%22Universal%20Display%20Corporation%22%7D%2C%7B%22_p%22%3A66%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A67%2C%22slk%22%3A%22ZSAN%22%7D%2C%7B%22_p%22%3A68%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A69%2C%22slk%22%3A%22Zosano%20Pharma%20Corporation%22%7D%2C%7B%22_p%22%3A70%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A71%2C%22slk%22%3A%22IPCI%22%7D%2C%7B%22_p%22%3A72%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A73%2C%22slk%22%3A%22IntelliPharmaCeutics%20International%20Inc.%22%7D%2C%7B%22_p%22%3A74%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A75%2C%22slk%22%3A%22FIX%22%7D%2C%7B%22_p%22%3A76%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A77%2C%22slk%22%3A%22Comfort%20Systems%20USA%2C%20Inc.%22%7D%2C%7B%22_p%22%3A78%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A79%2C%22slk%22%3A%22CLSD%22%7D%2C%7B%22_p%22%3A80%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A81%2C%22slk%22%3A%22Clearside%20BioMedical%2C%20Inc.%22%7D%2C%7B%22_p%22%3A82%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A83%2C%22slk%22%3A%22BLPH%22%7D%2C%7B%22_p%22%3A84%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A85%2C%22slk%22%3A%22Bellerophon%20Therapeutics%2C%20Inc.%22%7D%2C%7B%22_p%22%3A86%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A87%2C%22slk%22%3A%22Load%2010%20more%22%7D%2C%7B%22_p%22%3A88%2C%22slk%22%3A%22NAO%22%7D%2C%7B%22_p%22%3A89%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A90%2C%22slk%22%3A%22Nordic%20American%20Offshore%20Ltd.%22%7D%2C%7B%22_p%22%3A91%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A92%2C%22slk%22%3A%22GRAM%22%7D%2C%7B%22_p%22%3A93%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A94%2C%22slk%22%3A%22Gra%C3%B1a%20y%20Montero%20S.A.A.%22%7D%2C%7B%22_p%22%3A95%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A96%2C%22slk%22%3A%22FNCX%22%7D%2C%7B%22_p%22%3A97%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A98%2C%22slk%22%3A%22Function(x)%20Inc.%22%7D%2C%7B%22_p%22%3A99%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A100%2C%22slk%22%3A%22CLIRW%22%7D%2C%7B%22_p%22%3A101%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A102%2C%22slk%22%3A%22ClearSign%20Combustion%20Corporatio%22%7D%2C%7B%22_p%22%3A103%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A104%2C%22slk%22%3A%22ARL%22%7D%2C%7B%22_p%22%3A105%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A106%2C%22slk%22%3A%22American%20Realty%20Investors%2C%20Inc.%22%7D%2C%7B%22_p%22%3A107%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A108%2C%22slk%22%3A%22HCLP%22%7D%2C%7B%22_p%22%3A109%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A110%2C%22slk%22%3A%22Hi-Crush%20Partners%20LP%22%7D%2C%7B%22_p%22%3A111%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A112%2C%22slk%22%3A%22MYSZ%22%7D%2C%7B%22_p%22%3A113%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A114%2C%22slk%22%3A%22My%20Size%2C%20Inc.%22%7D%2C%7B%22_p%22%3A115%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A116%2C%22slk%22%3A%22ACIA%22%7D%2C%7B%22_p%22%3A117%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A118%2C%22slk%22%3A%22Acacia%20Communications%2C%20Inc.%22%7D%2C%7B%22_p%22%3A119%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A120%2C%22slk%22%3A%22AZRE%22%7D%2C%7B%22_p%22%3A121%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A122%2C%22slk%22%3A%22Azure%20Power%20Global%20Limited%22%7D%2C%7B%22_p%22%3A123%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A124%2C%22slk%22%3A%22BPT%22%7D%2C%7B%22_p%22%3A125%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A126%2C%22slk%22%3A%22BP%20Prudhoe%20Bay%20Royalty%20Trust%22%7D%2C%7B%22_p%22%3A127%2C%22slk%22%3A%22_%22%7D%2C%7B%22_p%22%3A128%2C%22slk%22%3A%22Load%2010%20more%22%7D%2C%7B%22_p%22%3A129%2C%22slk%22%3A%22%23name%23%22%7D%5D%2C%22ylk%22%3A%7B%7D%7D%5D%7D%5D%2C%22yrid%22%3A%22%22%2C%22optout%22%3A%220%22%2C%22nol%22%3A%220%22%7D";


$string = urldecode($string);
$bits = explode(':', $string);
var_dump( $bits );
?>