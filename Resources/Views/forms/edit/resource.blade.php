@extends('Apidoc::layouts.system')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gerenciar documentação (Recursos - Endpoints)
            <!-- <small>Optional description</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#"><i class="fa fa-book"></i> Documentação</a></li>
            <li class="active"> Recursos</li>
        </ol>
    </section><br>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('resource.update', [$resource->id, $apiDoc->id]) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Recursos (endpoints)</h3>
                    </div>
                    <div class="box-body" >
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">Versao da API</label>
                                <select name="api_doc_id" class="form-control" id="">
                                    <option selected value="{{ $apiDoc->id }}">{{ $apiDoc->version }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">Nome</label>
                                <input required value="{{ $resource->name }}" name="name" type="text" class="form-control" placeholder="Orders">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Endpoint (url)</label>
                                <input required value="{{ $resource->endpoint }}" name="endpoint" type="text" class="form-control" placeholder="/orders/{id}" style="font-weight: bold; font-family: 'Consolas' ">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Metodo HTTP</label>
                                <select required name="method" type="text" class="form-control" >
                                    <option {{ $resource->method == 'GET' ? 'selected' : '' }} value="GET">GET</option>
                                    <option {{ $resource->method == 'POST' ? 'selected' : '' }} value="POST">POST</option>
                                    <option {{ $resource->method == 'PUT' ? 'selected' : '' }} value="PUT">PUT</option>
                                    <option {{ $resource->method == 'DELETE' ? 'selected' : '' }} value="DELETE">DELETE</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Descricao</label>
                                <textarea value="" name="description" type="text" class="form-control" placeholder="">{{ $resource->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label style="font-size: 13pt" class="label label-warning">Depreciado: </label>
                            <input {{ $resource->depreciated ? 'checked' : ''}} name="depreciated" type="checkbox" style="margin-left: 10px" >
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">
                        <h4 class="box-title">Parametros de entrada  <button type="button" id="add" class="btn add">Adicionar</button></h4>
                    </div>
                    <div class="box-body">
                        <di class="row">
                            <div class="form-group col-md-12">
                                <label for="">Selecionar parametros ja cadastrados</label>
                                <select class="form-control" name="parameter[]" id="" multiple>
                                    @foreach(\Package\Firmino\Apidoc\Http\Models\Parameter::all() as $param)
                                        <option value="{{ $param->id }}">
                                            {{ $param->field }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </di>

                        <div id="headers">
                            @foreach($resource->parameters as $param)
                                <div class="row">
                                    <input type="hidden" name="p_id[]" value="{{ $param->id }}">
                                    <div class="form-group col-md-2">
                                        <label for="">Campo</label>
                                        <input value="{{ $param->field }}"  name="p_field[]" type="text" class="form-control" placeholder="id">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Tipo</label>
                                        <input  value="{{ $param->type }}" name="p_type[]" type="text" class="form-control" placeholder="inteiro">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Descricao</label>
                                        <textarea name="p_description[]" type="text" class="form-control" placeholder="">{{ $param->description }}</textarea>
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <label style="font-size: " class="">Obrigatorio: </label>
                                        <select name="p_required[]" value="off" type="checkbox"  class="form-control" >
                                            <option {{ !$param->required ? 'selected' : '' }} value="0">Nao</option>
                                            <option {{ $param->required ? 'selected' : '' }} value="1">Sim</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2" style="padding-top: 25px">
                                        <button type="button" class="btn btn-danger delete">Excluir</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h4>Exemplo de requisicao</h4>
                        <div class="form-group col-md-12">
                            <textarea name="example_parameter" class="form-control summernote" >{{ $resource->example_parameter }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">
                        <h4 class="box-title">Dados de saida<button type="button" id="add" class="btn add2">Adicionar</button></h4>
                    </div>
                    <div class="box-body">
                        <div id="headers2">
                            @foreach($resource->responses as $response)
                                <div class="row">
                                    <input type="hidden" name="r_id[]" value="{{ $response->id }}">
                                    <div class="form-group col-md-2">
                                        <label for="">Campo</label>
                                        <input value="{{ $response->field }}" name="r_field[]" type="text" class="form-control" placeholder="id">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Tipo</label>
                                        <input value="{{ $response->type }}" name="r_type[]" type="text" class="form-control" placeholder="inteiro">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="">Descricao</label>
                                        <textarea name="r_description[]" type="text" class="form-control" placeholder="">{{ $response->description }}</textarea>
                                    </div>
                                    <div class="col-md-2"  style="padding-top: 25px">
                                        <button type="button" class="btn btn-danger delete2" >Excluir</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h4>Exemplo de requisicao</h4>
                        <div class="form-group col-md-12">
                            <textarea name="example_response" class="form-control summernote">  {{ $resource->example_response }}  </textarea>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-success">Salvar recurso</button>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(function(){
            $('.add').on('click', function(){
                $('#headers').append('<div class="row">\n' +

                    '                                <div class="form-group col-md-2">\n' +
                    '                                    <label for="">Campo</label>\n' +
                    '                                    <input required name="p_field[]" type="text" class="form-control" placeholder="id">\n' +
                    '                                </div>\n' +
                    '                                <div class="form-group col-md-2">\n' +
                    '                                    <label for="">Tipo</label>\n' +
                    '                                    <input required name="p_type[]" type="text" class="form-control" placeholder="inteiro">\n' +
                    '                                </div>\n' +
                    '                                <div class="form-group col-md-4">\n' +
                    '                                    <label for="">Descricao</label>\n' +
                    '                                    <textarea name="p_description[]" type="text" class="form-control" placeholder=""></textarea>\n' +
                    '                                </div>\n' +
                    '                                <div class="form-group col-md-2" >\n' +
                    '                                    <label style="font-size: " class="">Obrigatorio: </label>\n' +
                    '                                    <select name="p_required[]" value="off" type="checkbox"  class="form-control" >\n' +
                    '                                        <option selected value="0">Nao</option>\n' +
                    '                                        <option value="1">Sim</option>\n' +
                    '                                    </select>\n' +
                    '                                </div>\n' +
                    '                                <div class="col-md-2" style="padding-top: 25px">\n' +
                    '                                    <button class="btn btn-danger delete">Excluir</button>\n' +
                    '                                </div>\n' +
                    '                            </div>');

                $('.delete').on('click', function(){
                    $(this).parent().parent().html('');
                });
            });

            $('.delete').on('click', function(){
                $(this).parent().parent().html('');
            });


            $('.add2').on('click', function(){
                $('#headers2').append('<div class="row">\n' +
                    '                                    <input type="hidden" name="r_id[]">\n' +
                    '                                    <div class="form-group col-md-2">\n' +
                    '                                        <label for="">Campo</label>\n' +
                    '                                        <input name="r_field[]" type="text" class="form-control" placeholder="id">\n' +
                    '                                    </div>\n' +
                    '                                    <div class="form-group col-md-2">\n' +
                    '                                        <label for="">Tipo</label>\n' +
                    '                                        <input name="r_type[]" type="text" class="form-control" placeholder="inteiro">\n' +
                    '                                    </div>\n' +
                    '                                    <div class="form-group col-md-5">\n' +
                    '                                        <label for="">Descricao</label>\n' +
                    '                                        <textarea name="r_description[]" type="text" class="form-control" placeholder=""></textarea>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="col-md-2"  style="padding-top: 25px">\n' +
                    '                                        <button type="button" class="btn btn-danger delete2" >Excluir</button>\n' +
                    '                                    </div>\n' +
                    '                                </div>');

                $('.delete2').on('click', function(){
                    $(this).parent().parent().html('');
                });
            });

            $('.delete2').on('click', function(){
                $(this).parent().parent().html('');
            });

        })
    </script>
@endsection