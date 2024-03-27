<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrestasiMhs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'prestasi_mhs';
    protected $guarded = ['id'];

    public function masterMhs() {
        return $this->belongsTo(MasterMhs::class, 'mhs_id', 'id');
    }

    public function prestasi() {
        return $this->belongsTo(Prestasi::class, 'prestasi_id', 'id');
    }

    public function validator() {
        return $this->belongsTo(User::class, 'validator_id', 'id');
    }
}
