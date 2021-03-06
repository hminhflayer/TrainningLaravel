<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GiayCamDoan;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mongodb\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class GiayCamDoanController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['login', 'register']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = GiayCamDoan::all();
        return response()->json(["data" => $category], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $valid = Validator::make($request->all(),[
            "tencoso" => "required|string",
            "tenbenhvien" => "required|string",
            "tenphieu" => "required|string",
            "MS" => "required|string",
            "soBA" => "required|string",
            "hoten" => "required|string|min:3",
            "nguoibenh_daidien" => "required|string",
            "nguoibenh_nguoithan" => "required|string",
            "tuoi" => "required",
            "gioitinh" => "required|string",
            "dantoc" => "required|string",
            "dienthoai" => "required|string",
            "nghenghiep" => "required|string",
            "diachi" => "required|string",
            "noi_dieutri" => "required|string",
            "camdoan_dongy" => "required|string",
            "ngaythangnam" => "required|string"
        ]);

        if ($valid->fails()){
            return response()->json(["message" => $valid->errors()], 400);
        }
        else {
            $response = GiayCamDoan::create([
                "name" => $request->name,
                "author" => auth::user()->name,
                "discription" => $request->discription
            ]);

            //strtoupper() h??m n??y d??ng ????? in hoa k?? t???
            return response()->json(["message" => "Th??m danh m???c ". '<strong>'.$response->name .'</strong>' ." th??nh c??ng","data" => $response],200);
        }

        return response()->json(["message" => "Th??m danh m???c th???t b???i"],400);
    }

    public function delete(Request $request)
    {
        $category = GiayCamDoan::where('_id',$request->_id)->first();

        if ($category == null)
        {
            return response()->json(["message" => "Kh??ng t??m th???y danh m???c"], 400);
        }

        $category->delete();

        return response()->json(["message" => "X??a danh m???c ".$category->name ." th??nh c??ng"], 200);
    }

    public function update(Request $request)
    {
        $valid = Validator::make($request->all(),[
            "name" => "required|string|min:3|unique:categories"
        ]);

        if ($valid->fails()){
            return response()->json(["message" => $valid->errors()], 400);
        }
        else {
            $response = GiayCamDoan::where("_id", $request->_id)->update([
                "name" => $request->name,
                "author_update" => auth::user()->name,
                "discription" => $request->discription
            ]);

            return response()->json(["message" => "C???p nh???t danh m???c ". '<strong>'.$request->name .'</strong>' ." th??nh c??ng","data" => $request],200);
        }

        return response()->json(["message" => "C???p nh???t danh m???c th???t b???i","data" => $request],400);
    }
}
