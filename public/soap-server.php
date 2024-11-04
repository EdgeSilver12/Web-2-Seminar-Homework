<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__.'/../bootstrap/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$soapServer = new SoapServer(null, [
    'uri' => 'http://localhost/soap'
]);

$soapServer->setClass('App\Http\Controllers\SoapController');
$soapServer->handle($request->getContent());
