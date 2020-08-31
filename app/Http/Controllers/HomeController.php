<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    private function isPrivOrResIp($ip) {
        return filter_var($ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);    
    }
    
    public function index()
    {
        return view('index');
    }

    public function getIp()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        
        if( !$this->isPrivOrResIp($ip)) {
            $ip = '24.48.0.1';
        }
    
        $result = json_decode(file_get_contents("http://ip-api.com/json/$ip", true), true);
        
        if ( $result['status'] === 'success') {
            return $result['country'];
        }
    
        return response('Request Failed', 404);
    }
    
    
}
