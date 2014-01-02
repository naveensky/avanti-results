<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 12/3/13
 * Time: 5:58 PM
 * To change this template use File | Settings | File Templates.
 */

class UserController extends BaseController
{

    public function getLogin()
    {
        if (Auth::check())
            return Redirect::to('/');
        return View::make("user.login");
    }

    public function postLogin()
    {

        $data = Input::all();

        $rules = array(
            'email' => 'Required|email',
            'password' => 'Required',
        );
        $v = Validator::make($data, $rules);
        if ($v->passes()) {

            $credentials = array(
                'email' => $data['email'],
                'password' => $data['password']
            );

            if (empty($data['email']) || empty($data['password'])) {
                return Redirect::to('/user/login')->withInput($data)->with("message", Lang::get('responsemessages.invalid_username_password'))->with('status', false);
            }
            if (Auth::attempt($credentials)) {
                $preLogin = Session::get('pre_login');
                if (!empty($preLogin))
                    return Redirect::to($preLogin);
                return Redirect::to("/");
            } else
                return Redirect::to('/user/login')->withInput($data)->with("message", Lang::get('responsemessages.invalid_username_password'))->with('status', false);
        } else {

            return Redirect::to('/user/login')->withErrors($v->getMessageBag())->withInput($data);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/user/login');
    }

}