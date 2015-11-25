<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'getProfile']]);
    }

    public function getLogin() {

        
 
        return view('auth.login_page');
    }

    public function getRegistration() {

        return view('auth.registration_page');
    }

    public function postLogin() {

        $input = \Input::all();
        $validator = \Validator::make($input, User::getAuthRules());
        if($validator->passes()) {
            $user = User::where('phone', '=', $input['phone'])->first();

            if ( !($user instanceof User) ) {
                return redirect('/login')->withInput()->withErrors([
                     'phone' => 'Пользователь не найден.'
                ]);
            }
            if ( \Hash::check( $input['password'] , $user->password) ) {
                \Auth::login($user);
                return redirect('/');
            } else {
                return redirect('/login')->withInput()->withErrors([
                     'password' => 'Пароль введен не верно.'
                ]);
            }
        } else {
            return redirect('/login')->withErrors($validator);
        }
    }

    public function postRegistration() {

        $input = \Input::all();
        $validator = \Validator::make($input, User::getRegistrationRules());
        if($validator->passes()) {
            $generated_password = str_random(8);
            $user = new User;
            $user->firstname = \Input::has('firstname')? $input['firstname'] : '';
            $user->lastname = \Input::has('lastname')? $input['lastname'] : '';
            $user->phone = \Input::has('phone')? $input['phone'] : '';
            $user->password = \Hash::make($generated_password);
            if(!$user->save()) 
                return redirect('/registration')->withInput()->withErrors([
                     'firstname' => 'Что-то пошло не так. Попробуйте еще раз.'
                ]);
        } else {

            return redirect('/registration')->withInput()->withErrors($validator);
        }

        \Log::info('<!> Created : '.$user);
        //send password via sms
        $phone_formatted = '7'.str_replace(['(', ')', ' ', '-'], '', $user->phone);
        $body=file_get_contents("http://sms.ru/sms/send?api_id=1408895e-223f-25e4-75b1-7c25b1caf620&from=79273818046&to=".$phone_formatted."&text=".urlencode("Привет! Твой пароль для входа: ".$generated_password));
        \Auth::login($user);
        return redirect('/');
    }

    public function getProfile() {
        
        $orders = \App\Models\Orders::where('user_id', '=', \Auth::user()->_id)->get();

        return view('auth.profile_page', [
            'orders' => $orders
        ]);

    }
}
