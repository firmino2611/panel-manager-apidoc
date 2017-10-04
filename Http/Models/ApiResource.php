<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class ApiResource extends Model
{
    protected $table = 'api_resources';
    protected $fillable = ['api_doc_id', 'resource_id'];
}
