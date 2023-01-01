<?php

namespace App\Repositories;

use App\Repositories\DataAdaptorInterface;
use Exception;

class GitRepository implements DataAdaptorInterface{
    private $url = "https://api.github.com/search/repositories?q=";

    public function getData($inputs)
    {
        try{
            $url = $this->generateQueryString($inputs);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_HTTPHEADER => [
                    "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"
                ],
                CURLOPT_URL => $url ,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                ));

            $response = curl_exec($curl);
            curl_close($curl);
            return  json_decode($response, true);
        }//catch exception
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function generateQueryString($inputs)
    {
        $url = $this->url;
        if(isset($inputs['created_date']))
        {
            $url=$url."created=".$inputs['created_date'];
        }
        if(isset($inputs['language']))
        {
            $url=$url."+language:".$inputs['language'];	
        }
        if(isset($inputs['per_page']))
        {
            $url=$url."&per_page=".$inputs['per_page'];	
        }
        if(isset($inputs['sort']))
        {
            $url=$url."&sort=".$inputs['sort'];	
        }
        return $url;
    }
}