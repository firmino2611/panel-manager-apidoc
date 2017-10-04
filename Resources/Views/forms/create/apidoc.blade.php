@extends('Apidoc::layouts.system')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gerenciar documentação
            <!-- <small>Optional description</small>-->

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#"><i class="fa fa-book"></i> Documentação</a></li>
            <li class="active"> Criar</li>
        </ol>
    </section><br>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('apidoc.save') }}" method="POST">
                {{ csrf_field() }}
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Criar API Doc</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-6">
                            <label for="">Nome</label>
                            <input name="name" type="text" class="form-control" placeholder="Easy Pedidos! Beta">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Versao</label>
                            <input name="version" type="text" class="form-control" placeholder="1.0.0">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Url Basica</label>
                            <input name="base_url" type="text" class="form-control" placeholder="https://api.dominio.com.br/v1">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Descricao</label>
                            <textarea name="description" id="" type="text" class="form-control" placeholder=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">HTTP Headers  <button type="button" id="add" class="btn add">Adicionar</button></h3>
                    </div>
                    <div class="box-body" id="headers">
                        <div class="">
                            <div class="form-group col-md-4">
                                <label for="">Nome do campo</label>
                                <input name="name_header[]" type="text" class="form-control" placeholder="Access-Token">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Descricao</label>
                                <textarea name="description_header[]" type="text" class="form-control" placeholder=""></textarea>
                            </div>
                        </div>

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
                $('#headers').append('<div class="">\n' +
                    '                            <div class="form-group col-md-4">\n' +
                    '                                <label for="">Nome</label>\n' +
                    '                                <input name="name_header[]" type="text" class="form-control" placeholder="Easy Pedidos! Beta">\n' +
                    '                            </div>\n' +
                    '                            <div class="form-group col-md-6">\n' +
                    '                                <label for="">Descricao</label>\n' +
                    '                                <textarea name="description_header[]" type="text" class="form-control" placeholder=""></textarea>\n' +
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