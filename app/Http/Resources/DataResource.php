<?php
#task Laravel: working with data
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'age' => $this->age,
            'profession' => $this->profession,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

