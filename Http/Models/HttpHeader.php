<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class HttpHeader extends Model
{
    protected $table = 'http_headers';
    protected $fillable = ['name', 'description', 'api_doc_id'];

    public function apiDoc(){
        return $this->belongsTo(HttpHeader::class);
    }
}
