<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Mongodb\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Session;

class UserViewController extends Controller
{
    public function postlogin(Request $request)
    {
        $response = Http::post('http://103.162.31.19:1818/api/emr/login',
        [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $body = $response->body();
        $jsonDecode = json_decode($body, true);

        //Session::put('token', $jsonDecode["token"]);

        //dd(session('token'));
        return redirect()->to("/user");
    }

    public function index()
    {
        $response = Http::accept('application/json')->withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->get('http://103.162.31.19:1818/api/emr/user');

        $data = json_decode($response->body());

        return view('user.index')->with('data',$data);
    }

    public function login_local()
    {
        return view('/user');
    }

    public function index_local()
    {
        $response = Http::accept('application/json')->withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->get('/user');
        $body = $response->body();
        $jsonDecode = json_decode($body, true);
        //dd($response->body());

        return view('user.index')->with('jsonDecode',$jsonDecode);
    }

    public function create()
    {
        dd("a");
        return view('user.create');
    }

    public function update()
    {
        return view('user.index');
    }

    public function delete()
    {
        return view('user.delete');
    }
}
