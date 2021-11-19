<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Main;
use App\Http\Controllers\loginController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->email)->plainTextToken;
});




  Route::get('governorates',[Main::class, 'governorates'])->middleware('auth:sanctum');
  Route::get('cities',[Main::class, 'cities'])->middleware('auth:sanctum');
  Route::get('advices',[Main::class, 'advices'])->middleware('auth:sanctum');
  Route::get('advice',[Main::class, 'advice'])->middleware('auth:sanctum');
  Route::get('training',[Main::class, 'training'])->middleware('auth:sanctum');
  Route::get('trainings',[Main::class, 'trainings'])->middleware('auth:sanctum');
  Route::get('diets',[Main::class, 'diets'])->middleware('auth:sanctum');
  Route::get('diet_details',[Main::class, 'dietDetails'])->middleware('auth:sanctum');
  Route::get('readings',[Main::class, 'readings'])->middleware('auth:sanctum');
  Route::post('addreading',[Main::class, 'addreadings'])->middleware('auth:sanctum');
  Route::get('profile',[Main::class, 'profile'])->middleware('auth:sanctum');
  Route::get('user_schedules',[Main::class, 'userSchedules'])->middleware('auth:sanctum');
  Route::post('create_schedules',[Main::class, 'scheduleCreate'])->middleware('auth:sanctum');
  Route::post('edit_schedules',[Main::class, 'scheduleEdit'])->middleware('auth:sanctum');
  Route::post('delete_schedules',[Main::class, 'scheduleDelete'])->middleware('auth:sanctum');
  Route::post('contacts',[Main::class, 'contacts'])->middleware('auth:sanctum');





  Route::post('reset',[loginController::class, 'emailSending']);
  Route::post('new_password',[loginController::class, 'newPassword']);
  Route::post('register',[loginController::class, 'register']);
  Route::post('login',[loginController::class, 'login']);
