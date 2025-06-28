<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SourceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'slug'             => $this->slug,
            'url'              => $this->url,
            'rss_url'          => $this->rss_url,
            'type'             => $this->type,
            'geographic_scope' => $this->geographic_scope,
            'main_topic'       => $this->main_topic,
            'logo'             => $this->logo,

            // Relaciones condicionales
            'municipality' => $this->whenLoaded('municipality', function () {
                return new MunicipalityResource($this->municipality);
            }),

            'province' => $this->whenLoaded('province', function () {
                return new ProvinceResource($this->province);
            }),

            'community' => $this->whenLoaded('province', function () {
                return $this->province && $this->province->community
                    ? new CommunityResource($this->province->community)
                    : null;
            }),

            'editorial_email'  => $this->editorial_email,
            'commercial_email' => $this->commercial_email,
        ];
    }
}
