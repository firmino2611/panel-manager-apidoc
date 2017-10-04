<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';
    protected $fillable = ['example', 'type', 'field', 'description', 'entity_id'];

    public function entity(){
        return $this->belongsTo(Entity::class);
    }
}
