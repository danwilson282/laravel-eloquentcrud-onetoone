<?php
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/create', function(){
    $user = User::find(1);
    $address = new Address(["name"=>"81 Thirlmere"]);
    $user->address()->save($address);

});
Route::get('/read', function(){
    $user = User::find(1);
    return $user->address;
});
Route::get('/update', function(){
    $address = Address::where('user_id',1)->first();
    $address->name = "22 Palmer Avenue";
    $address->save();
});
Route::get('/delete', function(){
    $user = User::find(1);
    $user->address()->delete();
});
