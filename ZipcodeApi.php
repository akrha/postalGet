<?php
class ZipcodeApi {
    private $base_url;
    
    public function __construct()
    {
        $this->base_url = "http://zipcloud.ibsnet.co.jp/api/search";
    }
    
    public function create_url($zipcode)
    {
        $zipcode = htmlspecialchars($zipcode);
        return $this->base_url . "?zipcode=" . $zipcode;
    }
    
    public function search($url)
    {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        return json_decode($response, true);
    }
}
