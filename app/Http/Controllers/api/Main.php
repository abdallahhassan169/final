<?php

namespace App\Http\Controllers\api;
use Illuminate\Mail\Mailable;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\models\Governorate;
use App\Models\models\City;
use App\Models\models\Advice;
use App\Models\models\Token;
use App\Models\models\Schedule;
use App\Mail\Reset;
use App\Models\models\Meal;
use App\Models\models\Contact;
use App\Models\models\Diet;
use App\Models\models\Excercise;
use App\Models\models\Training;
use App\Models\models\Reading;

class Main extends Controller
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

public function governorates(){
    $governorates=Governorate::all();
    return $this->apiResponse(1,'success',$governorates);
  }

  public function cities(Request $request){

$cities=City::where('gov_id',$request->governorate_id)->get();
return $this->apiResponse(1,'sucsess',$cities);
}

public function advices(){
$advices=Advice::latest()->paginate(10);
return $this->apiResponse(1,'sucsess',$advices);
}

public function advice(Request $request){
$id=$request->id;
$advice=Advice::findOrFail($id);
return $this->apiResponse(1,'sucsess',$advice);
}

public function training(Request $request){
$id =$request->id;
 $t = Training::findOrFail($id);
 $training=$t->excercise();
return $this->apiResponse(1,'sucsess',$training);
}
public function trainings(){
  $ts=Training::latest()->paginate(5);
  return $this->apiResponse(1,'sucsess',$ts);

}
public function dietDetails(Request $request){
$id =$request->id;
$d = Diet::find($id);
$diet=$d->meals();
return $this->apiResponse(1,'sucsess',$diet);
}

public function diets(){
  $ds = Diet::latest()->paginate(5);
  return $this->apiResponse(1,'sucsess',$ds);

}

public function readings(){
$readings = auth()->user()->readings()->get();
return $this->apiResponse(1,'success',$readings);
}

public function profile(){
$u=auth()->user();
return $this->apiResponse(1,'sucsess',$u);
}



public function addreadings(Request $request){

 $validated = $request->validate([
     'reading' => 'required',

 ]);

 $reading=new Reading;
 $reading->reading=$request->input('reading');
 $reading->user_id=auth()->user()->id;
 $reading->save();
 return $this->apiResponse(1,'success',$reading);
}

public function userSchedules(){
  $user=auth()->user();
  $schedules=$user->schedules()->get();
  return $this->apiResponse(1,'success',$schedules);

}
public function scheduleCreate(Request $request){
  $validation=validator()->make($request->all(),[

    'medicine'=>'required',
    'time'=>'required',



  ]);
  if ($validation->fails()){

    return $this->apiResponse(0,'failed',$validation->errors());
  }

  $schedule=Schedule::create(['user_id'=>auth()->user()->id,
  'medicine'=>$request->medicine,
  'time'=>$request->time,
  'is_on'=>1,
]);
  return $this->apiResponse(1,'success',$schedule);
}

public function scheduleEdit( Request $request){
  $id=$request->id;
  $schedule=Schedule::findOrFail($id);
  $schedule->update($request->all());
  return $this->apiResponse(1,'edited',$schedule);

}
public function scheduleDelete(Request $request ){
  $id=$request->id;
  $schedule=Schedule::findOrFail($id);
  $schedule->delete();
  return $this->apiResponse(1,'deleted','done');

}
public function contacts(Request $request){
  $validation=validator()->make($request->all(),[

    'email'=>'required',
    'phone'=>'required',
    'body'=>'required',



  ]);
  if ($validation->fails()){

    return $this->apiResponse(0,'failed',$validation->errors());
  }

  $contact=Contact::create($request->all());
  return $this->apiResponse(1,'success',$contact);
}


}
