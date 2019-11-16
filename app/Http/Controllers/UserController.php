<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Agent;
use App\User;
use App\UserDetail;
use App\ClientDetail;
use App\ClientMaster;
use App\RolePrivilege;
use App\MenuHeadPrivilege;
use App\MenuHead;
use App\OtpCode;
use App\Menu;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller {
  public function login (Request $request) {
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
      $user = Auth::user(); 
      // $data['token'] =  $user->createToken('EntireBooking')->accessToken;
      if($user->id) {
        $data['user']=$user;
        $privilege=RolePrivilege::where('role_id',$user->role_id)->pluck('privilege_id')->toArray();
        $menuHead=MenuHeadPrivilege::whereIn('privilege_id',$privilege)->pluck('menu_head_id')->toArray();
        $data['menuHead']=MenuHead::whereIn('id',$menuHead)->get();
        if(isset($data['menuHead'][0]))
          $data['menu']=Menu::with('SubMenu')->where('menu_head_id',$data['menuHead'][0]->id)->whereIn('privilege_id',$privilege)->get();
      }
      $data['status'] = 200;
      return response()->json( $data, 200);
    } 
    else { 
        $data['status'] = 400;
        $data['message'] = "Invalid Credential";
        return response()->json($data, 200); 
    }
  }

    public function logout(Request $request) {
        $user = Auth::user();
        $user->token()->revoke();
        return response()->json([
          'message' => 'Successfully logged out'
        ]);
    }
    
    public function getUserProfile(Request $request){
        $user = Auth::user();
        $data['profile'] = User::with('Role')->where('id', $user->id)->first();
        return response()->json($data);
          
    }

    public function getAuthenticatedUser(Request $request){
        $user = Auth::user();
        if (!isset($user)) {
          return response()->json(['user_not_found'], 404);
        }
        else {
          $data['user']=$user;
          $privilege=RolePrivilege::where('role_id',$user->role_id)->pluck('privilege_id')->toArray();
          $menuHead=MenuHeadPrivilege::whereIn('privilege_id',$privilege)->pluck('menu_head_id')->toArray();
          $data['menuHead']=MenuHead::whereIn('id',$menuHead)->get();
          if($request->menuHedId){
            $data['menu']=Menu::with('SubMenu')->where('menu_head_id',$request->menuHedId)->whereIn('privilege_id',$privilege)->get();
          }
          elseif(isset($data['menuHead'][0]))
            $data['menu']=Menu::with('SubMenu')->where('menu_head_id',$data['menuHead'][0]->id)->whereIn('privilege_id',$privilege)->get();
        }
        return response()->json($data);
    }

    public function Authentication(){
        //token passing through url
        $user = Auth::user(); //get user details 
        if(isset($user))
            return $user;
        else{
            $userDetails['response']['status'] = 0;
            $userDetails['response']['message'] = 'Unauthorized';
            return response()->json($userDetails, 401);
        }
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
          'name' => 'required|string',
          'contact_number' => 'required|numeric',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
          'hotel_name' => 'required|string|max:255',
          'location' => 'required|string|max:255',
          'description' => 'required|string|max:300',
        ]);
        exit;
        if ($validator->fails())
        {
          $response['message'] = $validator->messages();
          $response['status'] = 400;
          return response()-> json($response, 200);
        }
        else {
          $user = User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'user_type_id'=>2,
            'status' => 1,
            'password'=>Hash::make($request->password)
          ]);
          $client_master = ClientMaster::create([
            'user_id' =>$user->id,
            'name' =>$request->name,
            'status' => 0
          ]);
          UserDetail::create([
            'user_id' => $user->id,
            'client_master_id' => $client_master->id,
            'contact_number' => $request->contact_number
          ]);
          ClientDetail::create([
            'user_id' =>$user->id,
            'client_master_id' => $client_master->id,
            'name' =>$request->hotel_name,
            'location' =>$request->location,
            'description' =>$request->description,
            'status' => 0
          ]);
          $data['token'] =  $user->createToken('EntireBooking')->accessToken;
          $data['status'] = 201;
          $data['message'] = "Successfully Registered";
          return response()->json($data,200);
        }
    }
    
    public function agentRegister(Request $request){
        $validator = Validator::make($request->all(), [
          'name' => 'required|string',
          'contact_number' => 'required',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
          'agency' => 'required|string|max:255',
          'location' => 'required|string|max:255',
          'description' => 'required|string',
        ]);
    
        if($validator->fails()){
          $response['message']=$validator->messages();
          $response['status']=400;
          return response()->json($response, 200);
        }
        $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'user_type_id' => 3,
          'role_id' => 1,
          'status' => 3,
        ]);
        $agency = Agent::create([
          'name'=> $request->agency,
          'user_id'=> $user->id,
          'location'=> $request->location,
          'description' => $request->description,
          'conNum1' => $request->contact_number,
          'status_id' => 0,
        ]);
        $status=201;
        $token =  $user->createToken('EntireBooking')-> accessToken;
        $message = "Successfully Registered";
        return response()->json(compact('user','token', 'status', 'message'),200);
    }
    
    public function sendEmailOTP(Request $request){
        $mailclass='uaabaggcg';
        $password='devraj2015';
        $json='{
                "username":"smtpprov-".$mailclass,
                "password":"'.$password.'",
                "messages":[{
                        "html":"html content goes <b>here</b>",
                        "text":"text content goes here",
                        "subject":"this is the subject",
                        "to":[
                                {
                                        "email":"recipient@example.com",
                                        "name":"John Doe"
                                }
                        ],
                        "from_email":"from@example.com",
                        "from_name":"Your Company",
                        "mailclass":"'.$mailclass.'"
                       },
                       {
                        "html":"html content goes <b>here</b>",
                        "text":"text content goes here",
                        "subject":"this is the subject",
                        "to":[
                                {
                                        "email":"recipient@example.com",
                                        "name":"John Doe"
                                }
                        ],
                        "from_email":"from@example.com",
                        "from_name":"Your Company",
                        "mailclass":$mailclass
                       }
                    ]
                }';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://dettagliweb.com/api/v1/send.json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json'
        ));       
        $output = curl_exec($ch);
        var_dump($output) ;
        /*$mailclass='uaabaggcg';
        $password='devraj2015';
        $json='{
                "username":"smtpprov-uaabaggcg",
                "password":"'.$password.'",
                "message":{
                        "html":"html content goes <b>here</b>",
                        "text":"text content goes here",
                        "subject":"this is the subject",
                        "to":[
                                {
                                        "email":$request->email,
                                        "name":"John Doe"
                                }
                        ],
                        "from_email":"from@example.com",
                        "from_name":"Your Company",
                        "mailclass":"smtpprov-uaabaggcg"
                       }
                }';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://dettagliweb.com/api/v1/send.json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json'
        ));*/ 
        $response['output'] = curl_exec($ch);
        /*var_dump($output) ;
        // PHP SDK: https://github.com/sendinblue/APIv3-php-library
        require_once(__DIR__ . "/APIv3-php-library/autoload.php");
        exit;
        // Configure API key authorization: api-key
        $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        exit;
        $apiInstance = new SendinBlue\Client\Api\ContactsApi(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $createContact = new \SendinBlue\Client\Model\CreateContact(); // \SendinBlue\Client\Model\CreateContact | Values to create a contact
        $createContact['email'] = 'john@doe.com';
          
        try {
            $result = $apiInstance->createContact($createContact);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ContactsApi->createContact: ', $e->getMessage(), PHP_EOL;
        }*/
        $response['status']=200;
        return response()->json($response, 200);
    }
  
  
    public function sendOTP(Request $request){
        $digits = 4;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $otp_code = new OtpCode;
        $otp_code->code = $code;
        $otp_code->contact_no =$request->contact_no;
        $otp_code->save();
        $mobile = $request->contact_no;
        $username = 'entirebooking';
        $password = 'office123';
        $sender = 'ENTIRE';
        $message = 'Welcome to Entirebooking.com. Your code is '.$code.'.';
        $password  = urlencode($password);
        $sender = urlencode($sender);
        $message = urlencode($message);
        $url = "http://bulksmscochin.com/sendsms?uname=$username&pwd=$password&senderid=$sender&to=$mobile&msg=$message&route=T";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);
        $response['id']=$otp_code->id;
        $response['status']=200;
        return response()->json($response, 200);
    }
  
    public function validateOTP(Request $request){
        $otp_code = OtpCode::find($request->otp_id);
        if($request->code == $otp_code->code){
            $response['message']='Success';
            $response['status']=200;
            return response()->json($response, 200);
        }
        else {
            $response['message']='Failed';
            $response['status']=400;
            return response()->json($response, 200);
        }
    }
    
    public function getMenu(Request $request){
        $user = Auth::user(); //authentication
        $privilege=RolePrivilege::where(['role_id'=>$user->role_id, 'user_type_id'=>$user->user_type_id, 'status_id'=>$user->status])->pluck('privilege_id')->toArray();
        
        $menuHead=MenuHeadPrivilege::whereIn('privilege_id',$privilege)->pluck('menu_head_id')->toArray();
        $data['menuHead']=MenuHead::whereIn('id',$menuHead)->get();
        if(isset($request->menuHedId))
          $data['menu']=Menu::with('SubMenu')->where('menu_head_id',$request->menuHedId)->whereIn('privilege_id',$privilege)->orderBy('text', 'ASC')->get();
        return response()->json($data, 200);
    }
}
