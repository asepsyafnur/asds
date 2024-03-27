<?php

namespace App\Http\Controllers\MasterData;

use Inertia\Inertia;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PrestasiResource;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = [];
        if (request('kategori_id')){
            $prestasi = PrestasiResource::collection(Prestasi::where('kategori_id', request('kategori_id'))->get());
        }

        return Inertia::render('MasterData/Prestasi', compact('prestasi'));
    }
}
