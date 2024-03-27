<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterMhs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'master_mhs';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function prestasiMhs() {
        return $this->hasMany(PrestasiMhs::class, 'mhs_id', 'id');
    }
}
