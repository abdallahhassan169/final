<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Mailable;
use Mail;
use App\Mail\Reset;


class loginController extends Controller
{
  private function apiResponse($status,$message,$data)
{
  $response=[
  'status'=> $status,
  'message'=>$message,
  'data'=>$data,
];
return response()->json($response);
}
public function register(Request $request){

  $validation=validator()->make($request->all(),[

    'name'=>'required',
    'email'=>'required|unique:users',
    'password'=>'required',
    'city_id'=>'required|exists:cities,id',
    'phone'=>'required',


  ]);

if ($validation->fails()){

return $this->apiResponse(0,'failed',$validation->errors());
}

$request->merge(['password'=>bcrypt($request->password)]);
$client=User::create($request->all());


return $this->apiResponse(1,'success',$client);

}
public function login(Request $request){
  $validation=validator()->make($request->all(),[

    'email'=>'required',
    'password'=>'required',


  ]);
  $client=User::where('email',$request->email)->first();
  if ($client)
  {
  if (Hash::check($request->password,$client->password))
  {
    return $this->apiResponse(1,'تم تسجيل الدخول',[
'user'=>$client,

]);



  }
else
{
  return $this->apiResponse(0,'failed','no data to show');



}
}
else
{
  return $this->apiResponse(0,'failed','no data to show');


}

}
public function emailSending(Request $request)
{

  $user=User::where('email',$request->email)->first();

  if($user)
  {
       $code=rand(1111,9999);
      $update=$user->update(['pin_code'=>$code]);
        if($update){

          Mail::to($user ->email)
          ->bcc("tarekhado0123@gmail.com")
          ->send(new Reset($code));


            return $this->apiResponse(1,'please check your email',$code);
                  }
          else
           {
            return $this->apiResponse(0,'failed,please try again');
            }
}
else {
  return $this->apiResponse(0,'there is no account attached to this email','no data to show');
}



}
public function emailSending(Request $request)
{

  $user=User::where('email',$request->email)->first();
  if($user)
  {
      $code=rand(1111,9999);
      User::where('email',$request->email)->first()->update(['pin_code'=>$code]);

      $update=$user->update(['pin_code'=>$code]);
        if($update){

Mail::to($user ->email)
  ->bcc("sovghab@gmail.com")
  ->send(new Reset($code));





            return $this->apiResponse(1,'please check your phone',$code);
                  }
          else
           {
            return $this->apiResponse(0,'failed,please try again');
            }
}
else {
  return $this->apiResponse(0,'there is no mail attached to this phone','no data to show');
}
}
public function newPassword(Request $request){
  $user=User::where('email',$request->email)->first();
  if($request->pin_code==$user->pin_code){
    $validation=validator()->make($request->all(),[

      'new_password'=>'required|confirmed',


    ]);
    $newpassword=User::where('email',$request->email)->first()->update(['password'=>bcrypt($request->new_password)]);
    return $this->apiResponse(1,'confirmed','no data to show');

  }
else {
  return $this->apiResponse(0,'invalid mail or pin_code','no data to show');

}
}


}
