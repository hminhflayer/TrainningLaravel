<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Mongodb\Auth\Authenticatable;
use App\Models\User;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Session;

class DocumentController extends Controller
{

    //Views Controller
    public function index()
    {
        return view('documents.index');
    }
    public function UPSERT(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hoTen' => 'required|string',
            'email' => 'email | required',
            'soDienThoai' => 'string',
            'danToc' => 'string',
            'gioiTinh' => 'string',
            'ngaySinh' => 'string',
            'ngheNghiep' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }
        else {
            $checkEmail = Documents::where("email",$request->email)->first();
            if($checkEmail)
            {
                $checkEmail->update([
                    'hoTen' => $request->hoTen,
                    'soDienThoai' => $request->soDienThoai,
                    'danToc' => $request->danToc,
                    'gioiTinh' => $request->gioiTinh,
                    'ngaySinh' => $request->ngaySinh,
                    'ngheNghiep' => $request->ngheNghiep
                ]);
                return response()->json(['message' => "Cập nhật thành công."], 200);
            }
            else{
                $document = Documents::create([
                    'hoTen' => $request->hoTen,
                    'email' => $request->email,
                    'soDienThoai' => $request->soDienThoai,
                    'danToc' => $request->danToc,
                    'gioiTinh' => $request->gioiTinh,
                    'ngaySinh' => $request->ngaySinh,
                    'ngheNghiep' => $request->ngheNghiep
                ]);
                return response()->json(['message' => "Thêm thành công.", 'data' => $document], 200);
            }
        }

        return response()->json([
            'message' => "ERROR"
        ], 400);
        //return view('documents.create');
    }

    public function DELETE_Document(Request $request)
    {
        $documents = Documents::where("email",$request->email)->first();
        if($documents)
        {
            $documents->delete();
            return response()->json(['message' => "Xóa thành công."], 200);
        }
        else
        {
            return response()->json(['message' => "Không tìm thấy document."], 200);
        }

        return response()->json('Xóa lỗi', 400);
    }

    public function GET_ALL(Request $request)
    {
        $documents = Documents::all();

        return response()->json([$documents], 200);
    }

    public function create(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/document/create',
        [
            'hoTen' => $request->hoTen,
            'email' => $request->email,
            'soDienThoai' => $request->soDienThoai,
            'danToc' => $request->danToc,
            'gioiTinh' => $request->gioiTinh,
            'ngaySinh' => $request->ngaySinh,
            'ngheNghiep' => $request->ngheNghiep
        ]);

        $body = $response->body();
        $jsonDecode = json_decode($body, true);
    }

    public function update()
    {
        return view('user.index');
    }

    public function view()
    {
        return view('documents.create');
    }

    public function delete()
    {
        return view('user.delete');
    }

    //Action Function
    
}
