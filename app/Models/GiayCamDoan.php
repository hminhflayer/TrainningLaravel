<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class GiayCamDoan extends Model
{
    use HasFactory, HasApiTokens;

    protected $collection = 'Documents';
    protected $fillable = [
        '_id',
        'tencoso',
        'tenbenhvien',
        'tenphieu',
        'MS',
        'soBA',
        'hoten',
        'nguoibenh_daidien',
        'nguoibenh_nguoithan',
        'tuoi',
        'gioitinh',
        'dantoc',
        'dienthoai',
        'nghenghiep',
        'diachi',
        'noi_dieutri',
        'camdoan_dongy',
        'ngaythangnam'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
