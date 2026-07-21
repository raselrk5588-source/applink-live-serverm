<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SiteSetting;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
{
    public function __construct()
    {
         $this->middleware(function ($request, $next) {
            Session::put('top_menu',"settings");
            Session::put('sub_menu',"settings");
            return $next($request);
        });
    }

    public function index()
    {
        $this->data['limit'] = SiteSetting::where('key', 'total_install_limit')->value('value') ?: 10;
        return view("admin.settings.index", $this->data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'total_install_limit' => 'required|numeric|min:1'
        ]);

        SiteSetting::updateOrCreate(
            ['key' => 'total_install_limit'],
            ['value' => $request->total_install_limit]
        );

        setMessage("message",'success','Settings updated successfully');
        return back();
    }
}
