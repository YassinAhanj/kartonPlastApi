<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this -> id ,
            'firstImage' => (string)$this -> firstImage ,
            'secoundImage' => (string)$this -> secoundImage ,
            'firstDescription' => (string)$this -> firstDescription ,
            'secoundDescription' => (string)$this -> secoundDescription ,
            'title' => (string)$this -> title ,
            'created_at' => (string)$this -> created_at 
        ];
    }
}
