<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrestasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul_prestasi' => $this->judul_prestasi,
            'kategori_id' => KategoriResource::make($this->whenLoaded('kategori_id')),
            'keterangan' => $this->keterangan,
            'kredit' => $this->kredit,
            'created_at' => $this->created_at->format('d/M/Y'),
        ];
    }
}
