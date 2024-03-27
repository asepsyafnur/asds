<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrestasiMhsResource extends JsonResource
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
            'prestasi_id' => PrestasiResource::make($this->whenLoaded('prestasi_id')),
            'mhs_id' => MasterMhsResource::make($this->whenLoaded('mhs_id')),
            'link_file' => [
                'full_link' => $this->link_file,
                'short_link' => Str::limit($this->link_file, 100)
            ],
            'bukti' => $this->bukti,
            'tgl_surat' => $this->tgl_surat,
            'semester' => $this->semester,
            'deskripsi' => $this->deskripsi,
            'status' => $this->status === null ? 'diproses' : ($this->status === 1 ? 'diterima' : 'ditolak'),
            'validator_id' => UserResource::make($this->whenLoaded('validator_id')),
            'created_at' => $this->created_at->format('d/M/Y'),
        ];
    }
}
