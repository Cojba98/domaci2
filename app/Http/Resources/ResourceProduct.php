<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Producer;
use App\Models\Category;

class ResourceProduct extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){

        $producer = Producer::find($this->producer_id);
        $category = Category::find($this->category_id);

        return [
            'id'=>$this->id,
            'nazivProizvoda'=>$this->name,
            'cena'=>$this->price,
            'velicina' =>$this->size,
            'proizvodjac'=> $producer['name'],
            'kategorija'=>$category['name']
        ];
    }
}
