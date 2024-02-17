<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddSociety;
use App\Models\AddToFavorite;
use App\Models\Adminagencies;
use App\Models\Agencie;
use App\Models\Fresh;
use App\Models\User;
use App\Models\PostImage;
use App\Models\PropertyCategorie;
use App\Models\SocietyPicture;
use App\Models\Post;
use App\Models\DealerAddSociety;
use App\Models\RequestAnAgent;
use App\Models\UserAccount;
use App\Models\UserCoinRequest;
use App\Models\UserPostReq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use Intervention\Image\File;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Null_;

class SecondMain extends Controller
{
    public function addToFav(Request $request)
    {
        // dd($request->id);
        if (Auth::check()) {
            $fav = AddToFavorite::where('post_id', $request->id)->where('user_id', Auth::id())->get();

            if ($fav->count() > 0) {
                AddToFavorite::where('post_id', $request->id)->where('user_id', Auth::id())->delete();

                return ['message' => 'remove'];
            } else {

                AddToFavorite::create([
                    'user_id' => auth()->user()->id,
                    'post_id' => $request->id,
                ]);
                return ['message' => 'success'];
            }
        } else {

            return redirect('/login')->with('loginFirst', 'Login here');
        }
    }

    public function showFavPost()
    {


        // dd($favPOst->userFavPost->first()->post_id);

        $fav = AddToFavorite::with(['post.propertyCate', 'post.agencies', 'image'])->where('user_id', Auth::id())->get();

        // dd($fav);

        // dd($fav);
        return view('adminPanel.favPost', ['fav' => $fav]);
    }

    public function userMoreInfo()
    {

        return view('adminPanel.usermoreinfo');
    }



    public function submitMoreInfo(Request $req)
    {


        if (Auth()->check()) {


            $validatedData = $req->validate([
                'address' => ['required'],
                'cnic' => ['required'],
            ]);

            if ($validatedData) {
                $user = Auth::user();

                $user->address = $req->address;
                $user->cnic = $req->cnic;
                $user->role = 3;


                $user->save();

                return redirect('/');
            }
        }
    }

    public function adminFeaturePost()
    {

        $cities = DB::table("city_and_areas")->distinct()->get("city");

        return view('adminPanel.postAdd', compact("cities"));
    }

    public function adminPostAdd(Request $req)
    {

        //    dd($req->all());

        $req->validateWithBag("addPostError", [

            "property_title" => "required",
            "description" => "required",
            "price" => "required",
            "land_area" => "required",
            "contact_person_name" => "required",
            // "mobile_number" => "required|numeric|digits:13",
            "email" => "email",
            "purpose" => "required",
            "mainimage" => "required",

        ]);
        // dd("chk");

        $propertyAllFields = PropertyCategorie::where("purpose", $req->purpose)
            ->where("property_type", $req->property_type)
            ->where("property_sub_type", $req->sub_type)
            ->first();
// dd($propertyAllFields);
        ///////converting every unit into marla ///////

        switch ($req->unit) {

            case "kanal":
                $marla = $req->land_area * 20;
                break;

            case "square_feet":
                $marla = $req->land_area / 272;
                break;

            case "square_yards":
                $marla = $req->land_area / 30.25;
                break;


            case "marla":
                $marla = $req->land_area;
                break;
        }

        ///////converting every unit into marla end ///////
        if ($req->floaring) {
            $floaringString = implode(",", $req->get('floaring'));
        } else {
            $floaringString = "NULL";
        }
        if ($req->electricity) {
            $electricityString = implode(",", $req->get('electricity'));
        } else {
            $electricityString = 'NULL';
        }

        if ($req->amenities) {
            $amenitiesString = implode(",", $req->get('amenities'));
        } else {
            $amenitiesString = '';
        }

        if ($image = $req->file('mainimage')) {
            $destinationPath = 'mainimage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['mainimage'] = "$profileImage";
        }

       
        // if($req->mobile_number  or $req->mobile2_number)
        // {
        //     $var= '+92';
        //     $varr=$req->mobile_number;
        //     $var .= $varr;

        //     $mobb='+92';
        //     $mob=$req->mobile2_number;
        //     $mobb .=$mob;
           
        // }
            // dd("ssss");

        $postCreated = Post::create([
            "property_title" => $req->property_title,
            "description" => $req->description,
            "price" => $req->price,
            "land_area" => $marla,
            "bedrooms" => $req->bedroom,
            "bathrooms" => $req->bathroom,
            "video_link" => $req->video_link,
            "address" => $req->address,
            "location" => $req->city_area,
            "year" => $req->year,
            "mainimage" => $profileImage,
            "floaring" => $floaringString,
            "amenities" => $amenitiesString,
            "electricitybackup" => $electricityString,
            "sub_type_type" => $req->sub_type_type,
            "sub_type_plot" => $req->sub_type_plot,
            "city_area_id" => $req->city_area,
            "contact_person_name" => $req->contact_person_name,
            "mobile_number" => $req->mobile_number,
            "mobile2_number" => $req->mobile2_number,
            "email" => $req->email,
             "manual_location" => $req->manual_location,
            "disable" => '0',
            "admin_post" => 1,
            "user_id" => Auth::id(),
            "property_categorie_id" => $propertyAllFields->id,

        ]);

        // dd($postCreated);

        ///////////saving image///////////////////


        $image = array();

        // dd($req->file('image'));

        if ($files = $req->file('image')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'propertyImages';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $upload_path . $image_full_name);
                $image = $image_url;

                //dd($req->file);

                PostImage::create([
                    "img_name" => $image,
                    "post_id" => $postCreated->id,
                    "img_path" => $upload_path

                ]);
            }
        }

        return back()->with("msg", "succesfully Post has been Created");
    }
    public function addToRequestAgent(Request $request)
    {


        $prev = RequestAnAgent::where('user_id', Auth::id())->where('post_id', $request->id)->get();

        if ($prev->count() > 0) {
            return redirect('/');
        }

        $request->validate([

            "message" => "required",
        ]);


        RequestAnAgent::create([
            "message" => $request->message,
            "user_id" => Auth::id(),
            "post_id" => $request->id
        ]);

        $postOfUser = Post::with('user')->where('id', $request->id)->get();

        return view('requestAnAgent', compact('postOfUser'));
    }
    public function showAllRequestToAgents()
    {

        $allReqToAgents = RequestAnAgent::with('post.user')->where('user_id', Auth::id())->get();
        //  dd($allReqToAgents);
        return view('adminPanel.requestToAgents', compact('allReqToAgents'));
    }

    public function ShowClientrequest()
    {

        $reqClient = Post::with('requestOfClients.user')->where('user_id', Auth::id())->get();

        foreach ($reqClient as $client) {
            // dd($client->requestOfClients->count());

        }
        $reqClient->map(function ($post) {
            //dd($post);
        });


        return view('adminPanel.clientrequest', compact('reqClient'));
    }

    public function showAgencies()
    {
        // ->where('admin_post', null)
        $latestPost = Post::with(["postImagesOne", "postViews", "propertyCate", "agencies", "favPostUser", "user"])->latest()->limit(6)->get();
        $featureAgencies = Adminagencies::paginate('4');
        $favPost = AddToFavorite::where('user_id', Auth::id())->get();
        $cities = DB::table("city_and_areas")->distinct()->get("city");

        return view('agncies', compact('featureAgencies', 'latestPost', "cities", "favPost"));
    }

    public function favPostApi()
    {

        return [
            'fav' => AddToFavorite::where('user_id', Auth::id())->get(),
            'allPost' => Post::with(["postImagesOne", "postViews", "propertyCate", "agencies", "favPostUser", "user"])->where('admin_post', null)->latest()->limit(6)->get()
        ];
    }
    public function contactUs()
    {
        return view('contact');
    }

    //admin disable enable
    public function deleteDisableView()
    {

        if (Auth::user()->role == 1) {
            $allPost = Post::with(["postImages", "postViews", "propertyCate", "cityAndArea"])->latest()->get();
                // dd($allPost);
                
            //  foreach($allPost as $post)
            //   {
            //     $val=$post->price;
                
            //     if ($val >= 10000000) {
                    
            //         $val = ($val / 10000000);

            //         $formattedNum = number_format($val, 2);
            //         $final_price= $formattedNum.' Crore';
                   
            //     } else if ($val >= 100000) {

            //         $val = ($val / 100000);
            //         $formattedNum = number_format($val, 2);
            //         $final_price= $formattedNum.' Lakh';
            //     }
            //     else if($val >=1000)
            //     {
            //         $val=($val/1000);
            //         $formattedNum = number_format($val, 2);
            //         $final_price= $formattedNum.' Thousand';
                  
            //     }
            //  else if($val >=1)
            //     {
            //       $final_price= $val;
                  
            //     }
             
            //     $post->price = $final_price;
            //   }
            
               foreach($allPost as $post) {
                $val = $post->price;
                if (is_numeric($val)) { // Check if $val is numeric
                    if ($val >= 10000000) {
                        $val = ($val / 10000000);
                        $formattedNum = number_format($val, 2);
                        $final_price = $formattedNum . ' Crore';
                    } else if ($val >= 100000) {
                        $val = ($val / 100000);
                        $formattedNum = number_format($val, 2);
                        $final_price = $formattedNum . ' Lakh';
                    } else if ($val >= 1000) {
                        $val = ($val / 1000);
                        $formattedNum = number_format($val, 2);
                        $final_price = $formattedNum . ' Thousand';
                    } else if ($val >= 1) {
                        $final_price = $val;
                    }
                    $post->price = $final_price;
                }
            }
            
            return view('adminPanel.DeleteDisable', compact('allPost'));
        } else {
            abort(400);
        }
    }
    public function adminDeletePost($id)
    {
        if (Auth::user()->role == 1) {
            Post::with(["postImagesOne", "postViews", "propertyCate", "agencies", "favPostUser", "cityAndArea"])->where('id', $id)->delete();
            return redirect()->back();
        } else {
            abort(400);
        }
    }
    public function adminDisableEnable($id)
    {
        // dd($id);
        if (Auth::user()->role == 1) {
            $enable = Post::where('id', $id)->where('disable', '1')->get();
            if ($enable->isEmpty()) {
                Post::where('id', $id)->update(['disable' => 1]);
                return redirect()->back();
            } else {
                post::where('id', $id)->update(['disable' => 0]);
                return redirect()->back();
            }
        } else {
            abort(400);
        }
    }

    public function sellerDisableEnable($id)
    {

        if (Auth::user()->role == 3) {
            $enable = Post::where('id', $id)->where('disable', '1')->get();
            if ($enable->isEmpty()) {
                Post::where('id', $id)->update(['disable' => 1]);
                return redirect()->back();
            } else {
                post::where('id', $id)->update(['disable' => 0]);
                return redirect()->back();
            }
        } else {
            abort(400);
        }
    }

    // edit super admin post 
    public function editadminPostView($id)
    {
        ///with eager loading .. loaded relationship which is define in model
        $userPost = Post::with(["postImages", "cityAndArea", "propertyCate"])
            ->where("id", $id)
            ->where("user_id", Auth::id())
            ->first();


        // dd($userPost);

        $cities = DB::table("city_and_areas")->distinct()->get("city");


        return view("adminPanel.editPosts", compact("userPost", "cities"));


        return redirect(url('/adminDeleteDisable'));
    }



    public function editadminPost(Request $req, $id)
    {
        $post = Post::where("user_id", Auth::id())->where("id", $id)->first();
        // dd($post);
        if (!empty($post)) {

            $req->validateWithBag("addPostError", [

                "property_title" => "required",

                "property_title" => "required",
                "description" => "required",
                "price" => "required",
                "land_area" => "required",
                "contact_person_name" => "required",
                // "mobile_number" => "required|numeric|digits:13",
                "email" => "email",

            ]);


            $propertyAllFields = PropertyCategorie::where("purpose", $req->purpose)
                ->where("property_type", $req->property_type)
                ->where("property_sub_type", $req->sub_type)
                ->first();

            ///////converting every unit into marla ///////

            switch ($req->unit) {

                case "kanal":
                    $marla = $req->land_area * 20;
                    break;

                case "square_feet":
                    $marla = $req->land_area / 272;
                    break;

                case "square_yards":
                    $marla = $req->land_area / 30.25;
                    break;


                case "marla":
                    $marla = $req->land_area;
                    break;
            }

            if ($req->floaring) {
                $floaringString = implode(",", $req->get('floaring'));
            } else {
                $floaringString = "NULL";
            }
            if ($req->electricity) {
                $electricityString = implode(",", $req->get('electricity'));
            } else {
                $electricityString = 'NULL';
            }

            if ($req->amenities) {
                $amenitiesString = implode(",", $req->get('amenities'));
            } else {
                $amenitiesString = '';
            }


            if ($req->mainimage != null) {


                if ($image = $req->file('mainimage')) {
                    $destinationPath = 'mainimage/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    $input['mainimage'] = "$profileImage";
                    $post->mainimage = $profileImage;
                }
            }

            $post->property_title = $req->property_title;
            $post->description = $req->description;
            $post->price = $req->price;
            $post->land_area = $marla;
            $post->bedrooms = $req->bedroom;
            $post->bathrooms = $req->bathroom;
            $post->sub_type_plot = $req->sub_type_plot;
            $post->sub_type_type = $req->sub_type_type;

            $post->address = $req->address;
            $post->floaring = $floaringString;
            $post->electricitybackup = $electricityString;
            $post->year = $req->year;

            // $post->city_area_id = $req->city_area;

            $post->contact_person_name = $req->contact_person_name;
            $post->mobile_number = $req->mobile_number;
            $post->mobile2_number = $req->mobile2_number;
            $post->email = $req->email;

            $post->video_link = $req->video_link;
            $post->amenities = $amenitiesString;
            $post->property_categorie_id = $propertyAllFields->id;
            $post->disable = 0;

            if ($req->image != null) {

                if ($files = $req->file('image')) {
                    foreach ($files as $file) {
                        $image_name = md5(rand(1000, 10000));
                        $ext = strtolower($file->getClientOriginalExtension());
                        $image_full_name = $image_name . '.' . $ext;
                        $upload_path = 'propertyImages';
                        $image_url = $upload_path . $image_full_name;
                        $file->move($upload_path, $upload_path . $image_full_name);
                        $image = $image_url;

                        PostImage::create([
                            'img_name' => $image,
                            'post_id' => $post->id,
                            'img_path' => $upload_path

                        ]);
                    }
                }
            }

            $post->save();

            // ///////////saving image and deleting old image///////////////////
            // if ($req->image != null) {

            //     ///getting old images
            //     $postImages = PostImage::where("post_id", $post->id)->get();

            //     ///deleting old images
            //     foreach ($postImages as $image) {

            //         unlink(public_path("public/propertyImages/" . $image->img_path));
            //         $image->delete();
            //     }


            //     $i = 0;
            //     while (count($req->image) > $i) {

            //         $imageName = Storage::disk("public_main")->put('propertyImages', $req->image[$i]);
            //         $imagePath = substr($imageName, 15);

            //         PostImage::create([
            //             "img_name" => $imagePath,
            //             "post_id" => $post->id,
            //             "img_path" => $imagePath

            //         ]);


            //         $i++;
            //     }
            // }
            return redirect()->back()->with("msg", "post edited succesfully");
        }


        return redirect()->back()->with("msg", "their is some kind of network issue");
    }


    //coins modules
    public function freshesView()
    {
        $rates = Fresh::latest()->get();

        return view('superAdmin.addFreshRatesView', compact('rates'));
    }

    public function addFreshesRates(Request $req)
    {

        $req->validate(
            [
                'coin_rate' => 'required',
                'hot_post_rate' => 'required',
                'super_hot_post_rate' => 'required',
            ]
        );
        Fresh::create(
            [
                'coin_rates' => $req->coin_rate,
                'hot_rates' => $req->hot_post_rate,
                'superhot_rates' => $req->super_hot_post_rate
            ]
        );
        return redirect()->back()->with('message', 'Rates Successfully Added');
    }
    public function editFreshView(Request $req, $id)
    {
        $updateRate = Fresh::where('id', $id)->first();
        return view('superAdmin.addFreshRatesView', compact('updateRate'));
    }
    public function updateFreshRate(Request $req, $id)
    {

        $rates = Fresh::find($id);
        $rates->coin_rates = $req->coin_rate;
        $rates->hot_rates = $req->hot_post_rate;
        $rates->superhot_rates = $req->super_hot_post_rate;
        $rates->save();
        return redirect('/freshes/rates')->with('message', 'Rate updated');
    }
    public function pricingView()
    {
        $freshRates = Fresh::latest()->first();

        return view('adminPanel.Pricing', compact('freshRates'));
    }
    public function BuyCoinView()
    {
        $freshRates = Fresh::latest()->first();

        return view('adminPanel.buyCoins', compact('freshRates'));
    }
    public function addToRequestCoin(Request $req)
    {

        $req->validate(
            [
                'coins' => 'required',
            ]
        );
        $freshes = Fresh::with('userCoinsReq')->latest()->first();
        if ($freshes) {
            $userAcc = UserCoinRequest::where('user_id', Auth::id())->latest()->first();

            if (is_null($userAcc)) {
                $newAcc = new UserCoinRequest();
                $newAcc->user_id = Auth::id();
                $newAcc->coins = $req->coins;
                $newAcc->allow_coins = 'no';
                $newAcc->rupees = $freshes->coin_rates * $req->coins;
                $newAcc->freshes_id = $freshes->id;
                $newAcc->save();
                return redirect()->back();
            } elseif ($userAcc->allow_coins == 'no') {
                return redirect()->back()->with('buyCoins', 'Please Wait For Your Last Request To Approved');
            } elseif ($userAcc->allow_coins == 'yes') {
                $newAcc = new UserCoinRequest();
                $newAcc->user_id = Auth::id();
                $newAcc->coins = $req->coins;
                $newAcc->allow_coins = 'no';
                $newAcc->rupees = $freshes->coin_rates * $req->coins;
                $newAcc->freshes_id = $freshes->id;
                $newAcc->save();
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    ///user approval for coin request
    public function allCoinRequest()
    {
        $coinReq = UserCoinRequest::with('User')->where('allow_coins', 'no')->get();

        return view('superAdmin.coinRequests', compact('coinReq'));
    }
    public function approveCoinRequest($user, $coins, $id)
    {


        $userAcc = UserAccount::where('user_id', $user)->first();
        //if already exist
        if (is_null($userAcc)) {
            $newAcc = new UserAccount();
            $newAcc->user_id = $user;
            $newAcc->coins = $coins;

            $newAcc->save();
        } else {
            $userAcc->coins += $coins;

            $userAcc->save();
        }



        $reqApproved = UserCoinRequest::where('id', $id)->first();

        if ($reqApproved->allow_coins == 'no') {
            $reqApproved->allow_coins = 'yes';
            $reqApproved->save();
            return redirect()->back();
        }
    }

    public function showApprovedCoins()
    {
        $approvedCoins = UserCoinRequest::with('User', 'freshe')->where('allow_coins', 'yes')->get();
        // dd($approvedCoins);
        return  view('superAdmin.coinRequests', compact('approvedCoins'));
    }

    public function boastPost($post_id, $cat)
    {

        $currentRates = Fresh::latest()->first();



        if (!is_null($currentRates)) {

            if (Auth::user()->Account) {

                if (Auth::user()->Account->coins >= $currentRates->{$cat . '_rates'}) {
                    //if have enough coins

                    $newPostReq = new UserPostReq();
                    $newPostReq->user_id = Auth::id();
                    $newPostReq->post_id = $post_id;
                    $newPostReq->boast_cat = $cat;
                    $newPostReq->coins = $currentRates->{$cat . '_rates'};
                    $newPostReq->rupees = $currentRates->{$cat . '_rates'} * $currentRates->coin_rates;
                    $newPostReq->freshes_id = $currentRates->id;
                    $newPostReq->save();

                    $post = Post::find($post_id);
                    $post->post_boaster = $cat;
                    $post->save();

                    $m = Auth::user()->Account;
                    $m->coins -= $currentRates->{$cat . '_rates'};
                    $m->save();
                    return redirect()->back()->with('message', 'Your Property Has Been Boasted');
                } else {
                    return redirect()
                        ->route('CoinBuy')
                        ->with('buyCoins', 'You Dont Have Enough Coins. Please Buy Coins To Boast Your Post');
                }
            } else {
                return redirect('/coin/buy')->with('buyCoins', 'Please buy some coins');
            }
        } else {
            return redirect()->back()->with('message', 'Admin is not set pricing yet');
        }
    }

    //show request to admin
    public function allPostrequests()
    {
        $postReq = UserPostReq::with('user', 'post')->get();

        return view('superAdmin.postRequests', compact('postReq'));
    }

    // public function allowBoasterPost($post_id,$boaster_id,$boaster_cat,$coins,$rupees,$user_id)
    // {

    //     $boaster=UserPostReq::where('id',$boaster_id)->first();
    //     if(!is_null($boaster)){
    //         $boaster->allow_boast='yes';
    //         $boaster->save();
    //     }
    //     $post=Post::where('id',$post_id)->first();
    //     if(!is_null($post)){
    //         $post->post_boaster=$boaster_cat;
    //         $post->save();

    //     }
    //     $deduct=UserAccount::where('user_id',$user_id)->first();

    //     $deduct->coins -= $coins;
    //     $deduct->RS -=$rupees;
    //     $deduct->save();
    //     return redirect()->back();
    // }

    // public function allApprovedPost()
    // {
    //     $approvePost=UserPostReq::with('user','post')->get();
    //     return view('superAdmin.postRequests',compact('approvePost'));
    // }


    public function singlePageAgency($id)
    {
        $singleAgency = Agencie::with('user.post')->where('id', $id)->first();

        $favPost = AddToFavorite::where('user_id', Auth::id())->get();
        return view('singleAgency', compact('singleAgency', 'favPost'));
    }
    
    public function dealerDetails()
    {
        $posts=AddSociety::latest()->get();
        return view('dealer.dealerIndex', compact('posts'));
    }


    public function dealerAddSocietycreate()
    {
        return view('dealer.dealerAddPost');
    }


    public function dealerAddSociety(Request $req)
    {
        $req->validate([
          'title' => 'required|unique:add_societies,title',
            'image' => 'required',       
            ]);
        $rating = new AddSociety();
        $rating->title = $req->title;
        $rating->plot_size = $req->plot_size;
         if ($req->image != null) {
            if ($image = $req->file('image')) {
                $destinationPath = 'dealerimage/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
                $rating->image = $profileImage;
            }
        }
        $rating->save();
        return redirect()->back()->with('message','DealerAddSociety Create Sucessfull');
    }


    public function deleteDealerPost($id)
    {


        $post = AddSociety::where('id', $id)->first();

        if (!empty($post)) {

            $post->delete();
        }

        return redirect()->back();
    }

    public function dealerEdit($id)
    {
        $post = AddSociety::find($id);
        return view('dealer.dealerEditPost',compact('post'));

    }


    public function dealerUpdate(Request $req , $id)
    {
      
        $rating = AddSociety::find($id);
        $rating->title = $req->title;
        $rating->plot_size = $req->plot_size;
          if ($req->image != null) {
            if ($image = $req->file('image')) {
                $destinationPath = 'dealerimage/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
                $rating->image = $profileImage;
            }
        }
        $rating->update();
        return redirect()->back()->with('message','Distributor update Sucessfull');
    }
    
     public function getAllDealerSociety()
    {
        $posts = DealerAddSociety::latest()->with('societyPicture','user')->get();
        return view('dealer.allDealer', compact('posts'));

    }

    public function adminSocietyEdit($id)
    {
        $post = DealerAddSociety::find($id);
        return view('dealer.editAdminSociety',compact('post'));

    }

    public function deleteAdminSociety($id)
    {


        $post = DealerAddSociety::where('id', $id)->first();

        if (!empty($post)) {

            $post->delete();
        }
        return redirect()->back()->with('message',' Delete Sucessfull');
    }


    public function adminSocietyUpdate(Request $req , $id)
    {
      
        $rating = DealerAddSociety::find($id);
        $rating->title = $req->title;
        $rating->selected_plot_sizes = $req->selected_plot_sizes;
        $rating->own_payment = $req->own_payment;
        $rating->down_payment = $req->down_payment;
        $rating->last_down_payment = $req->last_down_payment;
        $rating->last_own_payment = $req->last_own_payment;
        $rating->update();
        
         $images = SocietyPicture::where('dealer_add_society_id', $id)->get();
        foreach ($images as $image) {
            if (!in_array($image->id, $req->input('images', []))) {
                Storage::delete($image->path);
                $image->delete();
            }
        }
        // Loop through each uploaded image.
        if ($files = $req->file('image')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'societyPicture/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $upload_path . $image_full_name);
                $image = $image_url;

                $productImage = new SocietyPicture();
                $productImage->image = $image;
                $productImage->dealer_add_society_id = $rating->id;
                $productImage->save();
            }

        }
        
        return redirect()->back()->with('message','Distributor update Sucessfull');
    }


}
