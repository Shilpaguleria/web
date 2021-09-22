<?php
$script_url= "http://in.sirez.com/petition/";
 $app_id = "157240697672678";
      $canvas_page = "http://apps.facebook.com/gp_petition/";
    
    
    
       $auth_url = "http://www.facebook.com/dialog/oauth?client_id="
     . $app_id . "&redirect_uri=" . urlencode($canvas_page);
     $signed_request = $_REQUEST["signed_request"];
     list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
     $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
     
     
     if (empty($data["user_id"])) {
         //  header("location:".$auth_url);
          echo("<script> top.location.href='" . $auth_url . "'</script>");
 
     } else {
       
        $loginuserid=$data["user_id"];     
     } 
$con = mysql_connect("mysql50-70.wc1.sat1.stabletransit.com","329206_testdata","TestData2011");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }  
   mysql_select_db("329206_testdata");
                           
 
      
  ?>