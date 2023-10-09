<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use App\Models\AddToFavorite;
use App\Models\Adminagencies;
use App\Models\Agencie;
use App\Models\blog;
use App\Models\blogImage;
use App\Models\forgotPassword;
use App\Models\Lahore;
use App\Models\PhoneNumberVarification;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostViews;
use Illuminate\Support\MessageBag;
use App\Models\PropertyCategorie;
use App\Models\RequestAnAgent;
use App\Models\User;
use App\Models\CityAndArea;
use App\Models\Fresh;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Return_;

class mainController extends Controller
{
    public function indexView()
    {
        // dd(User::where('google_id','10635473357604182573')->first());
        $latestPostLimit = 8;

        $latestPost = Post::with(["postImagesOne", "postViews", "propertyCate", "agencies", "favPostUser", "user"])->where('admin_post', null)->where('disable', '0')->latest()->limit($latestPostLimit)->reorder('post_boaster', 'DESC')->get();
        $allPost = Post::with(["postImages", "postViews", "propertyCate", "cityAndArea"])->where('admin_post', 1)->get();
        $citys = CityAndArea::with(["cityAndArea"])->get();
        $cities = DB::table("city_and_areas")->distinct()->get("city");
        $alllocation = DB::table("city_and_areas")->distinct()->get("area");
        $subtypee = DB::table("property_categories")->distinct()->get("property_sub_type");

        $showlatestPost = DB::table('posts')
            ->orwhere('users.role', 1)
            ->orwhere('users.role', 3)
            ->join('property_categories', 'posts.property_categorie_id', '=', 'property_categories.id')
            ->join('city_and_areas', 'posts.city_area_id', '=', 'city_and_areas.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->latest()->limit($latestPostLimit)
            // ->reorder('post_boaster', 'DESC')
            ->reorder('posts.created_at', 'DESC')
            ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
            ->get();

        // dd($showlatestPost);

        $showlatestPost2 = DB::table('posts')
            ->orwhere('users.role', 1)
            ->orwhere('users.role', 3)
            // ->where('admin_post', 1)
            // ->join('post_images', 'posts.id', '=' , 'post_images.post_id')
            ->join('city_and_areas', 'posts.city_area_id', '=', 'city_and_areas.id')
            //->join('post_views', 'posts.id', '=' , 'post_views.post_id')
            ->join('property_categories', 'posts.property_categorie_id', '=', 'property_categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->skip($latestPostLimit)->take($latestPostLimit)
            ->reorder('posts.created_at', 'DESC')
            // ->reorder('post_boaster', 'DESC')
            ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
            ->get();

        $showReallatestPost = DB::table('posts')
            // ->where('admin_post', null)
            // ->join('post_images', 'posts.id', '=' , 'post_images.post_id')
            //->join('post_views', 'posts.id', '=' , 'post_views.post_id')
            ->join('city_and_areas', 'posts.city_area_id', '=', 'city_and_areas.id')
            ->join('property_categories', 'posts.property_categorie_id', '=', 'property_categories.id')
            ->latest()->limit($latestPostLimit)->reorder('posts.created_at', 'DESC')
            ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
            ->get();

        $showReallatestPost2 = DB::table('posts')
            // ->where('admin_post', null)
            // ->join('post_images', 'posts.id', '=' , 'post_images.post_id')
            //->join('post_views', 'posts.id', '=' , 'post_views.post_id')
            ->join('city_and_areas', 'posts.city_area_id', '=', 'city_and_areas.id')
            ->join('property_categories', 'posts.property_categorie_id', '=', 'property_categories.id')
            ->skip($latestPostLimit)->take($latestPostLimit)->reorder('posts.created_at', 'DESC')
            ->select('posts.*', 'property_categories.*', 'city_and_areas.*',  'posts.id as id')
            ->get();



        $allPost = Post::with(["postViews", "propertyCate", "cityAndArea"])->where('admin_post', 1)->get();
        ////////post added by admin fetch in view////////
        // dd($allPost);
        $adminPost = Post::with(["postViews", "propertyCate", "agencies"])->where('admin_post', 1)->get();

        $favPost = AddToFavorite::where('user_id', Auth::id())->get();

        $featureAgencies = Agencie::with('user')->get();
        $agencies = Adminagencies::get();

        $special = Post::with(["postImagesOne", "postViews", "propertyCate", "agencies", "favPostUser", "user"])->where('admin_post', null)->where('disable', '0')->latest()->limit(11)->reorder('post_boaster', 'DESC')->get();

        $specialPost = $this->specialPostSort($special, $latestPostLimit);

        $allPostNumber = count(Post::all());
        $allAgentNumber = count(Agencie::all());
        //////reading data from json file
        $jsonFile = Storage::disk("public_main")->get("json/data.json");
        $phpObj = json_decode($jsonFile, true);
        $allSoldProperty = $phpObj["allSoldPostNum"];
        $blogs = blog::with("blogOneImage")->paginate(12);

        return view('index', compact('allPost', 'blogs', 'subtypee', 'cities', 'agencies', 'alllocation', 'showReallatestPost2', 'showReallatestPost', 'latestPost', 'showlatestPost2', 'showlatestPost', 'adminPost', 'featureAgencies', 'favPost', "allSoldProperty", "allPostNumber", "allAgentNumber", "specialPost"));
    }
    private function specialPostSort($posts, $limit)
    {
        $data = [];
        for ($i = $limit; $i < count($posts); $i++) {
            $data[] = $posts[$i];
        }
        return $data;
    }

    public function rentResidentialView()
    {
        $allRCP = $this->universalForRentAndSale("rent", "residential");
        // dd($allRCP);
        $favPost = AddToFavorite::where('user_id', Auth::id())->get();

        $cities = DB::table("city_and_areas")->distinct()->get("city");
        $location = DB::table("city_and_areas")->distinct()->get("area");
        $subtypee = DB::table("property_categories")->distinct()->get("property_sub_type");

        return view('rent.residential', compact("allRCP", "subtypee", "cities", "favPost","location"));
    }

    public function rentCommercialView()
    {
        ///allRentCommercialProperty
        $allRCP = $this->universalForRentAndSale("rent", "commercial");
        $cities = DB::table("city_and_areas")->distinct()->get("city");
        $location = DB::table("city_and_areas")->distinct()->get("area");
        $favPost = AddToFavorite::where('user_id', Auth::id())->get();
        $subtypee = DB::table("property_categories")->distinct()->get("property_sub_type");

        return view('rent.search', compact('allRCP', "subtypee", "cities", "favPost" ,"location"));
    }

    public function saleResidentialView()
    {

        $allRCP = $this->universalForRentAndSale("sale", "residential");
        $cities = DB::table("city_and_areas")->distinct()->get("city");
        $location = DB::table("city_and_areas")->distinct()->get("area");

        $favPost = AddToFavorite::where('user_id', Auth::id())->get();
        $subtypee = DB::table("property_categories")->distinct()->get("property_sub_type");

        return view('sale.residential', compact("allRCP", "subtypee", "cities", "favPost" ,"location"));
    }

    public function saleCommercialView()
    {

        $allRCP = $this->universalForRentAndSale("sale", "commercial");
        $cities = DB::table("city_and_areas")->distinct()->get("city");
        $location = DB::table("city_and_areas")->distinct()->get("area");

        $favPost = AddToFavorite::where('user_id', Auth::id())->get();
        $subtypee = DB::table("property_categories")->distinct()->get("property_sub_type");
        // dd($allRCP);
        return view('sale.commercial', compact('allRCP', "cities", "subtypee", "favPost","location"));
    }


    public function postAddView()
    {
        $cities = DB::table("city_and_areas")->distinct()->get("city");

        return view('adminPanel.postAdd', compact("cities"));
    }

    public function postAdd(Request $req)
    {

        // dd($req->all());

        $req->validateWithBag("addPostError", [

            "property_title" => "required",
            "description" => "required",
            "price" => "required",
            "land_area" => "required",
            'mainimage' => 'required|mimes:jpeg,png',
            "contact_person_name" => "required",
            "mobile_number" => "required|numeric|digits:12",
            "email" => "email",
            "year" => "required|integer",


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

        // if($req->mobile_number  or $req->mobile2_number)
        // {
        //     $var= '+92';
        //     $varr=$req->mobile_number;
        //     $var .= $varr;

        //     $mobb='+92';
        //     $mob=$req->mobile2_number;
        //     $mobb .=$mob;

        // }

        $postCreated = Post::create([
            "property_title" => $req->property_title,
            "description" => $req->description,
            "price" => $req->price,
            "land_area" => $marla,
            "bedrooms" => $req->bedroom,
            "bathrooms" => $req->bathroom,
            "video_link" => $req->video_link,
            "amenities" => $amenitiesString,
            "year" => $req->year,
            "floaring" => $floaringString,
            "electricitybackup" => $electricityString,
            "sub_type_type" => $req->sub_type_type,
            "sub_type_plot" => $req->sub_type_plot,
            "city_area_id" => $req->city_area,
            "address" => $req->address,
            "year" => $req->year,
            "mainimage" => $req->mainimage,
            "contact_person_name" => $req->contact_person_name,
            "mobile_number" => $req->mobile_number,
            "mobile2_number" => $req->mobile2_number,
            "email" => $req->email,
            "user_id" => Auth::id(),
            "property_categorie_id" => $propertyAllFields->id,
            "disable" => '0',

        ]);

        ///////////saving image///////////////////

        if ($req->image != null) {
            $i = 0;
            while (count($req->image) > $i) {

                $imageName = Storage::disk("public_main")->put('propertyImages', $req->image[$i]);
                $imagePath = substr($imageName, 15);

                PostImage::create([
                    "img_name" => $imagePath,
                    "post_id" => $postCreated->id,
                    "img_path" => $imagePath

                ]);

                $i++;
            }
        }
        return back()->with("success", "Post succesfully inserted");
    }

    public function editProfileView()
    {
        $user = Auth::user();
        //    dd($user);
        return view('adminPanel.editprofile', ['user' => $user]);
    }

    public function editProfileSubmit(Request $request)
    {
        if (Auth()->check()) {

            $validatedData = $request->validate([
                'new_user_name' => ['required'],
                'new_email' => ['required'],
                // 'old_password' => ['required'], 
                //  'new_password' => ['required'], 
                // 'new_mobile_number' => 'required',
            ]);

            if ($validatedData) {
                if ($request->old_password and $request->new_password) {
                    if (auth()->user()->password != null) {
                        if (!Hash::check("@*!@#$@#!%^@-!@!+_@)#*$(!@@#!", auth()->user()->password)) {
                            if (!Hash::check($request->old_password, auth()->user()->password)) {

                                return redirect()->back()->with('passNotMatch', 'old password not matched');
                            }
                        }
                    }
                } else {

                    $user = User::where("id", Auth::id())->first();

                    if ($request->new_password != null) {
                        $newPassword = Hash::make($request->new_password);
                        $user->password = $newPassword;
                    }


                    $user->name = $request->new_user_name;
                    $user->email = $request->new_email;


                    if ($user->mobile_number != $request->new_mobile_number) {
                        $checkNewPhoneExists = User::where("mobile_number", $request->new_mobile_number)->first();
                        //dd($checkNewPhoneExists);
                        if (empty($checkNewPhoneExists)) {

                            $user->mobile_number = $request->new_mobile_number;

                            $userPhone = $user->getPhone()->first();

                            if ($userPhone) {
                                $userPhone->verified = 0;
                                $userPhone->save();
                            }
                        } else {


                            return back()->with("msg", "Phone Already exists");
                        }
                    }


                    //$user->role = '3';
                    $user->save();
                }

                return redirect()->back()->with("success", "Profile edit successfuly");
            }
        }
    }

    public function getAreasAccordingCity($city)
    {
        $areas = CityAndArea::where("city", $city)->get();

        return $areas;
    }

    public function getAreasAccordingtype($property_type)
    {
        $types = PropertyCategorie::where("property_type", $property_type)->get();
        return $types;
    }

    public function uploadUserProfile(Request $request)
    {


        if ($request->hasFile('image')) {



            $filename = $request->image->getClientOriginalName();

            if (auth()->user()->img_path) {

                unlink(auth()->user()->img_path);
            }

            $randomName = rand();
            //store new file in project
            $request->image->storeAs('profilePic', $randomName . $filename, 'public_main');

            $user = Auth::user();
            $user->img_path = 'profilePic/' . $randomName . $filename;
            $user->save();

            return redirect()->back();
        } else {
            return redirect()->back()->with('message', 'please choose an image');
        }
    }
    public function dashboredView()
    {
        $post = Post::with('postImagesOne')->where('user_id', Auth::id())->get();

        $postViews = PostViews::with('post')->where('user_id', Auth::id())->first();

        $soldPost = Post::where('user_id', Auth::id())->where('sold', 1)->get();

        $favPost = AddToFavorite::where('user_id', Auth::id())->get();
        $likes = AddToFavorite::where('user_id', '!=', Auth::id())->get();

        $hotPost = $post->where('post_boaster', 'hot');

        $superHot = $post->where('post_boaster', 'superhot');

        $soldHot = $hotPost->where('sold', 1);
        $soldSuperHot = $superHot->where('sold', 1);

        $latestfivePost = Post::with('postImagesOne')->where('user_id', Auth::id())->latest()->limit(6)->get();

        $boasted = Post::with('postImagesOne')->where('post_boaster', 'superhot')->orWhere('post_boaster', 'hot')->get();


        return view("adminPanel.dashbored", compact(
            'post',
            'soldPost',
            'postViews',
            'favPost',
            'likes',
            'hotPost',
            'superHot',
            'soldHot',
            'soldSuperHot',
            'latestfivePost',
            'boasted',
        ));
    }

    public function editPostView($id)
    {
        ///with eager loading .. loaded relationship which is define in model
        $userPost = Post::with(["postImages", "cityAndArea", "propertyCate"])
            ->where("id", $id)->first();

        $cities = DB::table("city_and_areas")->distinct()->get("city");

        $citi = DB::table("city_and_areas")->distinct()->get("area");

        $postimgs = DB::table("post_images")->distinct()->where("post_id", $id)->get();


        return view("adminPanel.editPosts", compact("userPost", "citi", "cities", "postimgs"));


        return redirect(url('/dashbored'));
    }


    public function allPostView()
    {
        // $userPostCheck = Post::where("user_id", Auth::id())->first();
        //dd($userPostCheck);

        $userAllPost = Post::select(
            "posts.*",
            "property_categories.purpose",
            "property_categories.property_type",
            "property_categories.property_sub_type",
            DB::raw("(select post_images.img_path from post_images where post_id = posts.id limit 1) as img")
        )->with('postViews')

            ->join("property_categories", "posts.property_categorie_id", "property_categories.id")
            ->where("posts.user_id", Auth::id())

            ->get();

        $rates = Fresh::latest()->first();

        return view('adminPanel.postTable', compact("userAllPost", "rates"));
    }


    public function deletePost($id)
    {


        $post = Post::where('id', $id)->with("postImages")->first();

        if (!empty($post)) {

            $post->delete();
        }

        return redirect()->back();
    }
    public function editPost(Request $req, $id)
    {
        $post = Post::where("id", $id)->first();
        if (!empty($post)) {

            $req->validateWithBag("addPostError", [
                "property_title" => "required",
                "property_title" => "required",
                "description" => "required",
                "price" => "required",
                "land_area" => "required",
                "contact_person_name" => "required",
                "mobile_number" => "required|numeric|digits:12",
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

            if ($req->mainimage != null) {


                if ($image = $req->file('mainimage')) {
                    $destinationPath = 'mainimage/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    $input['mainimage'] = "$profileImage";
                    $post->mainimage = $profileImage;
                }
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
            $post->property_title = $req->property_title;
            $post->description = $req->description;
            $post->land_area = $marla;
            $post->bedrooms = $req->bedroom;
            $post->price = $req->price;
            $post->bathrooms = $req->bathroom;

            $post->address = $req->address;
            $post->sub_type_plot = $req->sub_type_plot;
            $post->sub_type_type = $req->sub_type_type;
            $post->year = $req->year;
            $post->floaring = $floaringString;
            $post->electricitybackup = $electricityString;

            // $post->city_area_id = $req->city_area;

            $post->contact_person_name = $req->contact_person_name;
            $post->mobile_number = $req->mobile_number;
            $post->mobile2_number = $req->mobile2_number;
            $post->email = $req->email;

            $post->video_link = $req->video_link;
            $post->amenities = $amenitiesString;
            $post->property_categorie_id = $propertyAllFields->id;
            $post->disable = 0;
            $post->id = $id;

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

            $post->update();

            return redirect()->back()->with("msg", "post edited succesfully");
        }

        return redirect()->back()->with("msg", "their is some kind of network issue");
    }


    public function singlePageAddView($title, $id)
    {

        $latestPost = Post::with(["postImagesOne", "postViews", "propertyCate", "agencies", "favPostUser", "user"])->where('admin_post', null)->latest()->limit(6)->get();
        //   dd($latestPost);
       foreach($latestPost as $post) {
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


        ////////add views to post////////


        $this->addPostViews(Auth::id(), $id);

        ////////add views to post end////////

        $post = Post::where("id", $id)
            ->with(["cityAndArea", "postImages", 'user', "postViews", "propertyCate", "favPostUser"])
            ->first();

        //    dd($post);

        $convert = $post->price;
        // dd($convert);

        function count_digit($convert)
        {
            return strlen($convert);
        }

        function divider($number_of_digits)
        {
            $tens = "1";

            if ($number_of_digits > 8)
                return 10000000;

            while (($number_of_digits - 1) > 0) {
                $tens .= "0";
                $number_of_digits--;
            }
            return $tens;
        }
        //function call
        $num = $convert;
        $ext = ""; //thousand,lac, crore
        $number_of_digits = count_digit($num); //this is call :)
        if ($number_of_digits > 3) {
            if ($number_of_digits % 2 != 0)
                $divider = divider($number_of_digits - 1);
            else
                $divider = divider($number_of_digits);
        } else
            $divider = 1;

        $fraction = $num / $divider;
        $fraction = number_format($fraction, 2);
        if ($number_of_digits == 4 || $number_of_digits == 5)
            $ext = "Thousand";
        if ($number_of_digits == 6 || $number_of_digits == 7)
            $ext = "Lakh";
        if ($number_of_digits == 8 || $number_of_digits == 9)
            $ext = "Crore";
        $price = $fraction . " " . $ext;

        if (!$post) {
            abort(404);
        }


        //for message form
        $alreadyHaveReq = RequestAnAgent::with('post')->where('user_id', Auth::id())->where('post_id', $id)->get();
        // dd($post->id);
        $favPost = AddToFavorite::where('user_id', Auth::id())->where('post_id', $post->id)->get();
        $favAllPost = AddToFavorite::where('user_id', Auth::id())->get();
        // dd($favPost);
        // foreach($favPost as $fav){
        //     if($fav->post_id == $post->id){
        //        dd($favPost);
        //     }
        // }

        return view('single-property', compact('post',  'alreadyHaveReq', 'price', 'favPost', 'latestPost', 'favAllPost'));
    }


    public function universalForRentAndSale($purpose, $type)
    {
        $allpost = Post::with(["propertyCate", "postViews", "postImagesOne"])->where('disable', '0')->whereHas("propertyCate", function ($query) use ($purpose, $type) {
            $query->where("purpose", $purpose)->where("property_type", $type);
        });
        $post = $allpost->orderBy('post_boaster', 'DESC')->latest('created_at')->paginate(6);
        return $post;
    }
    public function agencyView()
    {

        $recordExistsOrNot = Agencie::where("user_id", Auth::id())->first();
        $cities = DB::table("city_and_areas")->distinct()->get("city");
        $check = true;
        if (!empty($recordExistsOrNot)) {
            //  dd("asd");
            return view("adminPanel.agency", compact("check", "recordExistsOrNot", "cities"));
        }
        return view("adminPanel.agency", compact("cities"));
    }

    public function agencyAdd(Request $req)
    {

        if ($req->exists('check')) {

            $req->validate([
                "name" => ['required'],
                "address" => ['required'],
                "image" => ['required'],
                'description' => ['required'],
            ]);

            ///delete old image
            $agency = Agencie::where("user_id", Auth::id())->first();

            //dd(public_path() . "/" . $agency);
            if (file_exists(public_path() . "/" . $agency->logo)) {
                unlink($agency->logo);
            }

            $path = $req->file('image')->store("agencyLogo", "public_main");

            $agency->name = $req->name;
            $agency->address = $req->address;
            $agency->logo = $path;
            $agency->city = $req->city;
            $agency->description = $req->description;
            $agency->save();

            return back()->with("success", "successfully record edited");
        }

        //////for add new agency first time
        $path = $req->file('image')->store("agencyLogo", "public_main");
        //dd($path);

        Agencie::create([

            "name" => $req->name,
            "address" => $req->address,
            "logo" => $path,
            "city" => $req->city,
            "user_id" => Auth::id(),
            'description' => $req->description,
        ]);
        return back()->with("success", "successfully record added");
    }
    public function addPostViews($user_id, $post_id)
    {
        if (Auth::check()) {
            PostViews::firstOrCreate(["user_id" => $user_id, "post_id" => $post_id]);
        }
    }
    public function verificationView()
    {
        $codeNumber = $this->sendCodeToMobile();

        PhoneNumberVarification::updateOrCreate(
            ["user_id" => Auth::id()],

            [
                "code" => $codeNumber,
                "verified" => 0
            ]
        );
        $userNumber = User::where("id", Auth::id())->first();
        $userNumber = $userNumber->mobile_number;
        return view('adminPanel.smsVerification', compact('userNumber'));
    }

    public function sendCodeToMobile($signUpMobileNo = null)

    {;
        $username = '923248430329';
        $password = "umair786";
        $reciverMobile = ($signUpMobileNo) ? $signUpMobileNo : Auth::user()->mobile_number;
        // dd($reciverMobile);
        //$reciverMobile = "923064389204";
        $sender = "SYED ZAMEEN";


        $randomNumber = rand(1000, 9999);
        $message = "Phone confirmation code '" . $randomNumber . "'  SYED ZAMEEN ";

        //dd($randomNumber);
        $response = Http::asForm()->post("https://sendpk.com/api/sms.php", [
            "username" => $username,
            "password" => $password,
            "sender" => $sender,
            "mobile" => $reciverMobile,
            "message" => $message


        ]);

        //$randomNumber = rand(1000, 9999);

        return $randomNumber;
    }

    public function finalizePhone(Request $req)
    {

        $phone = PhoneNumberVarification::where("user_id", Auth::id())
            ->where("code", $req->code)
            ->first();
        if (!empty($phone)) {
            if ($phone->verified == 1) {
                return redirect(route("dashbored"))->with("msg", "phone number is already verified");
            }

            $phone->verified = 1;
            $user = Auth::user();
            $user->role = 3;
            $user->save();
            $phone->save();
            $msg = "Phone number is succesfully verified ";
        } else {
            $msg = "code is incorrect , check your phone for new code ";
            return back()->with("msg", $msg);
        }

        return redirect(route('dashbored'))->with("msg", $msg);
    }
    public function numberView()
    {
        return view("smsVerification-change-phone");
    }
    public function changeNumber(Request $req)
    {       ////check for existing mobile number except current user/////
        $checkForExistingMobile = User::where("mobile_number", $req->phone)
            ->where("id", '!=', Auth::id())
            ->first();

        if (empty($checkForExistingMobile)) {
            $user = User::where("id", Auth::id())->first();
            $user->mobile_number = $req->phone;
            $user->save();
            $userPhone = $user->getPhone()->first();
            $userPhone->verified = 0;
            $userPhone->save();

            return $this->verificationView();
        }

        return back()->with("msg", "Phone number already exist");
    }
    public function getProperty($property)
    {

        $property = PropertyCategorie::where("property_type", $property)
            ->distinct()
            ->get('property_sub_type');

        return $property;
    }

    public function signupView()
    {
        return view('signup');
    }

    public function forgotPasswordView($diffView = "forgotView")
    {
        ///below variable is created  for changing view without creating new file

        $view = $diffView;
        return   view("forgot-password", compact("view"));
    }

    public function forgotPasswordPost(Request $req)
    {

        $req->validate(['number' => 'required']);

        $user = User::where("mobile_number", $req->number)->first();

        if (!empty($user)) {

            $code = $this->sendCodeToMobile($req->number);

            forgotPassword::updateOrCreate(
                ["user_id" => $user->id],
                ["code" => $code]
            );
            /////below variable used for the purpose of
            //changing view without creating another file with the help of if else
            $enterCode = "";

            $userID = $user->id;
            return view("forgot-password", compact("enterCode", "userID"));
        } else {
            $msg = "no account found associated with this mobile number ";

            return redirect()->back()->with('msg', $msg);
        }
    }


    public function forgotFinalPost(Request $req)
    {

        $userCodeConfirm = forgotPassword::where("user_id", $req->userID)
            ->where("code", $req->code)
            ->first();

        //dd($req->code, $req->userID);
        Session::put("user_id", $req->userID);

        $userID = $req->userID;

        if (!empty($userCodeConfirm)) {
            /////user authicattion confirm here know we change his password///
            $user = User::find($req->userID);

            Auth::login($user);
            $phoneVerified = PhoneNumberVarification::where("user_id", $req->userID)->first();
            $phoneVerified->verified = 1;
            $phoneVerified->save();

            Session::forget("user_id");

            $newpassword = 1;
            $token = rand(0, 100);
            session()->put("password", 0);
            return redirect(route("editProfile"))->with("newPassword", $newpassword);
        } else {
            $msg = "wrong code ";
            $enterCode = "";
            return view('forgot-password', compact(["userID", "msg", "enterCode"]));
        }
    }


    protected function newpassword(Request $req)
    {
        $passwordLength = strlen($req->password);

        if ($passwordLength > 4 && Session::has("password")) {

            $password = hash::make($req->password);
            $userID = Auth::id();
            $user = User::find($userID);
            $user->password = $password;
            $user->save();

            session()->forget("password");

            return back()->with("success", "Succesfully password changed");
        }

        return back()->with(["newPassword" => 1, "error" => "Password should be greater then 4"]);
    }



    public function search(Request $request)
    {
        if ($request->ajax()) {


            $data = post::where('property_title', 'like', '%' . $request->search2 . '%')->get();

            $output = '';
            if (count($data) > 0) {


                foreach ($data as $row) {
                    $output .= '
                <p style="color:blue">' . $row->property_title . '</p>';
                }
            } else {
                $output .= 'No results';
            }
            return $output;
        }
    }


    function action(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = Post::select('property_title')
            ->where('property_title', 'LIKE', '%' . $query . '%')
            ->get();

        return response()->json($filter_data);
    }

    //filteration
   public function propertySearch(Request $req)
    {
        // dd($req->all());
         $req->validateWithBag("addPostError", [
            "purpose" => "required"
        ],
        [
            'purpose.required' => 'Select One from Sale Or Rent',
        ]
    );

        
        if($req->sub_type== "not_commercial")
        {
             $propertyAllFields = PropertyCategorie::where("purpose", $req->purpose)
            ->where("property_type", 'residential')
            ->where("property_sub_type", $req->sub_typee)
            ->first();
        }
        if($req->sub_typee== "not_residential")
        {
            $propertyAllFields = PropertyCategorie::where("purpose", $req->purpose)
            ->where("property_type", 'commercial')
            ->where("property_sub_type", $req->sub_type)
            ->first();
        }

        $search = $req['search'] ?? "";

        $search2 = $req->input('search2');

        $areaInArray = explode(";", $req->area);

        $priceInArray = explode(";", $req->price);

        if ($req->search2) {
            $allRCP = Post::with(["cityAndArea", "propertyCate", "postViews", "postImagesOne"])
                ->where('property_title', 'like',  "%{$search2}%")
                ->where('disable', '0')->paginate(15);
        } else {
            if ($req->beds == "null") {
                $allRCP = Post::with(["cityAndArea", "propertyCate", "postViews", "postImagesOne"])
                    ->where('city_area_id', '=',  "$req->city_area")
                    ->where('property_categorie_id', '=',  "$propertyAllFields->id")
                    ->whereBetween("land_area", $areaInArray)
                    ->whereBetween("price", $priceInArray)
                    ->where('disable', '0')
                    ->paginate(15);
            } else {
                $allRCP = Post::with(["cityAndArea", "propertyCate", "postViews", "postImagesOne"])

                    ->where('bedrooms', '=',  "$req->beds")
                    ->where('city_area_id', '=',  "$req->city_area")
                    ->where('property_categorie_id', '=',  "$propertyAllFields->id")
                    ->whereBetween("land_area", $areaInArray)
                    ->whereBetween("price", $priceInArray)
                    ->where('disable', '0')
                    ->paginate(15);
            }
        }

        $cities = DB::table("city_and_areas")->distinct()->get("city");
        $location = DB::table("city_and_areas")->distinct()->get("area");
        $subtypee = DB::table("property_categories")->distinct()->get("property_sub_type");

        return view("rent.commercial", compact(["allRCP", "cities", "subtypee", "location"]));
    }


    public function searchAgency(Request $req)
    {
        $featureAgencies = new Agencie();

        if ($req->agency_name != "" && $req->agency_name != null) {
            //dd($req->agency_name);
            $featureAgencies = $featureAgencies->where("name", "LIKE", "%$req->agency_name%");
        }
        if ($req->city != "null" && $req->city != null) {
            $featureAgencies = $featureAgencies->where("city", $req->city);
        }

        $featureAgencies = $featureAgencies->paginate('3');

        //dd($featureAgencies);
        $latestPost = Post::with(["postImagesOne", "postViews", "propertyCate", "agencies", "favPostUser", "user"])
            ->where('admin_post', null)
            ->latest()
            ->limit(6)
            ->get();

        $cities = DB::table("city_and_areas")->distinct()->get("city");

        $old_agency_name = $req->agency_name;
        $old_city = $req->city;

        $favPost = AddToFavorite::where('user_id', Auth::id())->get();

        return view("agncies", compact("old_agency_name", "old_city", "featureAgencies", 'latestPost', "cities", "favPost"));
    }
    public function soldPost($postID)
    {

        $post = Post::where("id", "$postID")->where("user_id", Auth::id())->first();
        //dd($post->sold);
        if (!empty($post)) {

            if ($post->sold == "1") {
                $post->sold = 0;
            } else if ($post->sold == null  || $post->sold == "0") {
                //dd("when sold is null ");
                $post->sold = "1";
            }
            $post->save();
            return back()->with("succes", "succesfully changed the property status");
        }

        return "no post or user Associated with this command";
    }
    public function blogView()
    {

        return view("adminPanel.blog");
    }
    
    
     public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('contentss'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }


    public function blog(Request $req)
    {
        $req->validateWithBag("blog_error", [
            "title" => "required",
            "content" => "required",
            "header" => "required"
        ]);

        if (count($req->images) > 10) {
            return back()->with("msg", "Only 10 photos are allowed");
        }

        $allValueFromRequest = $req->all("title", "content", "tags", "header");

        $allValueFromRequest["user_id"] = Auth::id();


        $blog = blog::create($allValueFromRequest);

        if (!empty($req->images)) {
            for ($i = 0; $i < count($req->images); $i++) {
                $imageName = Storage::disk("public_main")->put('blogImages', $req->images[$i]);

                $blogImage = blogImage::create([

                    "img_path" => $imageName,
                    "blog_id" => $blog->id

                ]);
            }
        }

        return back()->with("msg", "succesfully recored has been inserted");
    }


    public function blogMainView()
    {

        return view("blog");
    }


    public function blogEditView($id)
    {

        $blog = blog::find($id);

        if (!$blog) {
            abort(404);
        }
        ////following variable is used for switch the form between edit and add blog
        $editBlog = 1;

        //dd($blog);
        return view("adminPanel.blog", compact("blog", "editBlog"));
    }
    public function blogEdit(Request $req)
    {

        //dd($req->input());
        $blog = Blog::where("id", $req->blog_id)->first();

        $blog->title = $req->title;
        $blog->tags = $req->tags;
        $blog->content = $req->content;
        $blog->header = $req->header;

        if ($req->images != null) {
            ///delete old images
            $images = blogImage::where("blog_id", $blog->id)->get();

            foreach ($images as $image) {
                if (file_exists($image->img_path)) {
                    unlink($image->img_path);
                }
                $image->delete();
            }
            ///add new images

            for ($i = 0; $i < count($req->images); $i++) {

                $imageName = Storage::disk("public_main")->put('blogImages', $req->images[$i]);

                $blogImage = blogImage::create([

                    "img_path" => $imageName,
                    "blog_id" => $blog->id

                ]);
            }
        } //if end


        if ($blog->save()) {

            return redirect(route('blogAll'))->with("msg", "succesfully edited blog");
        }

        return back()->with("msg", "something went wrong");
    }

    public function blogAll()
    {
        $blogs = blog::with("blogImages")->get();
        //dd($blogs);
        return view("adminPanel.BlogDataTable", compact("blogs"));
    }

    public function deleteBlog($id)
    {
        $blog = Blog::with("blogImages")->where("id", $id)->first();

        foreach ($blog->blogImages as $image) {

            if (file_exists($image->img_path)) {
                unlink($image->img_path);
            }

            $image->delete();
        }

        $blog->delete();
        return back()->with("msg", "succesfully deleted the recored");
    }


    public function mainBlogView()
    {

        $blogs = blog::with("blogOneImage")->paginate(12);

        return view("blog", compact("blogs"));
    }

    public function blogMainSingleView($id)
    {
        $blog = blog::with("blogImages")->where("id", $id)->first();
        if (!$blog) {
            abort(404);
        }
        $blogs = blog::all();
        return view("blog-single-view", compact("blog", "blogs"));
    }
}
