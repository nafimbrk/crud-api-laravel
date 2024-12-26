<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OopSekulMod extends Model
{
    use HasFactory;
    protected $table = "mahasiswa",
            $primaryKey = 'nim',
            $fillables = ['nim','nama','semester','ipk'];
    public $timestamps = false,
            $incrementing = false;
}
