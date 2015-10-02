<?php

namespace App\Http\Controllers;

use Illuminate\Auth\GenericUser;
use App\User;
use Auth;
use Redirect;
use App\Http\Controllers\Controller;
use Invisnik\LaravelSteamAuth\SteamAuth;

class SteamController extends Controller {

    /**
     * @var SteamAuth
     */
    private $steam;

    public function __construct(SteamAuth $steam)
    {
      $this->steam = $steam;
    }

    public function getLogin()
    {
      if($this->steam->validate()) {

        $info = $this->steam->getUserInfo();
        
        if(!is_null($info)) {
          try {
            $user = User::where('steamid', $info->getSteamID())->first();
            if(is_null($user)) {

              $user = new User;
              $user->name = $info->getNick();
              $user->steamid = $info->getSteamID();
              $user->profileURL = $info->getProfileURL();
              $user->save();
            }
            if($user->name != $info->getNick() || $user->profileURL != $info->getProfileURL()) {
              $user->name = $info->getNick();
              $user->profileURL = $info->getProfileURL();
              $user->save();
            }

            Auth::login($user);
            return Redirect::to('/');

          } catch(Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
          }
        }
      } else {
            return  $this->steam->redirect(); //redirect to steam login page
          }
        }

        public function getLogout()
        {
          Auth::logout();
          return Redirect::to('/');
        }
      

    

    // public function steamTrade() {

    //     $steam = new \App\Vendor\SteamTrade();
    //     $steam->setup(
    //         'sessionID',
    //         'cookies'
    //     );
    //     print_r($steam);

    // }

}