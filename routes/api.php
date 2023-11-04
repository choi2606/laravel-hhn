<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/chat', function (Request $request) {
//     $request->validate([
//         'prompt' => 'required',
//     ]);
//     $yourApiKey = gextenv('YOUR_API_KEY');
//     $client = OpenAI::client($yourApiKey);

//     $result = $client->completions()->create([
//         'model' => 'davinci',
//         'prompt' => $request->get('prompt'),
//     ]);
//     return response()->json(['result' => $result[0]]);
// });