<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entities';
    protected $fillable = ['name', 'description'];

    public function apiDocs(){
        return $this->belongsToMany(ApiDoc::class, 'api_entities');
    }

    public function fields(){
        return $this->hasMany(Field::class);
    }

}
