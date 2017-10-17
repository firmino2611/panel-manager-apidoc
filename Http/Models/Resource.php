<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';
    protected $fillable = ['resource_id', 'method', 'name', 'endpoint', 'description', 'example_parameter', 'example_response', 'depreciated'];

    public function responses(){
        return $this->hasMany(Response::class);
    }

    public function parameters(){
        return $this->belongsToMany(Parameter::class, 'resource_parameters');
    }

    public function apiDocs(){
        return $this->belongsToMany(ApiDoc::class, 'api_resources');
    }

    /**
    *   Verifica se o recurso contem um determinado parametro. Se existir retorna true caso contrario retorna false
    *
    *   @param integer $id
    *   @return boolean
    */
    public function hasParameter($id){
        foreach ($this->parameters as $parameter){
            if ($parameter->id == $id){
                return true;
            }
        }
        return false;
    }

     public static function hasDepreciated($api, $resource){
        $api = ApiResource::where('api_doc_id',$api )
                        ->where('resource_id', $resource)->get()->first();

        return $api->depreciated;
    }

}
