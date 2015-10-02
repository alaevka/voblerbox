<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $fillable = ['firstname', 'lastname', 'phone'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $collection = 'users';

    protected static $authRules = array(
        'phone'                 =>  'required|phone:RU',
        'password'              =>  'required',
    );

    protected static $registrationRules = array(
        'phone'                 =>  'required|unique:users',
        'firstname'             =>  'required',
        'lastname'              =>  'required',
    );
   	
   	public static function getAuthRules() {         
   		return self::$authRules; 
   	}

    public static function getRegistrationRules() {         
      return self::$registrationRules; 
    }
}
