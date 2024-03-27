<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategoriResource;
use App\Http\Resources\PrestasiResource;
use App\Models\Kategori;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $kategori = KategoriResource::collection(Kategori::paginate(10));

        return Inertia::render('Dashboard', compact('kategori'));
    }
}
