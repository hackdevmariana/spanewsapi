<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            // Incluye relación con comunidad si está cargada
            'community' => $this->whenLoaded('community', function () {
                return new CommunityResource($this->community);
            }),
        ];
    }
}
