<?php

namespace Package\Firmino\Apidoc\Http\Controllers\Docs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Package\Firmino\Apidoc\Http\Models\ApiDoc;
use Package\Firmino\Apidoc\Http\Models\HttpHeader;

class ApiDocController extends Controller
{
	public function __construct(){
        View::share('apis', ApiDoc::all());
    }
 	
 	public function saveApiDoc(Request $request){
        //dd($request->all());
        $version = ApiDoc::where('version', $request->version)->get();

        if (count($version) == 0) {
            $api = ApiDoc::create([
                'name' => $request->name,
                'description' => $request->description,
                'version' =>  'v' . $request->version,
                'base_url' => $request->base_url
            ]);

            if (isset($request->name_header[0])) {
                for ($i = 0; $i < count($request->name_header); $i++){
                    HttpHeader::create([
                        'name' => $request->name_header[$i],
                        'description' => $request->description_header[$i],
                        'api_doc_id' => $api->id
                    ]);
                }
            }
            

            \Session::flash('alert', [
                'class' => 'success',
                'message' => 'Api Doc craido com sucesso.'
            ]);

            return redirect()->route('apidoc.create');

        }else{
            \Session::flash('alert', [
                'class' => 'warning',
                'message' => 'O numero da versao ja existe.'
            ]);

            return redirect()->route('apidoc.create');
        }

    }
    
    public function updateApiDoc(Request $request, $id){
        ApiDoc::find($id)->update($request->all());

        \Session::flash('alert', [
            'class'=>'success',
            'message'=>'Dadso alterados com sucesso',
        ]);

        return redirect()->route('apidoc.edit', $id);
    }

     public function createApiDoc(){
        return view('Apidoc::forms.create.apidoc');
    }

     public function editApiDoc($id){
        return view('Apidoc::forms.edit.apidoc')
                    ->with('api', ApiDoc::find($id));
    }


}
