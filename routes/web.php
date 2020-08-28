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
    
    if( isLocalIp($ip)) {
        $ip = '24.48.0.1';
    }

    $result = json_decode(file_get_contents("http://ip-api.com/json/$ip", true), true);
    
    if ( $result['status'] === 'success') {
        return $result['country'];
    }

    return response('Request Failed', 418);

});

function isLocalIp($ip) {
    if( strpos($ip, '192') === 0 || strpos($ip, '172') === 0 || strpos($ip, '10') === 0 || strpos($ip, '127') === 0) {
        return true;
    }
    return false;
}
