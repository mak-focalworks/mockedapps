<?php
    if(isset($_GET['code'])){
        //echo 'http://slack.com/api/oauth.access?code='.$_GET['code'].'&client_id=112655623728.166099875590&client_secret=2f9422684fe95fcc9733fd8429b13699';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://slack.com/api/oauth.access?code='.$_GET['code'].'&client_id=112655623728.166099875590&client_secret=8a7c321e7b5d5f53ab544298d9b79c07');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($curl);
        $objectResp = json_decode($resp);
        $array = json_decode(json_encode($objectResp), true);
        $token= $array["access_token"];
        curl_setopt($curl, CURLOPT_URL, "https://slack.com/api/users.list?presence=true&code=$token&pretty=1");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($curl);
        $objectResp = json_decode($resp);
        $array = json_decode(json_encode($objectResp), true);
        print_r($array);
        curl_close($curl);   
    }

?>