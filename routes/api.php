<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Automatically require every module's api.php file
$modulePaths = glob(app_path('Modules/*/api.php'));
foreach ($modulePaths as $modulePath) {
    require $modulePath;
}
