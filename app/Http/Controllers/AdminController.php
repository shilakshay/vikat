<?php

namespace App\Http\Controllers;

use App\Admin;
use App\PasswordChange;
use Illuminate\Http\Request;
use App\VerifyAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\VikatPasswordReset;
use App\Mail\VerifyAdminEmail;

class AdminController extends Controller
{

    protected $salt = 'thodider';

    public function showDashboard(){
        return view('admin.dashboard');
    }

    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function createAdmin(Request $request)
    {
        try {
            $validatedData =$request->validate([
                'email' => 'email|required',
                'password' => 'required|min:8|confirmed',
                'name' => 'required|string'
            ]);

            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $verification = VerifyAdmin::create([
                'token' => sha1(time()),
                'admin_id' => $admin->id
            ]);

            $data = array(
                'name' => $admin->name,
                'email' => $admin->email,
                'token' => $verification->token
            );

            \Mail::to("akshayshil34@gmail.com")->send(new VerifyAdminEmail($data));

            return view('admin.login');
        } catch (\Throwable $th) {
            return view('admin.error')->with('message',"This operation could not be completed.");
        }
    }


    public function adminLogin(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8|'
        ]);

        //Check if a user exists
        $admin = Admin::where('email','=', $request->email)->first();

        //If not user with given email the return error page with message
        if(is_null($admin)){
            return view('admin.error')->with('message','No such email address exists.');
        }
        else{
            //Check if the password is correct and user is verified
            $password_correct = Hash::check($request->password, $admin->password);
            //If correct set the global values of the session
            if($password_correct && $admin->verified == true){
                Session::put('email',$admin->email);
                Session::put('user',$admin->name);
                return redirect()->route('dashboard')->with('alert','You have successfully logged in.');
            }
            else{
                return view('admin.error')->with('message','A user has already been created with the given email address');
            }
        }
    }

    public function passwordChangeForm(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email'
        ]);
        //Check if an entry with the given email address exists
        $isEmailExists = Admin::where('email','=',$request->email)->first();
        if(!$isEmailExists){
            return view('admin.error')->with('message','No such email exists');
        }
        else{
            //TODO: Implement a token based system for password change
            return view('admin.passwordchange')->with('email', $request->email);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function forgotPasswordForm()
    {
        return view('admin.resetpassword');
    }

    public function forgotPasswordMailSend(Request $request)
    {
        try{
            $validate = $request->validate([
                'email' => 'required|email',
            ]);

            //Find the admin_id
            $admin = Admin::where('email','=',$request->email)->first();
            $id = $admin->id;

            if(is_null($admin)){
                return view('admin.error')->with('message',"This email doesn't exists");
            }

            //Delete the previous tokens issued to the user
            $prev_tokens = PasswordChange::where('admin_id','=',$id);
            $prev_tokens->delete();

            //First Create the token
            $password = new PasswordChange;
            $password->token = sha1(time());
            $password->admin_id = $id;
            $password->save();

            $data = array(
                'email' => $admin->email,
                'name' => $admin->name,
                'token' => $password->token
            );

            //Send the mail
            \Mail::to($admin->email)->send(new VikatPasswordReset($data));

            return view('admin.success')->with('message','Your account will be scrutinized and once verified will be made accessible.');
        }

        catch(\Throwable $th)
        {
            return view('admin.error')->with('message',"This operation could not be completed successfully.");
        }
    }

    public function verifyPasswordResetToken($token)
    {
        try{
            $instance = PasswordChange::where('token','=',$token)->first();
            if(is_null($instance))
            {
                return view('admin.error')->with('message',"No tokens were issued for the following email address");
            }
            return view('admin.resetpasswordconfirm')->with('id',$instance->admin_id)->with('password_token',$token);
        }
        catch(\Throwable $th)
        {
            return view('admin.error')->with('message',"Invalid token");
        }
    }

    public function verifyPasswordGetNewPassword(Request $request){
        try{
            $validatedData = $request->validate([
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'id' => 'required'
            ]);

            $new_password = Hash::make($request->password);
            $admin = Admin::find($request->id);
            $admin->password = $new_password;
            $admin->save();

            $token = $request->password_token;
            $token_record = PasswordChange::where('token','=',$token)->first();
            $token_record->delete();

            return view('admin.success')->with('message','Your password has been successfully updated.');
        }
        catch(\Throwable $th)
        {
            return view('admin.error')->with('message','Some problem occured. Please try again later.');
        }
    }

    public function sendAdminVerify($token){
        //Find the token if it exists go to next step or else
        //return error view

        $token_ = VerifyAdmin::where('token','=',$token)->first();

        return dd($token_);
        if(!is_null($token_))
        {
            $id = $token_->admin_id;
            $admin = Admin::find($id)->first();
            $admin->verified = true;
            $admin->save();
            $token_->delete();
            return view('admin.success')->with('message','The request has been granted.');
        }
        else{
            return view('admin.error')->with('message',"No such request has been made.");
        }
    }
}
