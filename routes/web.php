<?php

use App\Http\Controllers\helper;
use App\Http\Controllers\mainAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\SecondMain;
use App\Http\Controllers\GoogleController;
use App\Models\blog;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\PropertyCategorie;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\FacebookLoginController;

use App\Http\Controllers\frontsideController;



Route::get('/', [mainController::class, 'indexView'])->name('home');

Route::get('/login', [mainAuth::class, 'loginView']);
Route::post('/login', [mainAuth::class, 'login'])->name('login');

Route::get('/signup', [mainController::class, 'signupView'])->name('signup');

Route::get('/forgot', [mainController::class, 'forgotPasswordView'])->name('forgotView');
Route::post('/forgot/post', [mainController::class, 'forgotPasswordPost'])->name('forgotPost');
Route::post('/forgot/post/final', [mainController::class, 'forgotFinalPost'])->name('forgotFinalPost');

Route::post('/register', [mainAuth::class, 'register'])->name('register');


//Route::get('/email/verify', [mainAuth::class, "emailVerifyView"])->middleware(['auth'])->name('verification.notice');
Route::get('/email/verify', [mainAuth::class, "emailVerifyView"])->middleware(['auth'])->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', [mainAuth::class, 'emailVerify'])->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', [mainAuth::class, "sendEmailVerifyLinkAgain"])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/logout', [mainAuth::class, 'logout'])->name("logout");

Route::get('/rent/commercial', [mainController::class, 'rentCommercialView'])->name('rentCommercial');
Route::get('/rent/residential', [mainController::class, 'rentResidentialView'])->name('rentResidential');
Route::get('/sale/residential', [mainController::class, 'saleResidentialView'])->name('saleResidentail');
Route::get('/sale/commercial', [mainController::class, 'saleCommercialView'])->name('saleCommercial');
 Route::get('/ad/{title}/{id}', [mainController::class, 'singlePageAddView'])->name("singlePage");

Route::get('/contact', [SecondMain::class, "contactUs"])->name('contactUs');

// Route::get('/search/', 'PostsController@search')->name('search');
Route::get('search',[mainController::class,'search']);


///   buy

Route::get('/buy/plot/residential', [mainController::class, 'saleResidentialView'])->name('plotResidentail');
Route::get('/buy/commercial', [mainController::class, 'saleCommercialView'])->name('buyCommercial');
Route::get('/commercial', [mainController::class, 'rentCommercialView'])->name('commercial');




Route::group(["middleware" => "auth"], function () {


        ///////////////////////////////////inbox routes////////////////////////////////
        Route::resource("inbox", ChatMessageController::class);
        Route::get("/conversation/{id}", [ChatMessageController::class, "conversationView"]);
        Route::get("/ajax/total/message/count", [ChatMessageController::class, "totalMessageCount"]);
        Route::get("/inboxNew", [ChatMessageController::class, "inboxNewView"]);



        //Route for user add post
        
        Route::get('/userpost/add', [frontsideController::class, 'postAddView'])->name('useraddpost');
        Route::post('user/post/add', [frontsideController::class, 'UserPostAdd'])->name("userpostadd");
        Route::get('userpost/view', [frontsideController::class, 'userpostindex'])->name("userviewpost");

        Route::get('/user/edit/post/{id}', [frontsideController::class, 'edituserPostView'])->name('usereditPostview');
        Route::post('/user/edit/post/{id}', [frontsideController::class, 'editUserPost'])->name('userupdatePost');


        Route::get('user/delete/post/{id}', [mainController::class, 'deletePost'])->name('userdeletePost');
        Route::get('user/disable/enable{id}', [frontsideController::class, 'userDisableEnable'])->name('userDisable');


 /////////////////////Route Only for super admin come in following group///////////
        Route::group(['middleware' => 'superAdmin'], function () {

                Route::get('/admin/post', [SecondMain::class, 'adminFeaturePost'])->name('adminPost');
                Route::post('/admin/post', [SecondMain::class, 'adminPostAdd'])->name('addAdminPost');



                /////////write blog///////



                Route::get('/blog/view', [mainController::class, 'blogView'])->name("blogAdminView");
                Route::post("blog", [mainController::class, "blog"])->name("blog");
                Route::get("/blog/edit/{id}", [mainController::class, "blogEditView"])->name("blogMainView");
                Route::post("/blog/edit", [mainController::class, "blogEdit"])->name("blogEdit");
                Route::get("/blog/all", [mainController::class, "blogAll"])->name("blogAll");
                Route::get("/blog/delete/{id}", [mainController::class, "deleteBlog"])->name("deleteBlog");
                Route::get('/ckeditor/upload', [mainController::class, 'upload'])->name('ckeditor.image-upload');


                //admin delete or disable or edit
                Route::get('delete/disable', [SecondMain::class, 'deleteDisableView'])->name('adminDeleteDisable');
                
                Route::get('admin/delete/{id}', [SecondMain::class, 'adminDeletePost'])->name('adminDelete');
                Route::get('admin/disable/enable{id}', [SecondMain::class, 'adminDisableEnable'])->name('adminDisable');


                Route::get('/edit/adminpost/{id}', [mainController::class, 'editPostView'])->name('editadminPostView');

                Route::post('/edit/adminupdatepost/{id}', [mainController::class, 'editPost'])->name('adminupdatepost');

                //admin add city
                Route::get('add/city/view', [frontsideController::class, 'addcityView'])->name("adminaddcity");
                Route::post("city/add", [frontsideController::class, 'savecity'])->name("adminsavecity");
                Route::get('admincity/view', [frontsideController::class, 'admincitypostindex'])->name("admincityview");
                Route::get('admin/deletecity/city/{id}', [frontsideController::class, 'deleteCity'])->name('admindeletecity');
                Route::get('/edit/city/{id}', [frontsideController::class, 'editCityView'])->name('editCityView');
                Route::post('/admin/edit/city/{id}', [frontsideController::class, 'editCity'])->name('admineditCity');

                //admin add agency
                Route::get('add/agency/view', [frontsideController::class, 'addagencyView'])->name("adminaddagency");
                Route::get('agency/index', [frontsideController::class, 'Agencyindex'])->name("adminagencyindex");
                Route::get('/edit/agency/{id}', [frontsideController::class, 'editagencyView'])->name('editagencyView');
                Route::post('/admin/edit/agency/{id}', [frontsideController::class, 'update'])->name('admineditagencyCity');
                Route::get('admin/deleteagency/agency/{id}', [frontsideController::class, 'deleteAgency'])->name('admindeleteagency');

                Route::post("agency/add", [frontsideController::class, 'adminaddagency'])->name("adminsaveagency");
                 
                
                //admin viewcategory

                 Route::post("subtype/add", [frontsideController::class, 'savesubtype'])->name("adminsavesubtype");
                 Route::get('admincategory/view', [frontsideController::class, 'admincategoryview'])->name("admincategoryview");
                 Route::get('admin/deletecategory/property/{id}', [frontsideController::class, 'deleteCategory'])->name('admindeletecategory');
                 Route::get("/property/edit/{id}", [frontsideController::class, "editCategoryView"])->name("editcategoryview");
                 Route::post("/category/edit/{id}", [frontsideController::class, "categoryupdate"])->name("categoryedit");

                //admin decides rates for freshes
                Route::get('/freshes/rates', [SecondMain::class, 'freshesView'])->name('freshesRatesView');
                Route::post('/freshes/rates', [SecondMain::class, 'addFreshesRates'])->name('addFreshesRates');
                Route::get('/fresh/edit/{id}', [SecondMain::class, 'editFreshView'])->name('editFreshView');
                Route::post('/fresh/edit/{id}', [SecondMain::class, 'updateFreshRate'])->name('updateRates');

              //addmanage
               Route::get('addmanage/index', [frontsideController::class, 'addmanageindex'])->name("adminaddmanageindex");
               Route::get('addmanage/add', [frontsideController::class, 'addmanageadd'])->name("adminaddmanageadd");
               Route::post('addmanage/save', [frontsideController::class, 'addmanagesave'])->name("adminsaveadd");
               
               Route::get('admin/deletebanner/banner/{id}', [frontsideController::class, 'deletebanner'])->name('admindeletebanner');

                //coin request to admin
                Route::get('/coin/request', [SecondMain::class, 'allCoinRequest'])->name('allCoinRequest');
                //coin request to admin approved
                Route::get('/approve/coin/user/{user}/coin/{coins}/id{id}', [SecondMain::class, 'approveCoinRequest'])->name('approveCoin');
                //coins that admin approved
                Route::get('/approve/Requests', [Secondmain::class, 'showApprovedCoins'])->name('approvedCoinRequest');

                //post request to admin
                Route::get('/post/requests', [SecondMain::class, 'allPostrequests'])->name('allPostReq');
                //aprove req
           
        });

 

        /////////////route which is only for sellers come here in below group////////
        Route::group(["middleware" => "sellerRoleCheck"], function () {
                Route::get('/post/add', [frontsideController::class, 'postAddView']);
                Route::post('/post/add', [frontsideController::class, 'UserPostAdd'])->name("postadd");

                Route::get('/all/post', [mainController::class, 'allPostView']);
                Route::get('user/view', [frontsideController::class, 'Sellerpostindex'])->name('sellerview');

                Route::get('/edit/post/{id}', [mainController::class, 'editPostView'])->name('editPostView');

                Route::post('/edit/post/{id}', [mainController::class, 'editPost'])->name('editPost');


                Route::get('/delete/post/{id}', [mainController::class, 'deletePost'])->name('deletePost');
                Route::get('seller/disable/enable{id}', [SecondMain::class, 'sellerDisableEnable'])->name('sellerDisable');

                Route::get('/agency', [mainController::class, 'agencyView'])->name("agency");
                Route::post('/agency', [mainController::class, 'agencyAdd'])->name("addAgency");

                ///pricing
                Route::get('/pricing', [SecondMain::class, 'pricingView'])->name('PricingView');
                Route::get('/coin/buy', [SecondMain::class, 'BuyCoinView'])->name('CoinBuy');
                ROute::post('/coin/buy/req', [SecondMain::class, 'addToRequestCoin'])->name('addCoins');

                //boast post
                Route::get('/boast/post/{post_id}/category/{cat}', [SecondMain::class, 'boastPost'])->name('boastPost');

        });



        Route::get("verification/view", [mainController::class, "verificationView"])->name("verificationView");

        //////change phone enterd wrong phone//////
        Route::get("enter/phone/view", [mainController::class, "numberView"]);
        Route::post("enter/phone/view", [mainController::class, "changeNumber"]);
        //////change phone because entring wrong phone number end//////

        Route::post("verifyPhone", [mainController::class, "finalizePhone"])->name("finalPhone");

        Route::get('/edit/profile', [mainController::class, 'editProfileView'])->name('editProfile');

        Route::post('/edit/profile', [mainController::class, 'editProfileSubmit'])->name('editProfileSubmit');

        Route::post('/profile/photo', [mainController::class, 'uploadUserProfile'])->name('profilePhotoUpload');

        //Route::get('/areas', [mainController::class, 'getAllLahoreArea']);


        Route::get('/dashbored', [mainController::class, 'dashboredView'])->name('dashbored');

        //////sold post , method for check or uncheck post sale or not

        Route::get('/sold/post/{id}', [mainController::class, 'soldPost'])->name("sold");

        ///////////forgot password procedure final step after login, add new password method

        Route::post('/newpassword', [mainController::class, 'newpassword'])->name("newpassword");
});



Route::get('/areas/{city}', [mainController::class, 'getAreasAccordingCity']);



Route::get('/fav/post/add/{id}', [SecondMain::class, 'addToFav'])->name('favPost');
Route::get('/post/fav', [SecondMain::class, 'showFavPost'])->name('showFavPost');

//become a seller



Route::get('/moreinfo', [SecondMain::class, 'userMoreInfo'])->name('userMoreInfo');
Route::post('/moreinfo', [SecondMain::class, 'submitMoreInfo'])->name('submitMoreInfo');


/////////api for getting residential or commercial base specific proeprty///////

Route::get("get/property/{id}", [mainController::class, 'getProperty']);

 Route::post('/agent/request/{id}', [SecondMain::class, 'addToRequestAgent'])->name('requestAnAgent');


Route::get('/agents/request', [SecondMain::class, 'showAllRequestToAgents'])->name('requestToAgenst');

Route::get('/client/request', [SecondMain::class, 'ShowClientrequest'])->name('showClientRequest');
 
Route::get('/agencies', [SecondMain::class, 'showAgencies'])->name('showAgencies');


Route::get('/property/search', [mainController::class, 'propertySearch'])->name('property.search');
Route::get('/live_search/action', [mainController::class, 'action'])->name('live_search.action');

Route::get('/typeahead_autocomplete/action', [mainController::class, 'action'])->name('typeahead_autocomplete.action');


Route::get('/search/agency', [mainController::class, 'searchAgency'])->name('searchAgency');

//api for favPost red button

// Route::get('/fav/post/api', [SecondMain::class, 'favPostApi']);
//////blog route for public
Route::get('/blog/main/view', [mainController::class, 'mainBlogView'])->name("mainBlogView");
Route::get('/blog/main/single/view/{id}', [mainController::class, 'blogMainSingleView'])->name("blogMainSingleView");
Route::get('/edit/edit', [ChatMessageController::class, 'edit']);

//-----------------------------------login with facebook-------------------------------//

Route::get('auth/facebook', [FacebookLoginController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [FacebookLoginController::class, 'loginWithFacebook']);


//----------------------google login----------------------//

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('loginGoogle');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


//----------------------------single page agency-------------------------//
Route::get('single/agency/{id}', [SecondMain::class, 'singlePageAgency'])->name('agencySinglePage');


Route::group(['middleware' => 'Dealer'], function () {

        Route::get('dealerAddSocietycreate', [SecondMain::class, 'dealerAddSocietycreate']);
        Route::post('/dealerAddSociety', [SecondMain::class, 'dealerAddSociety']);
        Route::get('/dealerDetails', [SecondMain::class, 'dealerDetails']);
        Route::get('/deleteDealerPost/{id}', [SecondMain::class, 'deleteDealerPost']);
        Route::get('/dealerEdit/{id}', [SecondMain::class, 'dealerEdit']);
        Route::post('/dealerUpdate/{id}', [SecondMain::class, 'dealerUpdate']);
        Route::get('/getAllDealerSociety', [SecondMain::class, 'getAllDealerSociety']);
        Route::get('/deleteAdminSociety/{id}', [SecondMain::class, 'deleteAdminSociety']);
        Route::get('/adminSocietyEdit/{id}', [SecondMain::class, 'adminSocietyEdit']);
        Route::post('/adminSocietyUpdate/{id}', [SecondMain::class, 'adminSocietyUpdate']);
        
});



Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/about-us', function () {
        return view('aboutus');
    });