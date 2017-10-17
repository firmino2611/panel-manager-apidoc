<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class CodeStatus extends Model
{
    protected $table = 'code_status';
    protected $fillable = ['code', 'error', 'description', 'api_doc_id'];

    public function apiDocs(){
        return $this->belongsToMany(ApiDoc::class, 'api_code_status');
    }

 
}
