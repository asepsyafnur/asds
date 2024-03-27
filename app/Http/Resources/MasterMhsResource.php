<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MasterMhsResource extends JsonResource
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
            'nama_lengkap' => $this->nama_lengkap,
            'nim' => $this->nim,
            'prodi' => $this->prodi,
            'angkatan' => $this->angkatan,
            'user_id' => UserResource::make($this->whenLoaded('user_id')),
        ];
    }
}
