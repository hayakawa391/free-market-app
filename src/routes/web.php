<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;/* 商品のcontroller*/ 
use App\Http\Controllers\UserController;
use App\Http\Controllers\MypageController;

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

Route::get('/',[ItemController::class, 'index']);/*商品一覧へ*/ 
Route::get('/item/{item_id}', [ItemController::class, 'show']);/*商品の詳細ページへ*/ 
Route::get('/sell',[ItemController::class,'create']) ->middleware('auth');/*/sellで商品出品へ(middleware('auth')はログイン済みか確認し、ログインされていなかったら/loginへ)*/ 
Route::post('/sell',[ItemController::class,'item_sell'])->middleware('auth');/*item_sellメソッドでユーザーが送信したデータを処理し、DBに保存する*/
Route::post('/item/{item_id}/sold_out', [ItemController::class, 'sold']);/*そのアイテム（idに対応するアイテム）が売り切れた時に呼び出すメソッドsold_out*/ 


//ユーザー登録　authをつけたので、ログインしている人だけが入れる
Route::get('/mypage', [MypageController::class, 'index'])->middleware('auth');
Route::put('/mypage', [MypageController::class, 'update'])->middleware('auth');


