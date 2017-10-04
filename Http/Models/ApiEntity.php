<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class ApiEntity extends Model
{
    protected $table = 'api_entities';
    protected $fillable = ['api_doc_id', 'entity_id'];
}
