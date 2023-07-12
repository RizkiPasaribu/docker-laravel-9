<?php

namespace App\Http\Resources;

use App\Models\Teacher;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "nama" => $this->nama,
            "nim" => $this->nim,
            "kelas" => $this->kelas,
            "alamat" => $this->alamat,
            'photo'=> $this->photo ? config('app.url')."/store/photo/".$this->photo : null,
            'courses'=> $this->courses,
            "teacher_id" => $this->teacher,
            "created_at" => $this->created_at,
            "updated_at"=> $this->created_at,
        ];
    }
}
