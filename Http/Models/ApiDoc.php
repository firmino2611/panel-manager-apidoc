<?php

namespace Package\Firmino\Apidoc\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ApiDoc extends Model
{
    protected $table = 'api_docs';
    protected $fillable = ['base_url', 'version', 'name', 'description'];

    public function entities(){
        return $this->belongsToMany(Entity::class, 'api_entities');
    }

    public function codeStatus(){
        return $this->belongsToMany(CodeStatus::class, 'api_code_status');
    }

    public function resources(){
        return $this->belongsToMany(Resource::class, 'api_resources');
    }
    public function httpHeaders(){
        return $this->hasMany(HttpHeader::class);
    }

}
