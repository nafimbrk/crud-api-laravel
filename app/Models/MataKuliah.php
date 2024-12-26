<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = "mata_kuliah",
            $primaryKey = 'kode',
            $fillable = ['kode','nama','sks'];
    public $timestamps = false,
            $incrementing = false;
}
