<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Grado as GradoResource;
use DateTime;

class AlumnoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return $request;
        return [
            'id'=>$this->id,
            'student_card'=>$this->student_card,
            'name'=>$this->name,
            'birthdate'=>$this->birthdate,
            'father_name'=>$this->father_name,
            'mother_name'=>$this->mother_name,


            'grados'=> GradoResource::collection($this->whenLoaded('grados')),
            'secciones'=> SeccionResource::collection($this->secciones)
        ];
    }

}
