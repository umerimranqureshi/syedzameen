<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\postController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\frontsideController;
use App\Http\Controllers\Api\AddSocietyController;
use App\Http\Controllers\postsConstroller;

//hytrew
/*userDelete
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
                    Route::get('/getAdminSociety', [AddSocietyController::class, 'getAdminSociety']);


        Route::get('/all/posts',[postController::class, 'showallpost']);
        Route::get('/live/posts',[postController::class, 'livesearch']);

        Route::get('/featured/posts', [postController::class, 'featurepost']);
        
                Route::get('/allCount', [postController::class, 'postCount']);


        Route::get('/post/{id}',[postController::class, 'detailpage']);

        Route::post('/login', [AuthController::class, 'login']);

        Route::post('/register', [AuthController::class, 'register']);
        Route::get('/get/add', [postController::class, 'getaddmanage']);

        Route::get('/agencies', [postController::class, 'showagencies']);

        Route::get('/showsubtype', [postController::class, 'fetchsubtype']);

        Route::get('/city/area', [postController::class, 'City_and_area']);

        Route::get('/rent/home', [postController::class, 'renthome']);

        Route::get('/rent/commercial', [postController::class, 'rentcommercial']);

        Route::get('/rent/residential', [postController::class, 'rentresidential']);

        Route::get('/sale/commercial', [postController::class, 'salecommercial']);

        Route::get('/sale/home', [postController::class, 'salehome']);

        Route::get('/sale/residential', [postController::class, 'saleresidential']);

        Route::get('/property/search', [postController::class, 'propertySearch']);

        Route::get('/property/MarlaSearch', [postController::class, 'MarlaSearch']);



            //Route for authuser access//
            Route::group(['middleware' => ['jwt.verify']], function() {

                    Route::get('/logout', [AuthController::class, 'logout']);
                    
                     Route::delete('/deleteUser/{id}', [AuthController::class, 'deleteUser']);


                    Route::get('/user-profile', [AuthController::class, 'userProfile']);

                    Route::post('user/update',[postController::class,'updateprofile']);


                    Route::post('/refresh', [AuthController::class, 'refresh']);

                    Route::post('/createpost', [postController::class, 'createpost']);

                    Route::post('/post/update',[postController::class,'updatepost']);

                    Route::delete('/post/delete/{id}',[postController::class,'deletePost']);

                    Route::post('favrouts/post',[postController::class,'addtofavpost']);

                //     Route::post('remove/favrouts/post',[postController::class,'removetofavpost']);

                    Route::delete('/favpost/delete/{id}',[postController::class,'removetofavpost']);


                    Route::get('/show/favpost', [postController::class, 'showfavpost']);

                    Route::get('/userpost/view', [postController::class, 'showAuthUserPost']);

                    Route::post('/admin/disable/enable', [postController::class, 'adminDisableEnable']);
//                             Society

                    Route::post('/addSociety', [AddSocietyController::class, 'addSociety']);
                    Route::get('/getDealerSociety', [AddSocietyController::class, 'getDealerSociety']);
                    Route::get('/getDealerSociety/{id}', [AddSocietyController::class, 'Societyshow']);
                    Route::put('/updatePayment/{id}', [AddSocietyController::class, 'updatePayment']);
                    Route::delete('/dealerDelete/{id}', [AddSocietyController::class, 'dealerDelete']);
                    // Route::put('/updateNoticePeriod/{id}', [AddSocietyController::class, 'updateNoticePeriod']);
                    // Route::get('/notification', [AddSocietyController::class, 'notification']);
                   Route::post('/sendNotification/{id}', [AddSocietyController::class, 'sendNotification']);
                 Route::get('/getAllDealerSociety', [AddSocietyController::class, 'getAllDealerSociety']);


                    
           //                        user add society 

                    Route::get('/userGetSociety', [AddSocietyController::class, 'userGetSociety']);
                    Route::post('/userAddSociety', [AddSocietyController::class, 'userAddSociety']);
                    Route::delete('/userDelete/{id}', [AddSocietyController::class, 'userDelete']);
                    Route::put('/userAddSocietyRead/{id}', [AddSocietyController::class, 'userAddSocietyRead']);

            });
