<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use JWTAuth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\AddToFavorite;
use App\Models\Agencie;
use App\Models\Fresh;
use App\Models\PostImage;
use App\Models\PropertyCategorie;
use Illuminate\Support\Facades\Hash;

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

class postController extends Controller
{
    public function showallpost()
    {
      // $allpost=5;
      
         $superhot = DB::table('posts')->where('post_boaster', '=', 'superhot' )->orderBy('created_at','DESC')->where('disable', '=', 0)
                  ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
                  ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
                  ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
                           'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,  'posts.post_boaster' , 'posts.property_title', 
                           'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
                           'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
                           'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
                            'posts.created_at' , 'posts.updated_at')->paginate(15);

                            $hotpost = DB::table('posts')->where('post_boaster', '=', 'hot' )->orderBy('created_at','DESC')->where('disable', '=', 0)
                            ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
                            ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
                            ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
                                     'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,  'posts.post_boaster' , 'posts.property_title', 
                                     'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
                                     'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
                                     'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
                                      'posts.created_at' , 'posts.updated_at')->paginate(15);


                            $normalpost = DB::table('posts')->where('post_boaster', '=', 'normal' )->orderBy('created_at','DESC')->where('disable', '=', 0)
                            ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
                            ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
                            ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
                                     'city_and_areas.city',  'city_and_areas.area', 'posts.price' , 'posts.post_boaster' , 'posts.property_title', 
                                     'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
                                     'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
                                     'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
                                      'posts.created_at' , 'posts.updated_at')->paginate(15);
                          

                            return  response()->json([
                                'success' => true, 
                                'message'=> 'Get post successfuly',
                                'data1' => $superhot,
                                'data2' => $hotpost,
                                'data3'=>$normalpost
                                
                              ]);
                                 
    }

    public function livesearch()
    {
      $post = DB::table('posts')
      ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')->where('disable', '=', 0)
      ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
      ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
               'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,  'posts.post_boaster' , 'posts.property_title', 
               'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
               'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
               'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
                'posts.created_at' , 'posts.updated_at')->get();

                return  response()->json([
                  'success' => true, 
                  'message'=> 'Get post successfuly',
                  'data' => $post
                  
                ]);
    }

    public function featurepost()
    {
      // $allpost=5;
         $adminpost = DB::table('posts')->where('admin_post', '=', '1' )->orderBy('created_at','DESC')->where('disable', '=', 0)
                  ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
                  ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
                  ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
                           'city_and_areas.city',  'city_and_areas.area', 'posts.price' , 'posts.property_title', 
                           'posts.description' , 'posts.land_area', 'posts.post_boaster', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
                           'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
                           'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
                            'posts.created_at' , 'posts.updated_at')->paginate(15);

                            

                          // if (!$superhot) 
                          // {
                          //     return  response()->json([
                          //       'success' => false, 
                          //       'error' => true,   
                          //       'message' => 'No posts found.',
                          //     ],404);
                          //   }
                          //   else
                          //   {
                            return  response()->json([
                                'success' => true, 
                                'message'=> 'Get post successfuly',
                                'data1' => $adminpost
                           
                              ]);
                            // }

    }
    
    
       public function postCount()
    {
      $postCount = DB::table('posts')
      ->where('admin_post', '=', '1')
      ->where('disable', '=', 0)
      ->count();


      // $allpost=5;
         $adminpost = DB::table('posts')->where('admin_post', '=', '1' )->orderBy('created_at','DESC')->where('disable', '=', 0)
                  ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
                  ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
                  ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
                           'city_and_areas.city',  'city_and_areas.area', 'posts.price' , 'posts.property_title', 
                           'posts.description' , 'posts.land_area', 'posts.post_boaster', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
                           'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
                           'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
                            'posts.created_at' , 'posts.updated_at')->paginate(15);

                            

                          // if (!$superhot) 
                          // {
                          //     return  response()->json([
                          //       'success' => false, 
                          //       'error' => true,   
                          //       'message' => 'No posts found.',
                          //     ],404);
                          //   }
                          //   else
                          //   {
                            return  response()->json([
                                'success' => true, 
                                'message'=> 'Get post successfuly',
                                'property_count' => $postCount
                           
                              ]);
                            // }

    }

    public function detailpage($id)
    {

              $post = Post::where("id", $id)
              ->with(["cityAndArea", "postImages", "favPostUser", 'user',"propertyCate"])
              ->first();

        if (!$post) 
        {
            return  response()->json([
              'success' => true, 
              // 'error' => true,   
              'message' => 'No posts found.',
            ],404);
          }
          else
          {
          return  response()->json([
              'success' => true, 
              'message'=> 'Successfuly post found',
              'data' => $post
          ],200);
          }

    }


    public function updateprofile(Request $request)
    {
      // dd($request->all());
    
      $id=$request->User_id;
      $user = User::where( 'id', $id )->find($id);

      $user->name = $request->name;
      $user->email = $request->email;
      $user->company_name= $request->company_name;
      $user->city= $request->city;
      $user->address= $request->address;
      $user->mobile_number= $request->mobile_number;
      
      $newPassword = Hash::make($request->new_password);
      $user->password = $newPassword;
        
      if ($request->hasFile('image')) 
      {

        $filename = $request->image->getClientOriginalName();

        // if (auth()->user()->img_path) {

        //     unlink(auth()->user()->img_path);
        // }

        $randomName = rand();
        //store new file in project
        $request->image->storeAs('profilePic', $randomName . $filename, 'public_main');

        $user->img_path = 'public/profilePic/' . $randomName . $filename;
      }

      $user->update();

      return response()->json([
        'success'=>true,
        'message'=>'User Successfuly Updated',
        'data'=>[
          'user'=>$user
        ]
      ],200); 
   
    }
    

    public function createpost( Request $req ) {

      $req->validateWithBag( 'addPostError', [

          "property_title" => "required",
          "description" => "required",
          "price" => "required",
          "land_area" => "required",
          "contact_person_name" => "required",
          "mobile_number" => "required|integer",
          "email" => "email",
          // "bedroom"=>"required",
          // "bathroom"=>"required",
          // "floaring"=>"required",
          // "electricity"=>"required",
          "purpose"=> "required", 
          "mainimage"=>"required",


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
          'sub_type_type'=>$req->sub_type_type,
          'sub_type_plot'=>$req->sub_type_plot,
          'amenities'=>$amenitiesString,
          'electricitybackup'=>$electricityString,
          'city_area_id' => $req->city_area,
          'contact_person_name' => $req->contact_person_name,
          'mobile_number' => $req->mobile_number,
          'mobile2_number' => $req->mobile2_number,
          'email' => $req->email,
          'disable' => '0',
          'user_id' => Auth::id(),
          'property_categorie_id' => $propertyAllFields->id

      ] );

      ///////////saving image///////////////////

      $image = array();
   
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
                   'post_id' => $postCreated->id,
                  'img_path' => $upload_path

              ] );
          }
        
      }
      return response()->json([
        'success'=>true,
        'message'=>'Post Successfuly Added',
      ],200); 
     }

  public function updatepost(Request $req)
    {
      // dd($req->all());
         $id=$req->post_id;
        //  dd($id);
         $post = Post::where( 'id', $id )->find($id);

         
        if ( !empty( $post ) ) {
         

            $req->validateWithBag( 'addPostError', [
               
                'property_title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'land_area' => 'required',
                'contact_person_name' => 'required',
                'mobile_number' => 'required|integer',
                'email' => 'email',

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
          if ($req->mainimage != null) {

          if ($image = $req->file('mainimage')) {
              $destinationPath = 'mainimage/';
              $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
              $image->move($destinationPath, $profileImage);
              $input['mainimage'] = "$profileImage";
              $post->mainimage = $profileImage;
          }
      }

            $post->price = $req->price;
            $post->property_title = $req->property_title;
            $post->description = $req->description;
            $post->electricitybackup = $electricityString;
            $post->land_area = $marla;
            $post->floaring = $floaringString;
            $post->bedrooms = $req->bedroom;
            $post->bathrooms = $req->bathroom;
            $post->address = $req->address;
            $post->year = $req->year;
          
            // $post->mainimage=$profileImage;
            $post->city_area_id = $req->city_area;

            $post->contact_person_name = $req->contact_person_name;
            $post->mobile_number = $req->mobile_number;
            $post->mobile2_number = $req->mobile2_number;
            $post->email = $req->email;

            $post->video_link = $req->video_link;
            $post->amenities = $amenitiesString;
            $post->property_categorie_id = $propertyAllFields->id;
            $post->disable = 0;
            $post->id = $id;

            $deleteoldpic = PostImage::where( 'post_id', $id )->get();
            
            if ( !empty( $deleteoldpic ) ) {

                $deleteoldpic->each->delete();
            } 

            $image = array();
  //  dd($image);
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

          //   if ($req->image != null) {

          //               $destinantion = 'propertyImages/'.$post->postimgs;
          //               if (File::exists( $destinantion ) ) 
          //               {
          //                   File::delete( $destinantion );
          //               }
                      
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
          
          
            $post->update();

           return response()->json([
             'success'=>true,
               'message'=>'Post Successfuly Updated',
              'data' =>$post
        
      ],200); 
        }

        return response()->json([
          'message'=>'Post did not updated something is wrong ',
        ],400); 
    }

    public function deletePost($id)
    {
      $post = post::where( 'id', $id )->first();
       
      if ( !empty( $post ) ) {

          $post->delete();
      } 
      return response()->json([
        'success'=>true,
        'message'=>'Post deleted',
      ],200);    
    }

    public function City_and_area()
    {

      $cities = DB::table('city_and_areas')->get();

      return response()->json([
        'success'=>true,
        'message'=>'Successfuly get city',
        'data' =>$cities
      ],200);  

    }
    public function showagencies()
    {
      $agencies = DB::table('adminagencies')->select('id','name', 'url','image')->get();

      if (!$agencies) 
      {
          return  response()->json([
            'success' => false, 
            'error' => true,   
            'message' => 'No agencies found.',
          ],404);
        }
        else
        {
        return  response()->json([
            'success' => true, 
            'message'=>'Successfuly get agencies',
            'data' =>$agencies
            
          ],200);
        }
    }

    public function addtofavpost(Request $req)
    {
      $idd =$req->post_id;
    
      $post = DB::table('posts')->where('posts.id', '=', $idd)->select('posts.*')->first();

      $property_categorie_id=$post->property_categorie_id;
      $city_area_id=$post->city_area_id;

      $addtofavid = AddToFavorite::where("user_id", $req->user_id)
      ->where("post_id", $req->post_id)
      ->first();

       if($addtofavid==null)
        {

      $addtofav = AddToFavorite::create( [

        "user_id"=>$req->user_id,
        "post_id"=>$req->post_id,
        "property_categorie_id"=>$property_categorie_id,
        "city_area_id"=> $city_area_id,
        "favrt"=>'1'
      ]);

        $addtofav->save();

        return response()->json([

          'success'=>true,
          'message'=>'Successfuly added to favourite',

          'data'=>$addtofav
        ],200);
      }
      else
      {
        return response()->json([

          'success'=>true,
          'message'=>'you allready add this post into favourite',
        ],200);
      }

    }

    public function removetofavpost($id)
    {

      $removetofav = AddToFavorite::where( 'id', $id )->first();
      if ( !empty( $removetofav ) ) {

          $removetofav->delete();
      } 
      return response()->json([
        'success'=>true,
        'message'=>'remove from favrouts',
      ],200);    


    }

    public function showfavpost()
    {

      $favpost = DB::table('add_to_favorites')
                ->where( 'add_to_favorites.user_id', '=', Auth::user()->id  )
                ->join('property_categories', 'add_to_favorites.property_categorie_id', '=' , 'property_categories.id')
                ->join('city_and_areas','add_to_favorites.city_area_id', '=' , 'city_and_areas.id')
                ->join('posts','add_to_favorites.post_id', '=' , 'posts.id')
                ->join('users','add_to_favorites.user_id', '=' , 'users.id')
                ->select('add_to_favorites.id as id', 'posts.*', 'users.*', 
                'property_categories.*','add_to_favorites.*')->paginate(15);
   
     return response()->json([

      'success'=>true,
      'message'=>'success',
      'data1'=>$favpost

    ],200);
    }

    public function showAuthUserPost()
    {
         $allpost = DB::table('posts')->orderBy('created_at','DESC')->where( 'user_id', '=', Auth::user()->id  )
         ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
        ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
        ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
        'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,'posts.disable' ,'posts.post_boaster','posts.property_title', 
        'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
        'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
        'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
         'posts.created_at' , 'posts.updated_at')
        ->paginate(15);
// dd($allpost);
        if (!$allpost) 
        {
            return  response()->json([
              'success' => false, 
              'error' => true,   
              'message' => 'No posts found.',
            ],404);
          }
          else
          {
          return  response()->json([

              'success' => true, 
              'message'=>'Get Successfuly auth user post',
              'data1' => $allpost
            ],200);
          }      
    }

    public function fetchsubtype()
    {
      $subtypee = DB::table("property_categories")->distinct()->get("property_sub_type");
      
      return response()->json([

        'success'=>true,
        'message'=>'Successfuly get subtype',
        'data'=>$subtypee,

      ],200);
    }

    public function rentcommercial()
    {

      $allpost = DB::table('posts')->orderBy('created_at','DESC')->where('purpose', '=', 'rent')->where('property_type' , '=' ,'commercial')->where('disable', '=', 0)
       ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
      ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
      ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
      'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,'posts.disable' ,'posts.post_boaster','posts.property_title', 
      'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
      'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
      'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
       'posts.created_at' , 'posts.updated_at')
      ->paginate(15);

        if (!$allpost) 
        {
            return  response()->json([
              'success' => false, 
              'error' => true,   
              'message' => 'No posts found.',
            ],404);
          }
          else
          {
          return  response()->json([
            'success'=>true,
            'message'=>'Successfuly get allpost',
            'data1'=>$allpost,
            ],200);
      }      
    
  }


  public function rentresidential()
  {

    $allpost = DB::table('posts')->where('purpose', '=', 'rent')->orderBy('created_at','DESC')->where('property_type' , '=' ,'residential')->where('disable', '=', 0)
     ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
    ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
    ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
    'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,'posts.disable' ,'posts.post_boaster','posts.property_title', 
    'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
    'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
    'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
     'posts.created_at' , 'posts.updated_at')
    ->paginate(15);
      //  dd($allpost);
      if (!$allpost) 
      {
          return  response()->json([
            'success' => false, 
            'error' => true,   
            'message' => 'No posts found.',
          ],404);
        }
        else
        {
        return  response()->json([
          'success'=>true,
          'message'=>'Successfuly get allpost',
          'data1'=>$allpost,
          ],200);
          
    }      
  
}

public function renthome()
{

  $allpost = DB::table('posts')->where('purpose', '=', 'rent')->orderBy('created_at','DESC')->where('property_sub_type' , '=' ,'home')->where('disable', '=', 0)
   ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
  ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
  ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
  'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,'posts.disable' ,'posts.post_boaster','posts.property_title', 
  'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
  'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
  'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
   'posts.created_at' , 'posts.updated_at')
  ->paginate(15);

    if (!$allpost) 
    {
        return  response()->json([
          'success' => false, 
          'error' => true,   
          'message' => 'No posts found.',
        ],404);
      }
      else
      {
      return  response()->json([
        'success'=>true,
        'message'=>'Successfuly get allpost',
        'data1'=>$allpost,
        ],200);
  }      

}

public function salecommercial()
{

  $allpost = DB::table('posts')->where('purpose', '=', 'sale')->orderBy('created_at','DESC')->where('property_type' , '=' ,'commercial')->where('disable', '=', 0)
   ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
  ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
  ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
  'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,'posts.disable' ,'posts.post_boaster','posts.property_title', 
  'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
  'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
  'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
   'posts.created_at' , 'posts.updated_at')
  ->paginate(15);

    if (!$allpost) 
    {
        return  response()->json([
          'success' => false, 
          'error' => true,   
          'message' => 'No posts found.',
        ],404);
      }
      else
      {
      return  response()->json([
        'success'=>true,
        'message'=>'Successfuly get allpost',
        'data1'=>$allpost,
        ],200);
  }      

}

public function salehome()
{

  $allpost = DB::table('posts')->where('purpose', '=', 'sale')->orderBy('created_at','DESC')->where('property_sub_type' , '=' ,'home')->where('disable', '=', 0)
   ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
  ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
  ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
  'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,'posts.disable' ,'posts.post_boaster','posts.property_title', 
  'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
  'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
  'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
   'posts.created_at' , 'posts.updated_at')
  ->paginate(15);

    if (!$allpost) 
    {
        return  response()->json([
          'success' => false, 
          'error' => true,   
          'message' => 'No posts found.',
        ],404);
      }
      else
      {
      return  response()->json([
        'success'=>true,
        'message'=>'Successfuly get allpost',
        'data1'=>$allpost,
        ],200);
  }      

}

public function saleresidential()
{

  $allpost = DB::table('posts')->where('purpose', '=', 'sale')->orderBy('created_at','DESC')->where('property_type' , '=' ,'residential')->where('disable', '=', 0)
   ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
  ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
  ->select('posts.id as id','property_categories.purpose', 'property_categories.property_type','property_categories.property_sub_type', 
  'city_and_areas.city',  'city_and_areas.area', 'posts.price' ,'posts.disable' ,'posts.post_boaster','posts.property_title', 
  'posts.description' , 'posts.land_area', 'posts.mainimage', 'posts.bedrooms', 'posts.bathrooms',
  'posts.city_area_id', 'posts.year' , 'posts.contact_person_name' ,
  'posts.mobile_number' , 'posts.email' , 'posts.video_link' , 'posts.property_categorie_id' , 
   'posts.created_at' , 'posts.updated_at')
  ->paginate(15);
    // dd($allpost);
    if (!$allpost) 
    {
        return  response()->json([
          'success' => false, 
          'error' => true,   
          'message' => 'No posts found.',
        ],404);
      }
      else
      {
      return  response()->json([
        'success'=>true,
        'message'=>'Successfuly get allpost',
        'data1'=>$allpost,
        ],200); 
  }      

}

public function propertySearch(Request $req)
{
   // dd($req->all());
   $search2= $req['search2'] ?? "";
   $search2 = $req->input('search2');

           $areaInArray = explode(";", $req->area);

           $priceInArray = explode(";", $req->price);

   
       $propertyAllFields = PropertyCategorie::where("purpose", $req->purpose)
       ->where("property_type", $req->property_type)
       ->where("property_sub_type", $req->sub_type)
       ->first();
       if ($req->search2)
       {
        $searchpost = DB::table('posts')
           
               ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
               ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
               ->where('property_title' ,'like',  "%{$search2}%")
               ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
               ->paginate(15);     
  
       }

       else
       {
         if($req->beds="null")
         {
          $searchpost = DB::table('posts')
  
          ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
          ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
          ->where('city_area_id', '=',  "$req->city_area" )
          ->where('property_categorie_id', '=',  "$propertyAllFields->id" )
          ->whereBetween("land_area", $areaInArray)
          ->whereBetween("price", $priceInArray)
          ->where('disable', '0')
          ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
          ->paginate(15);
         }
         else
         {

           $searchpost = DB::table('posts')
  
          ->join('property_categories', 'posts.property_categorie_id', '=' , 'property_categories.id')
          ->join('city_and_areas','posts.city_area_id', '=' , 'city_and_areas.id')
          ->where('bedrooms', '=',  "$req->beds" )
          ->where('city_area_id', '=',  "$req->city_area" )
          ->where('property_categorie_id', '=',  "$propertyAllFields->id" )
          ->whereBetween("land_area", $areaInArray)
          ->whereBetween("price", $priceInArray)
          ->where('disable', '0')
          ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
          ->paginate(15);

       }
      }

        return  response()->json([
          'success'=>true,
          'message'=>'Successfuly get allpost',
          'data1'=>$searchpost,
          ],200); 


}


public function MarlaSearch(Request $req)
{
    // Retrieve search parameters
    $propertyType = $req->input('property_type');
    $area = $req->input('area');

    // Validate that required parameters are provided
    if (empty($propertyType) || empty($area)) {
        return response()->json([
            'success' => false,
            'message' => ' property type, and area are required parameters.',
        ], 400); // Return a 400 Bad Request response
    }

    // Parse the area parameter into lower and upper bounds
    $areaInArray = explode(";", $area);

    // Build the search query based on the provided parameters
    $searchpost = DB::table('posts')
        ->join('property_categories', 'posts.property_categorie_id', '=', 'property_categories.id')
        ->join('city_and_areas', 'posts.city_area_id', '=', 'city_and_areas.id')
        ->where('property_categories.property_type', '=', $propertyType)
        ->whereBetween("land_area", $areaInArray)
        ->where('disable', '0')
        ->select('posts.*', 'property_categories.*', 'city_and_areas.*', 'posts.id as id')
        ->paginate(15);

    return response()->json([
        'success' => true,
        'message' => 'Successfully retrieved posts based on  property type, and area.',
        'data1' => $searchpost,
    ], 200);
}


public function adminDisableEnable(Request $req)
    {

      $id=$req->post_id;
       
       $enable = Post::where('id', $id)->where('disable', '1')->get();

       if ($enable->isEmpty()) {
                Post::where('id', $id)->update(['disable' => 1]);
              
                return  response()->json([
                  'success'=>true,
                  'message'=>'Post Successfully disable',
                 
                  ],200);     
       }

       else {
                post::where('id', $id)->update(['disable' => 0]);

                return  response()->json([
                  'success'=>true,
                  'message'=>'Post Successfuly enable',
                 
                  ],200);     
            }
     

    }
    public function getaddmanage()
    {

      $addmanage = DB::table('addmanage')->get();

      return response()->json([
        'success'=>true,
        'message'=>'Successfuly get add',
        'data' =>$addmanage
      ],200);  

    }


}   
    
