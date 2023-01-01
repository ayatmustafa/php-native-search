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
            $curl_obj =  new CurlRepository();
            return $curl_obj->call($url);
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