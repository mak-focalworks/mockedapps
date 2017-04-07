<?php
    if(isset($_GET['code'])){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://slack.com/api/oauth.access?code='.$_GET['code'].'&client_id=112655623728.166099875590&client_secret=2f9422684fe95fcc9733fd8429b13699');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($curl);
        curl_close($curl);
        $objectResp = json_decode($resp);
        $array = json_decode(json_encode($objectResp), true);
        echo "<h1>Success</h1><br />";
        echo "User ID : ". $array["user"]["id"] ."<br />";
        echo "Email : ". $array["user"]["email"] ."<br />";
    }

?>