<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori';
    protected $guarded = ['id'];

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'kategori_id', 'id');
    }
}
