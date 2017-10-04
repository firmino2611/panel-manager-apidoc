@extends('Apidoc::layouts.system')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gerenciar documentação (HTTP Status Code)
            <!-- <small>Optional description</small>-->

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#"><i class="fa fa-book"></i> Documentação</a></li>
            <li class="active"> Http Status Code</li>
        </ol>
    </section><br>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('codestatus.save') }}" method="POST">
                {{ csrf_field() }}

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">HTTP Status Code  <button type="button" id="add" class="btn add">Adicionar</button></h3>
                    </div>
                    <div class="box-body" id="headers">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">Versao da API</label>
                                <select name="api_doc_id" class="form-control" id="">
                                    @foreach($apis as $api)
                                        <option value="{{ $api->id }}">{{ $api->version }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="">Codigo</label>
                                <input name="code[]" type="text" class="form-control" placeholder="Access-Token">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Eror</label>
                                <input name="error[]" type="text" class="form-control" placeholder="Access-Token">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Descricao</label>
                                <textarea name="description[]" type="text" class="form-control" placeholder=""></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-success">Criar Code Status</button>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(function(){
            $('.add').on('click', function(){
                $('#headers').append('<div class="row">\n' +
                    '                            <div class="form-group col-md-2">\n' +
                    '                                <label for="">Codigo</label>\n' +
                    '                                <input name="code[]" type="text" class="form-control" placeholder="Access-Token">\n' +
                    '                            </div>\n' +
                    '                            <div class="form-group col-md-4">\n' +
                    '                                <label for="">Eror</label>\n' +
                    '                                <input name="error[]" type="text" class="form-control" placeholder="Access-Token">\n' +
                    '                            </div>\n' +
                    '                            <div class="form-group col-md-4">\n' +
                    '                                <label for="">Descricao</label>\n' +
                    '                                <textarea name="description[]" type="text" class="form-control" placeholder=""></textarea>\n' +
                    '                            </div>\n' +
                    '                            <div class="col-md-2">\n' +
                    '                                <button type="button" id="delete" class="btn btn-danger delete">Excluir</button>\n' +
                    '                            </div>\n' +
                    '                        </div>');

                $('.delete').on('click', function(){
                    $(this).parent().parent().html('');
                });
            });


        })
    </script>
@endsection