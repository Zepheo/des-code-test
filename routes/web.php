<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('getip', function () {
    $ip = $_SERVER['REMOTE_ADDR'];
    
    if( !isPrivOrResIp($ip)) {
        $ip = '24.48.0.1';
    }

    $result = json_decode(file_get_contents("http://ip-api.com/json/$ip", true), true);
    
    if ( $result['status'] === 'success') {
        return $result['country'];
    }

    return response('Request Failed', 404);

});

function isPrivOrResIp($ip) {
    return filter_var($ip,
        FILTER_VALIDATE_IP,
        FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);    
}
