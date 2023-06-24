<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All Listings
Route::get('/',[ListingController::class,'index']);




//show create form
Route::get('/listing/create',[ListingController::class,'create'])->middleware('auth'); 

//Store Listing  Route Model binding 
Route::post('/listing',[ListingController::class,'store']);
// Rupanya boleh sama path but different method decidedd based on form 
Route::get('/listing/{listing}/edit',[ListingController::class,'edit'])->middleware('auth'); 

Route::put('/listing/{listing}',[ListingController::class,'update']);

Route::delete('/listing/{listing}',[ListingController::class,'destroy'])->middleware('auth');  

Route::get('/listing/manage',[ListingController::class, 'manage'])->middleware('auth');

//Single Listing  Route Model binding 
Route::get('/listing/{listing}',[ListingController::class,'show']);


Route::get('/register',[UserController::class,'create'])->middleware('guest');


Route::post('/users',[UserController::class,'store']);

//
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');   

Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
 

Route::post('/users/authenticate',[UserController::class,'authenticate']);
// Show Edit Form



/*For the most part view doesnt need to always return blade template
normal php file is sufficient */

/*
Route::get('/hello',function(){
    return response('<h1>Hello World</h1>')
        ->header('Content-Type','text/plain')
});
-> arrow allows you to modified header(network packet) not sure why uses arrow.


Route::get('/posts/{id}',function($id){
    ddd($id)
    return response('Post '. $id);
})->where('id','[0-9]+');

"ddd" dumb-die-debug method get the variable we pass
then we can further analyze it

"where" condiitonal is where we specify the id
to just be an integere.
Passings strings will give an error
*/
