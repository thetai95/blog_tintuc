<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    //
    protected $table = "LoaiTin";

    public function theloai()
    {
        return $this->belongsTo('App\Models\TheLoai', 'idTheLoai', 'id');
    }
}
