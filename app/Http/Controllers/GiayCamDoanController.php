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

            //strtoupper() hàm này dùng để in hoa kí tự
            return response()->json(["message" => "Thêm danh mục ". '<strong>'.$response->name .'</strong>' ." thành công","data" => $response],200);
        }

        return response()->json(["message" => "Thêm danh mục thất bại"],400);
    }

    public function delete(Request $request)
    {
        $category = GiayCamDoan::where('_id',$request->_id)->first();

        if ($category == null)
        {
            return response()->json(["message" => "Không tìm thấy danh mục"], 400);
        }

        $category->delete();

        return response()->json(["message" => "Xóa danh mục ".$category->name ." thành công"], 200);
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

            return response()->json(["message" => "Cập nhật danh mục ". '<strong>'.$request->name .'</strong>' ." thành công","data" => $request],200);
        }

        return response()->json(["message" => "Cập nhật danh mục thất bại","data" => $request],400);
    }
}
