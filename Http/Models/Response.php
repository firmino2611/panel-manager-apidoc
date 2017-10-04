<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';
    protected $fillable = ['resource_id', 'type', 'field', 'description'];

    public function resources(){
        return $this->belongsTo(Resource::class);
    }
}
