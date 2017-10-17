<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class ApiCodeStatus extends Model
{ 
    protected $table = 'api_code_status';
    protected $fillable = ['api_doc_id', 'code_status_id', 'releases'];

    
}
