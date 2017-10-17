<?php

namespace Package\Firmino\Apidoc\Http\Controllers\Docs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Package\Firmino\Apidoc\Http\Models\Resource;
use Package\Firmino\Apidoc\Http\Models\ApiDoc;
use Package\Firmino\Apidoc\Http\Models\Parameter;
use Package\Firmino\Apidoc\Http\Models\ResourceParameter;
use Package\Firmino\Apidoc\Http\Models\Response;
use Package\Firmino\Apidoc\Http\Models\ApiResource;


class ResourceController extends Controller
{
	 public function __construct()
    {
        View::share('apis', ApiDoc::all());
    }

     public function createResource(){
        return view('Apidoc::forms.create.resource');
    }

    public function editResource($id, $api){
        return view('Apidoc::forms.edit.resource')
                    ->with('resource', Resource::find($id))
                    ->with('apiDoc', ApiDoc::find($api));
    }

     public function updateResource(Request $request){

        $apiId = $request->route()->parameter('apiId');
        $params = Parameter::find($request->parameter);

        $resource = Resource::find($request->route()
            ->parameter('resourceId'));

        $resource->update(array(
            'name' => $request->name,
            'endpoint' => $request->endpoint,
            'method' => $request->method,
            'description' => $request->description,
            'example_parameter' => $request->example_parameter,
            'example_response' => $request->example_response,
        ));

        DB::select('update api_resources set depreciated = ?
                     where api_doc_id = ? and
                     resource_id = ?', [
                            $request->depreciated == 'on' ? true : false ,
                            $apiId,
                            $resource->id
                     ]);

        //dd($request->depreciated == 'on' ? true : false )

// ---------------------------------------------------------------------------------
        foreach ($resource->parameters as  $p)
            DB::delete('DELETE FROM resource_parameters WHERE 
                parameter_id = ? AND resource_id = ?', [Parameter::find($p->id)->id, $resource->id]);

        if($params){
            foreach ($params as $p){
                if (!$resource->hasParameter($p->id))
                    ResourceParameter::create(array(
                        'parameter_id' => $p->id,
                        'resource_id' => $resource->id,
                        'depreciated' => $request->depreciated
                    ));
            }
        }

 // -------------------------------------------------------------------------------

        for ($i = 0; $i < count($request->p_field); $i++) {
            if ($request->p_field[$i]){
                $param = Parameter::find($request->p_id[$i]);

                if (!$param){
                    $param = Parameter::create(array(
                        'field' => $request->p_field[$i],
                        'type' => $request->p_type[$i],
                        'description' => $request->p_description[$i],
                        'required' => $request->p_required[$i],
                    ));

                    ResourceParameter::create(array(
                        'parameter_id' => $param->id,
                        'resource_id' => $resource->id
                    ));
                }else{
                    $param->update(array(
                        'field' => $request->p_field[$i],
                        'type' => $request->p_type[$i],
                        'description' => $request->p_description[$i],
                        'required' => $request->p_required[$i],
                    ));

                    ResourceParameter::create(array(
                        'parameter_id' => $param->id,
                        'resource_id' => $resource->id
                    ));
                }
            }
        }

// -------------------------------------------------------------------------------

        foreach ($resource->responses as $response){
            Response::destroy($response->id);
        }

        for ($i = 0; $i < count($request->r_field); $i++) {
            if ($request->r_field[$i]){
                Response::create(array(
                    'field' => $request->r_field[$i],
                    'type' => $request->r_type[$i],
                    'description' => $request->r_description[$i],
                    'resource_id' => $resource->id
                ));
            }
        }

        \Session::flash('alert', [
            'class' => 'success',
            'message' => 'Dadso alterados com sucesso.'
        ]);

        //\Event::fire(new ResourceUpdated($resource));

        return redirect()->route('resource.edit', [$resource->id, $apiId]);
    }


    public function saveResource(Request $request){

        $params = Parameter::find($request->parameter);

        $resource = Resource::create(array(
            'name' => $request->name,
            'endpoint' => $request->endpoint,
            'method' => $request->method,
            'description' => $request->description,
            'example_parameter' => $request->example_parameter,
            'example_response' => $request->example_response,
        ));

        ApiResource::create(array(
           'api_doc_id' => $request->api_doc_id,
           'resource_id' => $resource->id,
            'depreciated' => $request->depreciated == 'on' ? true : false ,
        ));

        if($params){
            foreach ($params as $p)
                ResourceParameter::create(array(
                    'parameter_id' => $p->id,
                    'resource_id' => $resource->id
                ));
        }

        for ($i = 0; $i < count($request->p_field); $i++) {
            if ($request->p_field[$i]){
                $param = Parameter::create(array(
                    'field' => $request->p_field[$i],
                    'type' => $request->p_type[$i],
                    'description' => $request->p_description[$i],
                    'required' => $request->p_required[$i],
                ));

                ResourceParameter::create(array(
                    'parameter_id' => $param->id,
                    'resource_id' => $resource->id
                ));
            }

        }

        for ($i = 0; $i < count($request->r_field); $i++) {
            if ($request->r_field[$i]){
                Response::create(array(
                    'field' => $request->r_field[$i],
                    'type' => $request->r_type[$i],
                    'description' => $request->r_description[$i],
                    'resource_id' => $resource->id
                ));
            }

        }

        \Session::flash('alert', [
            'class' => 'success',
            'message' => 'Recurso criada com sucesso.'
        ]);

        return redirect()->route('resource.create');

    }
}
