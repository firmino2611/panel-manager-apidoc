<?php

namespace Package\Firmino\Apidoc\Http\Controllers\Docs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Package\Firmino\Apidoc\Http\Models\Entity;
use Package\Firmino\Apidoc\Http\Models\ApiEntity;
use Package\Firmino\Apidoc\Http\Models\Field;
use Package\Firmino\Apidoc\Http\Models\ApiDoc;

class EntityController extends Controller
{
	 public function __construct()
    {
        View::share('apis', ApiDoc::all());
    }

     public function createEntity(){
        return view('Apidoc::forms.create.entity');
    }

     public function editEntity($id, $api){
        return view('Apidoc::forms.edit.entity')
                    ->with('entity', Entity::find($id))
                    ->with('apiDoc', ApiDoc::find($api));
    }

     public function updateEntity(Request $request){
        $entity = Entity::find($request->route()->parameter('id'));
        $entity->update(array(
            'name' => $request->name,
            'description' => $request->description
        ));

        foreach ($entity->fields as $field)
            Field::destroy($field->id);

        for ($i = 0; $i < count($request->field); $i++) {
            Field::create([
                'field' => $request->field[$i],
                'type' => $request->type[$i],
                'description' => $request->f_description[$i],
                'entity_id' => $entity->id,
            ]);
        }
        \Session::flash('alert', [
            'class' => 'success',
            'message' => 'Entidade editada com sucesso.'
        ]);

        return redirect()->route('entity.edit', [$entity->id, $request->route()->parameter('api')]);

    }

     public function saveEntity(Request $request){
        $entity = Entity::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        ApiEntity::create([
            'api_doc_id' => $request->api_doc_id,
            'entity_id' => $entity->id
        ]);

        for ($i = 0; $i < count($request->field); $i++) {
            Field::create([
                'field' => $request->field[$i],
                'type' => $request->type[$i],
                'description' => $request->f_description[$i],
                'entity_id' => $entity->id,
            ]);
        }

        \Session::flash('alert', [
            'class' => 'success',
            'message' => 'Entidade criada com sucesso.'
        ]);

        return redirect()->route('entity.create');

    }
}
