<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TheLoai extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = "TheLoai";

    protected $fillable = [
        'Ten',
        'TenKhongDau',
    ];

    public function loaitin()
    {
        return $this->hasMany('App\Models\LoaiTin', 'idTheLoai', 'id');
    }
}
