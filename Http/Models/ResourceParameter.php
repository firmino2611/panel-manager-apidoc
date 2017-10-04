<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;

class ResourceParameter extends Model
{
    protected $table = 'resource_parameters';
    protected $fillable = ['parameter_id', 'resource_id'];
}
