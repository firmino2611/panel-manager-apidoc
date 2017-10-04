@extends('Apidoc::layouts.doc')

@section('styles')
    <style>
        pre{
            background: #3F3F3F;
            color: white;
        }
        p{
            font-size: 12pt;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-sm-12">

            {{--<div class="box">--}}
                {{--<div class="box-body">--}}

                {{--</div>--}}
            {{--</div>--}}

            <div id="description">
                <h1>API Docs</h1>
                <h3>Versao {{ $api->version }}</h3>
                <h4>{{ $api->name }}</h4>
                <p>{{ $api->description }}</p>
                <p>A url base para as requisicoes e </p>
                <pre>{{ $api->base_url }}</pre>
            </div>

            <div id="header-http">
                <h1>HTTP Headers</h1>
                <p>Todas as chamadas da API EasyPedidos necessitam que as informações abaixo estejam presentes no Header na requisição:</p>
                @foreach($api->httpHeaders as $header)
                    <p>
                        <strong>{{ $header->name }}:</strong>
                        {{ $header->description }}
                    </p>
                @endforeach
            </div>

            <div id="status-http">
                <h1>HTTP Status Code</h1>
                {{--<p>Todas as chamadas da API EasyPedidos necessitam que as informações abaixo estejam presentes no Header na requisição:</p>--}}
                <div class="box">
                    <div class="box-body">
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <th>Code</th>
                                    <th>Erro</th>
                                    <th>Descricao</th>
                                </tr>
                                @foreach($api->codeStatus as $status)
                                    <tr>
                                        <td>{{ $status->code }}</td>
                                        <td>{{ $status->error }}</td>
                                        <td>{{ $status->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="entidades">
                <h1>Entidades</h1>
                @foreach($api->entities as $entity)
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $entity->name }}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>{{ $entity->description }}</p>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Campo</th>
                                    <th>tipo</th>
                                    <th>Descricao</th>
                                </tr>
                                @foreach($entity->fields as $field)
                                    <tr>
                                        <td>{{ $field->field }}</td>
                                        <td>{{ $field->type }}</td>
                                        <td>{{ $field->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                @Endforeach
            </div>

            <div id="recursos">
                <h1>Recursos</h1>
                @foreach($api->resources as $resource)
                    @if($resource->method == 'GET')
                        <div class="box box-success collapsed-box">
                    @elseif($resource->method == 'POST')
                        <div class="box box-primary collapsed-box">
                    @elseif($resource->method == 'DELETE')
                        <div class="box box-danger collapsed-box">
                    @elseif($resource->method == 'PUT')
                        <div class="box box-warning collapsed-box">
                    @endif
                   
                    <div class="box-header with-border" >
                        @if($resource->method == 'GET')
                            <h3 class="box-title"><span class="label label-success">{{ $resource->method }}</span> {{ $resource->name }} </h3>
                        @elseif($resource->method == 'POST')
                            <h3 class="box-title"><span class="label label-primary">{{ $resource->method }}</span> {{ $resource->name }} </h3>
                        @elseif($resource->method == 'DELETE')
                            <h3 class="box-title"><span class="label label-danger">{{ $resource->method }}</span> {{ $resource->name }} </h3>
                        @elseif($resource->method == 'PUT')
                            <h3 class="box-title"><span class="label label-warning">{{ $resource->method }}</span> {{ $resource->name }}</h3>
                        @endif
                        <div class="box-tools pull-right">
                            {!! $resource->depreciated ? ' <label ;rigth: 0px" class="label label-warning">(Depreciado) </label>' : '' !!}
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>{{ $resource->description }}</p>
                        <h4>Endpoint</h4>
                        <p><pre>{{ $resource->method }} {{ $resource->endpoint }}</pre></p>
                        <h3>Parametros de entrada</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Campo</th>
                                    <th>tipo</th>
                                    <th>Descricao</th>
                                    <th>Obrigatorio</th>
                                </tr>
                                @foreach($resource->parameters as $param)
                                    <tr>
                                        <td>{{ $param->field }}</td>
                                        <td>{{ $param->type }}</td>
                                        <td>{{ $param->description }}</td>
                                        <td>{{ $param->required ? 'sim' : 'nao' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h4>Exemplo de requisicao</h4>
                        {!! $resource->example_parameter !!}

                        <h3>Dados de saida</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Campo</th>
                                    <th>tipo</th>
                                    <th>Descricao</th>
                                </tr>
                                @foreach($resource->responses as $response)
                                    <tr>
                                        <td>{{ $response->field }}</td>
                                        <td>{{ $response->type }}</td>
                                        <td>{{ $response->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h4>Exemplo de resposta</h4>
                        {!! $resource->example_response !!}

                    </div>
                    <!-- /.box-body -->
                </div>
                @endforeach

            </div>




        </div>
    </div>

@endsection