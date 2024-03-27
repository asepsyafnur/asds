<?php

namespace App\Http\Controllers\MasterData;

use Inertia\Inertia;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriResource::collection(Kategori::get());

        return Inertia::render('MasterData/Kategori/Index', compact('kategori'));
    }

    public function edit(Kategori $kategori) {
        $kategori = $kategori->loadMissing('prestasi');
        
        return Inertia::render('MasterData/Kategori/Edit', compact('kategori'));
    }
}
