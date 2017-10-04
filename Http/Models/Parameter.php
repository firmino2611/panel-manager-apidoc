<?php

namespace Package\Firmino\Apidoc\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameters';
    protected $fillable = ['required', 'type', 'field', 'description'];

    public function resources(){
        return $this->belongsToMany(Resource::class, 'resource_parameters');
    }

}
