<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\University;
use App\User;
use App\InstallApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('top_menu', "user");
            Session::put('sub_menu', "user");
            return $next($request);
        });
    }
    public function index()
    {
        $this->data['users'] = User::where("role_id", 1)->get();
        $this->data['university'] = University::orderBy("name", "asc")->get();
        return view("admin.users.users", $this->data);
    }

    public function view()
    {
        $search_key = request()->input("search_key");
        $filter_by = request()->input("filter_by");
        $approved_by = request()->input("approved_by");
        $university_id = request()->input("university_id");
        $users = User::with("approver")->with("university")->orderBy("id", "desc")
            ->where("role_id", 2);
        if ($filter_by != '') {
            $users = $users->where('status', $filter_by);
        }
        if ($approved_by != '') {
            $users = $users->where('approved_by', $approved_by);
        }
        if ($university_id != '') {
            $users = $users->where('university_id', $university_id);
        }
        if ($search_key != '') {
            $users = $users->where('email', 'like', '%' . $search_key . '%');
            $users = $users->orWhere('phone', 'like', '%' . $search_key . '%');
        }
        $users = $users->paginate(10);
        $this->data['users'] = $users;
        $page = request()->input('page');
        if ($page <= 1) {
            $this->data['sl_counter'] = 1;
        } else {
            $this->data['sl_counter'] = $page * 10 - 9;
        }
        $returnHTML = view('admin.users.users_data')->with($this->data)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
        //        dd(request()->all());
    }

    public function control($user_id)
    {
        $user = User::where("id", $user_id)->first();
        if ($user->status == 1) {
            $user->status = 2;
        } else if ($user->status == 0) {
            $user->status = 1;
            $user->approved_by = Auth::id();
        } else if ($user->status == 2) {
            $user->status = 1;
        }
        $user->save();
        setMessage("message", 'success', "User Update Successfully");
        return redirect()->route("admin.user");
    }

    public function userEdit($user_id)
    {
        $this->data['single'] = User::where("id", $user_id)->first();
        $this->data['university'] = University::orderBy("name", "asc")->get();
        $this->data['roles'] = Role::all();
        return view('admin.users.user-edit', $this->data);
    }

    public function userUpdate($user_id)
    {
        $user = User::where("id", $user_id)->first();
        $user->name = request()->input("name");
        $user->phone = request()->input("phone");
        $user->email = request()->input("email");
        $user->university_id = request()->input("university_id");
        if ($this->phoneCheck($user_id)) {
            setMessage("message", "danger", "Phone already exits.");
            return back();
        }
        if ($this->emailCheck($user_id)) {
            setMessage("message", "danger", "Email already exits.");
            return back();
        }
        if (request()->input("password")) {
            $user->password = request()->input("password");
        }
        if (request()->has("role_id")) {
            $user->role_id = request()->input("role_id");
        }
        $user->save();
        setMessage("message", "success", "User Update Successfully");
        return back();
    }

    public function phoneCheck($user_id)
    {
        $phone = request()->input("phone");
        $where = ["phone" => $phone];
        return User::where($where)->where('id', '!=', $user_id)->first();
    }
    public function emailCheck($user_id)
    {
        $email = request()->input("email");
        $where = ["email" => $email];
        return User::where($where)->where('id', '!=', $user_id)->first();
    }

    public function login($user_id)
    {
        //        dd($user);
        Auth::loginUsingId($user_id);
        return redirect()->route("user.dashboard");
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            // Delete installed apps related to this user
            $apps = InstallApp::where("user_id", $user_id)->get();
            foreach ($apps as $app) {
                // If there are contents related to the app, you could delete them too
                // App\Content::where('app_id', $app->id)->delete();
                $app->delete();
            }
            // Now delete the user
            $user->delete();
            setMessage("message", "success", "User and their installed apps deleted successfully.");
        }
        return back();
    }
}