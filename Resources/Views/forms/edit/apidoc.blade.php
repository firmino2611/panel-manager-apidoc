@extends('Apidoc::layouts.system')

@section('styles')
    <style>

    </style>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar informacoes da API Doc
            <!-- <small>Optional description</small>-->

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#"><i class="fa fa-book"></i> API Doc</a></li>
            <li class="active"> Editar</li>
        </ol>
    </section><br>

    <section class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h4>Informacoes da API</h4>
                </div>
                <div class="box-body">
                    <form action="{{ route('apidoc.update', $api->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Nome</label>
                                <input name="name" value="{{ $api->name }}" type="text" class="form-control" placeholder="Easy Pedidos! Beta">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Versao</label>
                                <input name="version" value="{{ $api->version }}" type="text" class="form-control" placeholder="1.0.0">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Url Basica</label>
                                <input name="base_url" value="{{ $api->base_url }}" type="text" class="form-control" placeholder="https://api.dominio.com.br/v1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Descricao</label>
                                <textarea rows="4" name="description" id="" type="text" class="form-control" placeholder="">{{ $api->description }}</textarea>
                            </div>
                        </div>

                        <button class="btn btn-primary">Salvar edicoes</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header">
                    <h4>Recursos da API</h4>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Endpoint</th>
                                <th>Acoes</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($api->resources as $resource)
                            <tr>
                                <td> <a href="" class=""></a> {{ $resource->name }}</td>
                                <td> <a href="" class=""></a> {{ $resource->endpoint }}</td>
                                <td>
                                    <a href="{{ route('resource.edit', [$resource->id, $api->id]) }}" class="" style="margin-right: 10px"><i class="fa  fa-edit" ></i> Editar</a>
                                    <a href="" class=""><i class="fa  fa-trash"></i> Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header">
                    <h4>Entidades da API</h4>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nome</th>
                                <th>Acoes</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($api->entities as $entity)
                            <tr>
                                <td> <a href="" class=""></a> {{ $entity->id }}</td>
                                <td> <a href="" class=""></a> {{ $entity->name }}</td>
                                <td>
                                    <a href="{{ route('entity.edit', [$entity->id, $api->id]) }}" class="" style="margin-right: 10px"><i class="fa  fa-edit" ></i> Editar</a>
                                    <a href="" class=""><i class="fa  fa-trash"></i> Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
   
@stop
