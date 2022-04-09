<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        [
            'data'=> ArticleResource::collection($this->collection),
             'meta' =>[
                'count' => $this->total(),
                'total_page'=>$this->lastPage(),
                'total_page'=>$this->lastPage(),
                'per_page'=>$this->perPage(),

            ]
        ];
    }
}
