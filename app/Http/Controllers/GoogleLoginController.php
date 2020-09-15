<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class GoogleLoginController extends Controller
{
 
public function redirect($provider)
{
    return Socialite::driver($provider)->stateless()->redirect();
}
 
public function callback($provider)
{
           
    $getInfo = Socialite::driver($provider)->stateless()->user();
     
    $user = $this->createUser($getInfo,$provider);
    Auth::login($user);

 
    return redirect()->to('/');
 
}
function createUser($getInfo,$provider){
 
 $user = User::where('provider_id', $getInfo->id)->first();
 
 if (!$user) {
     $user = User::create([
        'name'     => $getInfo->name,
        'email'    => $getInfo->email,
        'password' => encrypt('123456dummy'),
        'provider' => $provider,
        'provider_id' => $getInfo->id
    ]);
  }
  return $user;
}
}