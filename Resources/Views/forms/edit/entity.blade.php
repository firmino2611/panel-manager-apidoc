@extends('Apidoc::layouts.system')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gerenciar documentação (Entidades)
            <!-- <small>Optional description</small>-->

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#"><i class="fa fa-book"></i> Documentação</a></li>
            <li class="active"> Entidade</li>
        </ol>
    </section><br>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('entity.update', [$entity->id, $apiDoc->id]) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Entidade </h3>
                    </div>
                    <div class="box-body" id="headers">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">Versao da API</label>
                                <select name="api_doc_id" class="form-control" id="">
                                        <option value="{{ $apiDoc->id }}">{{ $apiDoc->version }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Nome</label>
                                <input value="{{ $entity->name }}" required name="name" type="text" class="form-control" placeholder="Orders">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Descricao</label>
                                <textarea  name="description" type="text" class="form-control" placeholder="">{{ $entity->description }}</textarea>
                            </div>
                        </div>
                        <h4>Campos da entidade  <button type="button" id="add" class="btn add">Adicionar</button></h4>
                        @foreach($entity->fields as $field)
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">Campo</label>
                                    <input value="{{ $field->field }}" required name="field[]" type="text" class="form-control" placeholder="id">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Tipo</label>
                                    <input value="{{ $field->type }}" required name="type[]" type="text" class="form-control" placeholder="inteiron">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Descricao</label>
                                    <textarea name="f_description[]" type="text" class="form-control" placeholder="">{{ $field->description }}</textarea>
                                </div>
                                <div class="col-md-2" style="padding-top: 25px">
                                    <button type="button" class="btn btn-danger delete">Excluir</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Criar API Doc</button>
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
                    '                                <label for="">Campo</label>\n' +
                    '                                <input required name="field[]" type="text" class="form-control" placeholder="Access-Token">\n' +
                    '                            </div>\n' +
                    '                            <div class="form-group col-md-4">\n' +
                    '                                <label for="">Tipo</label>\n' +
                    '                                <input required name="type[]" type="text" class="form-control" placeholder="Access-Token">\n' +
                    '                            </div>\n' +
                    '                            <div class="form-group col-md-4">\n' +
                    '                                <label for="">Descricao</label>\n' +
                    '                                <textarea name="f_description[]" type="text" class="form-control" placeholder=""></textarea>\n' +
                    '                            </div>\n' +
                    '                            <div class="col-md-2" style="padding-top: 25px">\n' +
                    '                                <button class="btn btn-danger delete">Excluir</button>\n' +
                    '                            </div>\n' +
                    '                        </div>');

                $('.delete').on('click', function(){
                    //$(this).parent().parent().css('display', 'none');
                    $(this).parent().parent().html('');
                });
            });

            $('.delete').on('click', function(){
                //$(this).parent().parent().css('display', 'none');
                $(this).parent().parent().html('');
            });

        })
    </script>
@endsection