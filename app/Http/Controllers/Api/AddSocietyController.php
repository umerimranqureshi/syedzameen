<?php
namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\PlotSize;
use App\Models\Notification;
use App\Models\AddSociety;
use Illuminate\Http\Request;
use App\Models\SocietyPicture;
use Illuminate\Support\Facades\DB;
use App\Models\DealerAddSociety;
use App\Models\UserAddSociety;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AddSocietyController extends Controller
{
    private $success = false;
    private $message = '';
    private $data = [];


     public function getAdminSociety(){
      $ddSociety= AddSociety::latest()->get();
      if (is_null($ddSociety)) {
        return response()->json([
            'success' => false,
            'message' =>'data not found',]);
    }
    return response()->json([
        'success' => 'True',
        'message' => 'All Data susccessfull',
        'data' => $ddSociety,
    ]);
     }   


     public function addSociety(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required|unique:dealer_add_societies,title,NULL,id,user_id,' . auth()->id(),
            
        ]);

        if($validator->fails()){
            return response()->json([
                'success'=>false,
                // 'message' => $validator->errors()->toJson()
                 'message'=> 'title already exist',
    
            ], 400);
    }
        $user = Auth::guard('api')->user();
        $rating = new DealerAddSociety();
        $rating->down_payment = $req->down_payment;
        $rating->own_payment = $req->own_payment;
        $rating->last_down_payment= $req->last_down_payment;
        $rating->last_own_payment = $req->last_own_payment;
        $rating->title = $req->title;
        $rating->selected_plot_sizes = $req->selected_plot_sizes;
        $rating->user_id = $user->id;
        $rating->save();
        
        $Notification = new Notification();
        $Notification->user_id = $user->id;
        $Notification->title = $req->title;
        // $Notification->dealer_add_society_id = $rating->id;
        $Notification->save();

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

    //   $fltnos  = $req->input('add_society_id');
    //     foreach($fltnos as $key => $fltno) {
    //         $modelName = new PlotSize();
    //         $modelName->add_society_id = $fltno;
    //         $modelName->dealer_add_socity_id = $rating->id;
    //         $modelName->save();
    //     }

       
            
                

        }
        if (is_null($rating)) {
            return response()->json([
                'success' => false,
                'message' => 'storage error'
            ]);
        }
        return response()->json([
            'success' => 'True',
            'message' => 'Add Society created successfully',
            'data' => $rating,
        ]);

  }   

  public function getDealerSociety(){
          $user = Auth::guard('api')->user();
    $ddSociety= DealerAddSociety::latest()->with('societyPicture:image,dealer_add_society_id')->whereIn('user_id',$user)->get();
    if (is_null($ddSociety)) {
      return response()->json([
          'success' => false,
          'message' =>'data not found',]);
  }
  return response()->json([
      'success' => 'True',
      'message' => 'All Data susccessfull',
      'data' => $ddSociety,
  ]);
   }   


   public function Societyshow($id)
   {
    $ddSociety= DealerAddSociety::latest()->with('societyPicture:image,dealer_add_society_id')->where('id',$id)->first();
       if (is_null($ddSociety)) {
           return response()->json([
               'success' => false,
               'message' => 'data not found'
           ], 404);
       }
       return response()->json([
           'success' => 'True',
           'data' => $ddSociety,
       ]);
   }
       

   public function updatePayment(Request $request ,$id )
   {
       $obj = DealerAddSociety::find($id);
       if ($obj) {
          
           if (!empty($request->input('down_payment'))) {
               $obj->down_payment = $request->input('down_payment');
           }
           if (!empty($request->input('own_payment'))) {
               $obj->own_payment = $request->input('own_payment');
           }
           if (!empty($request->input('last_down_payment'))) {
            $obj->last_down_payment = $request->input('last_down_payment');
        }
        if (!empty($request->input('last_own_payment'))) {
            $obj->last_own_payment = $request->input('last_own_payment');
        }
           if ($obj->save()) {
               $this->data = $obj;
               $this->success = True;
               $this->message = 'Payment is updated successfully';
           }
       }

       return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $this->data,]);
   }
   
   
   public function updateNoticePeriod(Request $request, $id)
    {

        $obj = DealerAddSociety::find($id);
        if ($obj) {
            if (!empty($request->input('notice_period'))) {
                $obj->notice_period = $request->input('notice_period');
            }

            if ($obj->save()) {
                $this->data = $obj;
                $this->success = True;
                $this->message = 'Notice Period is updated successfully';
            }
        }

        $user = Auth::guard('api')->user();
        $Notification = new Notification();
        $Notification->title = $request->title;
        $Notification->message = $request->message;
        $Notification->user_id = $user->id;
        $Notification->dealer_add_society_id = $obj->id;
        $Notification->save();

        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $this->data,]);
    }
    
    
     public function notification()
    {
        $userId = Auth::id();
        $dealerSocietyId = DB::table('notifications')
            ->where('user_id', $userId)
            ->value('dealer_add_society_id');

        $notification = Notification::latest()->select('id', 'user_id', 'dealer_add_society_id', 'title', 'message')->with('user:id,name', 'addSociety')->where('dealer_add_society_id', $dealerSocietyId)->get();
        if (is_null($notification)) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ]);
        }
        return response()->json([
            'success' => 'True',
            'message' => 'All Data susccessfull',
            'data' => $notification,
        ]);
    }

   public function dealerDelete($id)
   {
     $post = DealerAddSociety::where( 'id', $id )->first();
      
     if ( !empty( $post ) ) {

         $post->delete();
     } 
     return response()->json([
       'success'=>true,
       'message'=>'Society deleted',
     ],200);    
   }
   
     public function userAddSociety(Request $req)
   {
       $validator = Validator::make($req->all(), [
      'dealer_add_society_id' => 'required|unique:user_add_societies,dealer_add_society_id,NULL,id,user_id,' . auth()->id(),
           
       ]);

       if($validator->fails()){
           return response()->json([
               'success'=>false,
               // 'message' => $validator->errors()->toJson()
                'message'=> 'Society already exist',
   
           ], 400);
   }
      $user = Auth::guard('api')->user();
       $rating = new UserAddSociety();
       $rating->dealer_add_society_id = $req->dealer_add_society_id;
       $rating->status = 'Read';
       $rating->user_id = $user->id;
       $rating->save();
        $society = DealerAddSociety::find($req->dealer_add_society_id);
        $Notification = new Notification();
        $Notification->user_id = $user->id;
        $Notification->title = $society->title;
        $Notification->save();
      
       if (is_null($rating)) {
           return response()->json([
               'success' => false,
               'message' => 'storage error'
           ]);
       }
       return response()->json([
           'success' => 'True',
           'message' => 'Add Society created successfully',
           'data' => $rating,
       ]);

 }   

 public function userGetSociety(){
    $user = Auth::guard('api')->user();
    $ddSociety= UserAddSociety::latest()->with('addDealerSociety.societyPicture:image,dealer_add_society_id')->whereIn('user_id',$user)->get();
    // $ddSociety= UserAddSociety::latest()->with('addDealerSociety.societyPicture:image,dealer_add_society_id','plotSize.addSociety:id,plot_size')->whereIn('user_id',$user)->get();
    if (is_null($ddSociety)) {
      return response()->json([
          'success' => false,
          'message' =>'data not found',]);
  }
  return response()->json([
      'success' => 'True',
      'message' => 'All Data susccessfull',
      'data' => $ddSociety,
  ]);
   }   

   public function userDelete($id)
   {
     $post = UserAddSociety::where( 'id', $id )->first();
      
     if ( !empty( $post ) ) {

         $post->delete();
     } 
     return response()->json([
       'success'=>true,
       'message'=>'Society deleted',
     ],200);    
   }
   
    public function sendNotification(Request $request , $id)
    {     
        $obj = DealerAddSociety::find($id);
        if ($obj) {
            if (!empty($request->input('notice_period'))) {
                $obj->notice_period = $request->input('notice_period');
            }

            if ($obj->save()) {
                $this->data = $obj;
                $this->success = True;
                $this->message = 'Notice Period is updated successfully';
            }
        }
        $dealerSocietyIds = DB::table('user_add_societies')
            ->where('dealer_add_society_id', $id)
            ->value('dealer_add_society_id');
        $notifications = UserAddSociety::with('user')->where('dealer_add_society_id', $dealerSocietyIds)->get();
        $notificationid = $notifications->pluck('id')->toArray();
        $update = UserAddSociety::find($notificationid);
        foreach($update as $updat)
        $updat ->update(['status' => 'UnRead']);

             //

        $userId = Auth::id();
        $dealerSocietyId = DB::table('notifications')
            ->where('user_id', $userId)
            ->value('title');
        $notification = Notification::with('user')->where('title', $dealerSocietyId)->get();
        $users = $notification->pluck('user_id')->toArray();
        $firebaseToken = User::whereIn('id',$users)->whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAAvZJgN2Q:APA91bHtknCBMrZeda60h6btb3KfaCPUmsRK1JXHJ2XohWvPMZMWEV19lNzssu8gEb5xm0CgwuTsorHaLFPpcD_AIPtFEt__PBkzy0ewdSWfh6weg6bYXCceBcB2uy3q0UkTNTPcPLfN';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
               "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
            //  'sender_id' => $senderId

        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
        return response()->json([
            'success' => 'True',
            'message' => 'Notification Send  susccessfull',
            'data' => $response,
            'data' => $this->data,
        ]);
        

    }
    
     public function getAllDealerSociety()
    {
        $ddSociety = DealerAddSociety::latest()->with('societyPicture:image,dealer_add_society_id')->get();
        if (is_null($ddSociety)) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ]);
        }
        return response()->json([
            'success' => 'True',
            'message' => 'All Data susccessfull',
            'data' => $ddSociety,
        ]);
    }
    
     public function userAddSocietyRead(Request $request,$id )
    {
        $obj = UserAddSociety::find($id);
         $obj->status = 'Read';
         $obj->update();
         return response()->json([
            'success' => true,
            'message' => 'susccessfull',
            'data' => $obj,
        ]);
    }

}   
