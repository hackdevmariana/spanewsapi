<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SourceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'url' => $this->url,
            'rss_url' => $this->rss_url,
            'type' => $this->type,
            'geographic_scope' => $this->geographic_scope,
            'main_topic' => $this->main_topic,
            'logo' => $this->logo,
            'municipality' => [
                'id' => $this->municipality->id,
                'name' => $this->municipality->name,
                'province_id' => $this->municipality->province_id,
            ],
        ];
    }
}
