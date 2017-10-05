<?php

namespace Package\Firmino\Apidoc\Http\Controllers\Docs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Package\Firmino\Apidoc\Http\Models\ApiCodeStatus;
use Package\Firmino\Apidoc\Http\Models\ApiDoc;
use Package\Firmino\Apidoc\Http\Models\CodeStatus;

class HomeController extends Controller
{
    public function __construct()
    {
        View::share('apis', ApiDoc::all());
    }

    public function index($version){
        $api = ApiDoc::where('version', 'like', '%'. $version .'%')->get()[0];

        if(!isset($api))
            return "pagina em manutencao";

        return view('Apidoc::docs.index', compact('api'));
    }

    public function createCodeStatus(){
        return view('Apidoc::forms.create.code-status');
    }

    public function saveCodeStatus(Request $request){
        for ($i = 0; $i < count($request->code); $i++) {
            $code = CodeStatus::create([
                'code' => $request->code[$i],
                'error' => $request->error[$i],
                'description' => $request->description[$i]
            ]);

            ApiCodeStatus::create([
               'api_doc_id' => $request->api_doc_id,
               'code_status_id' => $code->id
            ]);
        }

        \Session::flash('alert', [
            'class' => 'success',
            'message' => 'Codigo de status criados com sucesso.'
        ]);

        return redirect()->route('codestatus.create');
    }

}
