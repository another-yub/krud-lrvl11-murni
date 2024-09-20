<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;

Route::resource('/pos', PosController::class);