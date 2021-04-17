<?php

use Illuminate\Support\Facades\Route;
use TyrantG\BraftEditor\Http\Controllers\BraftEditorController;

Route::any('tyrantg/braft/upload', BraftEditorController::class.'@upload');
