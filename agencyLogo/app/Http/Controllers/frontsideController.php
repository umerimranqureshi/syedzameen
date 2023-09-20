<?php

namespace App\Http\Controllers;

use App\Models\addmanage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\AddToFavorite;
use App\Models\Adminagencies;
use App\Models\Agencie;
use App\Models\Fresh;
use App\Models\User;
use App\Models\PostImage;
use App\Models\PropertyCategorie;
use App\Models\Post;
use App\Models\RequestAnAgent;
use App\Models\UserAccount;
use App\Models\UserCoinRequest;
use App\Models\UserPostReq;
use App\Models\CityAndArea;
use App\Models\city;
use Database\Seeders\cityAndArea as SeedersCityAndArea;
use Image;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;

class frontsideController extends Controller {
    public function Sellerpostindex() {
        $posts =  Post::with( [ 'postImages', 'postViews', 'propertyCate', 'cityAndArea' ] )->where( 'user_id', '=', Auth::user()->id )->latest()->get();


        foreach($posts as $post)
        {
         $val=$post->price;
         
         if ($val >= 10000000) {
             
             $val = ($val / 10000000);

             $formattedNum = number_format($val, 2);
             $final_price= $formattedNum.' Crore';
            
         } else if ($val >= 100000) {

             $val = ($val / 100000);
             $formattedNum = number_format($val, 2);
             $final_price= $formattedNum.' Lakh';
         }
         else if($val >=1000)
         {
             $val=($val/1000);
             $formattedNum = number_format($val, 2);
             $final_price= $formattedNum.' Thousand';
           
         }
           else if($val >=1)
                {
                   $final_price= $val;
                  
                }
      
         $post->price = $final_price;
        }


        $image = DB::table( 'post_images' )->where( 'post_id' )->get();

        if ( Auth::user()->role == 3 ) {

            $allPost = Post::with( [ 'postImages', 'postViews', 'propertyCate', 'cityAndArea' ] )->get();

            return view( 'adminPanel.sellerview', compact( 'posts', 'allPost', 'image' ) );
        } else {
            abort( 400 );
        }

    }

    public function carusal( Request $req ) {
        $post = Post::with( [ 'cityAndArea', 'propertyCate', 'postViews', 'postImagesOne' ] );
        $allRCP = $post->orderBy( 'post_boaster', 'DESC' )->latest( 'created_at' )->paginate( 10 );
        $cities = DB::table( 'city_and_areas' )->distinct()->get( 'city' );

        return view( 'rent.commercial', compact( [ 'post', 'cities', 'allRCP', ] ) );

    }

    public function postAddView() {

        $cities = DB::table( 'city_and_areas' )->distinct()->get( 'city' );

        return view( 'adminPanel.useraddpost', compact( 'cities' ) );
    }

    public function UserPostAdd( Request $req ) {

    //    dd( $req->all() );

        $req->validateWithBag( 'addPostError', [

            "property_title" => "required",
            "description" => "required",
            "price" => "required",
            "land_area" => "required",
            "contact_person_name" => "required",
            // "mobile_number" => "required|numeric|digits:12",
            "email" => "email",
            "mainimage"=>"required",
            "purpose"=> "required",

        ] );
      
        $propertyAllFields = PropertyCategorie::where( 'purpose', $req->purpose )
        ->where( 'property_type', $req->property_type )
        ->where( 'property_sub_type', $req->sub_type )
        ->first();
        // dd($propertyAllFields);

        ///////converting every unit into marla ///////

        switch ( $req->unit ) {

            case 'kanal':
            $marla = $req->land_area * 20;
            break;

            case 'square_feet':
            $marla = $req->land_area / 272;
            break;

            case 'square_yards':
            $marla = $req->land_area / 30.25;
            break;

            case 'marla':
            $marla = $req->land_area;
            break;
        }

        ///////converting every unit into marla end ///////

        if ($req->floaring) {
            $floaringString = implode(",", $req->get('floaring'));
        }
        else
        {
            $floaringString="NULL";      
        }
        if($req->electricity)
        {
            $electricityString = implode(",", $req->get('electricity'));

        }
        else
        {
            $electricityString='NULL';
        }
    
       if($req->amenities)
       {
        $amenitiesString = implode(",", $req->get('amenities'));

       }
       else
       {
        $amenitiesString='';

       }
        
        if ($image = $req->file('mainimage')) {
            $destinationPath = 'mainimage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['mainimage'] = "$profileImage";
        }


        $postCreated = Post::create( [
            'property_title' => $req->property_title,
            'description' => $req->description,
            'price' => $req->price,
            'land_area' => $marla,
            'bedrooms' => $req->bedroom,
            'bathrooms' => $req->bathroom,
            'video_link' => $req->video_link,
            'address' => $req->address,
            'year' => $req->year,
            "mainimage"=>$profileImage,
            'floaring'=>$floaringString,
            "amenities"=>$amenitiesString,
            'electricitybackup'=>$electricityString,
            "sub_type_type"=>$req->sub_type_type,
            "sub_type_plot"=>$req->sub_type_plot,
            'city_area_id' => $req->city_area,
            'contact_person_name' => $req->contact_person_name,
            'mobile_number' => $req->mobile_number,
            'mobile2_number' => $req->mobile2_number,
            'email' => $req->email,
            'disable' => '0',
            'user_id' => Auth::id(),
            'property_categorie_id' => $propertyAllFields->id

        ] );

        //dd( $postCreated );

        ///////////saving image///////////////////

        $image = array();
        // dd( $req->file( 'image' ) );
     
        if ( $files = $req->file( 'image' ) ) {
            
            foreach ( $files as $file ) {
                $image_name = md5( rand( 1000, 10000 ) );
                $ext = strtolower( $file->getClientOriginalExtension() );
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'propertyImages';
                $image_url = $upload_path . $image_full_name;
                $file->move( $upload_path, $upload_path . $image_full_name );
                $image = $image_url;

                PostImage::create( [
                    'img_name' => $image,
                    'post_id' => $postCreated->id,
                    'img_path' => $upload_path

                ] );
            }
          
        }
        return back()->with( 'msg', 'Post succesfully inserted' );
    }

    public function userpostindex()  {
        $posts =  Post::with( [ 'postImages', 'postViews', 'propertyCate', 'cityAndArea' ] )->where( 'user_id', '=', Auth::user()->id )->latest()->get();


        foreach($posts as $post)
        {
         $val=$post->price;
         
         if ($val >= 10000000) {
             
             $val = ($val / 10000000);

             $formattedNum = number_format($val, 2);
             $final_price= $formattedNum.' Crore';
            
         } else if ($val >= 100000) {

             $val = ($val / 100000);
             $formattedNum = number_format($val, 2);
             $final_price= $formattedNum.' Lakh';
         }
         else if($val >=1000)
         {
             $val=($val/1000);
             $formattedNum = number_format($val, 2);
             $final_price= $formattedNum.' Thousand';
           
         }
           else if($val >=1)
                {
                   $final_price= $val;
                  
                }
      
         $post->price = $final_price;
        }

        $image = DB::table( 'post_images' )->where( 'post_id' )->get();

        if ( Auth::user()->role == 2 ) {

            $allPost = Post::with( [ 'postImages', 'postViews', 'propertyCate', 'cityAndArea' ] )->get();

            foreach($allPost as $post)
            {
             $val=$post->price;
             
             if ($val >= 10000000) {
                 
                 $val = ($val / 10000000);
    
                 $formattedNum = number_format($val, 2);
                 $final_price= $formattedNum.' Crore';
                
             } else if ($val >= 100000) {
    
                 $val = ($val / 100000);
                 $formattedNum = number_format($val, 2);
                 $final_price= $formattedNum.' Lakh';
             }
             else if($val >=1000)
             {
                 $val=($val/1000);
                 $formattedNum = number_format($val, 2);
                 $final_price= $formattedNum.' Thousand';
               
             }
               else if($val >=1)
                {
                   $final_price= $val;
                  
                }
          
             $post->price = $final_price;
            }
            

            return view( 'adminPanel.userpostindex', compact( 'posts', 'allPost', 'image' ) );
        } else {
            abort( 400 );
        }
    }

    public function edituserPostView( $id ) {
       
        $userPost = Post::with( [ 'postImages', 'cityAndArea', 'propertyCate' ] )
        ->where( 'id', $id )
        ->first();
        // dd($userPost);

        $cities = DB::table( 'city_and_areas' )->distinct()->get( 'city' );

        $postimgs = DB::table( 'post_images' )->distinct()->where( 'post_id', $id )->get();

        return view( 'adminPanel.usereditpost', compact( 'userPost', 'cities', 'postimgs' ) );

        return redirect( url( '/dashbored' ) );
    }
    
    public function editUserPost( Request $req, $id ) {
        $post = Post::where( 'id', $id )->first();
        if ( !empty( $post ) ) {

            $req->validateWithBag( 'addPostError', [
               
                'property_title' => 'required',
                'property_title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'land_area' => 'required',
                'contact_person_name' => 'required',
                "mobile_number" => "required|numeric|digits:12",
                'email' => 'email',

            ] );

            $propertyAllFields = PropertyCategorie::where( 'purpose', $req->purpose )
            ->where( 'property_type', $req->property_type )
            ->where( 'property_sub_type', $req->sub_type )
            ->first();

            ///////converting every unit into marla ///////

            switch ( $req->unit ) {

                case 'kanal':
                $marla = $req->land_area * 20;
                break;

                case 'square_feet':
                $marla = $req->land_area / 272;
                break;

                case 'square_yards':
                $marla = $req->land_area / 30.25;
                break;

                case 'marla':
                $marla = $req->land_area;
                break;
            }

            if ($req->floaring) {
                $floaringString = implode(",", $req->get('floaring'));
            }
            else
            {
                $floaringString="NULL";      
            }
            if($req->electricity)
            {
                $electricityString = implode(",", $req->get('electricity'));
    
            }
            else
            {
                $electricityString='NULL';
            }
        
           if($req->amenities)
           {
            $amenitiesString = implode(",", $req->get('amenities'));
    
           }
           else
           {
            $amenitiesString='';
    
           }

           if ($req->mainimage != null)
           {


           if ($image = $req->file('mainimage')) {
            $destinationPath = 'mainimage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['mainimage'] = "$profileImage";
            $post->mainimage=$profileImage;

        }
    }
            $post->property_title = $req->property_title;
            $post->description = $req->description;
            $post->land_area = $marla;
            $post->price = $req->price;
            $post->bedrooms = $req->bedroom;
            $post->bathrooms = $req->bathroom;
            $post->sub_type_plot = $req->sub_type_plot;
            $post->sub_type_type = $req->sub_type_type;

            $post->address = $req->address;
            $post->floaring = $floaringString;
            $post->electricitybackup = $electricityString;
            $post->year = $req->year;

            $post->contact_person_name = $req->contact_person_name;
            $post->mobile_number = $req->mobile_number;
            $post->mobile2_number = $req->mobile2_number;
            $post->email = $req->email;

            $post->video_link = $req->video_link;
            $post->amenities =$amenitiesString;
            $post->property_categorie_id = $propertyAllFields->id;
            $post->disable = 0;
            $post->id = $id;


            if ($req->image != null) {

                          if ( $files = $req->file( 'image' ) ) {
                              foreach ( $files as $file) {
                                  $image_name = md5( rand( 1000, 10000 ) );
                                  $ext = strtolower( $file->getClientOriginalExtension() );
                                  $image_full_name = $image_name . '.' . $ext;
                                  $upload_path = 'propertyImages';
                                  $image_url = $upload_path . $image_full_name;
                                  $file->move( $upload_path, $upload_path . $image_full_name );
                                  $image = $image_url;
                    
                                  PostImage::create( [
                                      'img_name' => $image,
                                       'post_id' => $post->id,
                                      'img_path' => $upload_path
                    
                                  ] );
                              }
                            
                          }
            }
            $post->update();

            return redirect()->back()->with( 'msg', 'post edited succesfully' );
        }

        return redirect()->back()->with( 'msg', 'their is some kind of network issue' );
    }

    public function userDisableEnable( $id ) {

        if ( Auth::user()->role == 2 ) {
            $enable = Post::where( 'id', $id )->where( 'disable', '1' )->get();
            if ( $enable->isEmpty() ) {
                Post::where( 'id', $id )->update( [ 'disable' => 1 ] );
                return redirect()->back();
            } else {
                post::where( 'id', $id )->update( [ 'disable' => 0 ] );
                return redirect()->back();
            }
        } else {
            abort( 400 );
        }
    }

    public function addcityView() 
    {
        return view( 'adminPanel.adminaddcity' );
    } 
        // $locationString = implode( ',', $request->get( 'moreFields' ) );
        public function savecity( Request $request )
        {
            $request->validate([
                'city'=>'required',
                'moreFields'=>'required',
            ]);
            foreach ($request->moreFields as $location) {
                CityAndArea::create([

                'city' => $request->city,
                'area' => $location,
            ]);
            }

            return back()->with('success', 'City Has Been Created Successfully.');
        }

    public function admincitypostindex()  {

        $cities = DB::table( 'city_and_areas' )->distinct()->get();

        return view( 'adminPanel.viewcity', compact( 'cities' ) );

    }

    public function deleteCity( $id ) {

        // $city = CityAndArea::find($id);
        // //dd($id);
        // $city->delete();
        // return response()->json([
        //   'message' => 'Data deleted successfully!'
        // ]);
        $city = CityAndArea::where( 'id', $id )->first();
       
        if ( !empty( $city ) ) {

            $city->delete();
        }

        return redirect()->back()->with('success', 'City Has Been Deleted Successfully.');
    }

    public function editCityView( $id ) {

        $cities = CityAndArea::where( 'id', $id )->first();

        return view( 'adminPanel.editCity', compact( 'cities' ) );

    }

    public function editCity( Request $req, $id ) 
    {
         $cityAndArea = CityAndArea::where( 'id', $id )->first();

         foreach ($req->moreFields as $location) {
            

            $cityAndArea->city=$req->city;
            $cityAndArea->area=$location;
            $cityAndArea->update();
        //     CityAndArea::create([

        //     'city' => $req->city,
        //     'area' => $location,
        // ]);
        }
      
         
        return redirect()->route( 'admincityview' )
        ->with( 'success', 'City edit successfully' );
    }

    public function addagencyView() 
    {
        return view( 'adminPanel.adminaddagency' );
    } 

    public function adminaddagency(Request $request )
    {
       
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Adminagencies::create($input);

        // return redirect('/home/dashboard');
   
     
        return back()->with('msg', 'Agency Has Been Created Successfully.');

    
    }

    public function Agencyindex()
    {
        $Agencies = Adminagencies::latest()->get();
    
        return view('adminPanel.Agencyindex', compact('Agencies'));

    }

    public function editAgencyView( $id ) 
    {
        $agency = Adminagencies::find( $id );

        return view( 'adminPanel.admineditagency', compact( 'agency' ) );

    }

    public function update(Request $request, $id)
    {
      
        $agency = Adminagencies::where( 'id', $id )->first();
        $request->validate([
            'name' => 'required',
           // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $agency->update($input);
    
        return redirect()->route('adminagencyindex')
                        ->with('success','Agency updated successfully');
    }

    public function deleteAgency( $id ) {
        $agency = Adminagencies::where( 'id', $id )->first();

        if ( !empty( $agency ) ) {

            $agency->delete();
        }

        return redirect()->back();
    }
   

    public function admincategoryview()  {

        $properties = DB::table( 'property_categories' )->distinct()->get();

        return view( 'adminPanel.adminviewcategory', compact( 'properties' ) );

    }

    public function savesubtype( Request $request ) 
    {
        $request->validate([
            'subtype'=>'required',
        ]);
      
        $subtype = new PropertyCategorie();
        $subtype->property_sub_type = $request->subtype;
        $subtype->purpose = 'rent';
        $subtype->property_type = 'residential';
        $subtype->save();

        $subtype = new PropertyCategorie();
        $subtype->property_sub_type = $request->subtype;
        $subtype->purpose = 'rent';
        $subtype->property_type = 'commercial';
        $subtype->save();

        $subtype = new PropertyCategorie();
        $subtype->property_sub_type = $request->subtype;
        $subtype->purpose = 'sale';
        $subtype->property_type = 'residential';
        $subtype->save();

        $subtype = new PropertyCategorie();
        $subtype->property_sub_type = $request->subtype;
        $subtype->purpose = 'sale';
        $subtype->property_type = 'commercial';
        $subtype->save();

        return back()->with('success', 'SubType Has Been Created Successfully.');
    }

    public function deleteCategory( $id ) {
        $property = PropertyCategorie::where( 'id', $id )->first();

        if ( !empty( $property ) ) {

            $property->delete();
        }

        return redirect()->back();
    }

    public function editCategoryView( $id ) 
    {
        $property = PropertyCategorie::find( $id );

        return view( 'adminPanel.admineditCategory', compact( 'property' ) );

    }

    public function categoryupdate( Request $req, $id ) 
    {
      
        $property = PropertyCategorie::where( 'id', $id )->first();
        $property->property_sub_type = $req->property_sub_type;
        $property->purpose = $req->purpose;
        $property->property_type = $req->property_type;
    
        $property->update();

        return redirect()->route( 'admincategoryview' )
        ->with( 'success', 'Category edit successfully' );

    }

    public function search(Request $request){
        // Get the search value from the request
        $search2 = $request->input('search2');
        $search = $request->input('search');


    // dd($request);
        // Search in the title and body columns from the posts table
        // $searchpost = CityAndArea::query()
        //     ->where('area', 'LIKE', "%{$search2}%")
        //     ->where('city', 'LIKE', "%{$search}%")
        //     ->get();

        // $searchpost=DB::table('city_and_areas')->join('posts' , 'posts.city_area_id', '=', 'city_and_areas.id')
        // ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
        // ->where('city_and_areas.area', 'like',  "%{$search2}%" )
        // ->where('city_and_areas.city' ,'like',  "%{$search}%")
        // // ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'city_and_areas.id as id')
        // // ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
        // ->get();

        // $searchpost=DB::table('posts')->join('city_and_area' , 'city_and_areas.post_id', '=', 'city_and_areas.id')
        // ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
        // ->where('city_and_areas.area', 'like',  "%{$search2}%" )
        // ->where('city_and_areas.city' ,'like',  "%{$search}%")
        // // ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'city_and_areas.id as id')
        // // ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
        // ->get();

        $searchpost = DB::table('posts')
       
        ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
        ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
        ->where('city_and_areas.area', 'like',  "%{$search2}%" )
        ->where('city_and_areas.city' ,'like',  "%{$search}%")
        ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
        ->get();

        // dd($searchpost);
        return view('rent.search', compact('searchpost'));
    }

    public function addmanageindex()
    {
        $addbanner = addmanage::latest()->paginate(5);


        return view('adminPanel.addmanage', compact('addbanner'));
    }
    public function addmanageadd()
    {

        return view('adminPanel.add');

    }
    public function addmanagesave(Request $req)
    {

        $add = DB::table( 'addmanage' )->distinct()->get();
        $count = count($add);

// dd($count);
         
            if($count>2)
            {
                return redirect()->route( 'adminaddmanageindex' )
                ->with( 'success', 'you cannot add more than three Addbanner' );
            }
            else
            {

        // dd($req->all());
        $add = new addmanage();
        // $subtype->property_sub_type = $request->subtype;

        if ($image = $req->file('image')) {
            $destinationPath = 'mainimage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
            $add->logo=$profileImage;
            $add->save();

            return redirect()->route( 'adminaddmanageindex' )
            ->with( 'success', 'AddBanner add successfully' );

        }
    }
    }
    public function deletebanner($id)
    {
        $banner = addmanage::where( 'id', $id )->first();

        if ( !empty( $banner ) ) {

            $banner->delete();
        }

        return redirect()->back();

    }

}

