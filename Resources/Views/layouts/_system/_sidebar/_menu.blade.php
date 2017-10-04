<li class="header">MENU</li>
  <!-- Optionally, you can add icons to the links -->

<li class="treeview">
    <a href="#"><i class="fa  fa-book "></i> <span>Documentação</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @foreach(Doc::getApis() as $api)
            <li><a href="{{ route('doc.index', 'v'.explode('.', $api->version)[0]) }}" target="_blank"><i class="fa  fa-circle-o"></i> {{$api->version }}</a></li>
        @endforeach
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa  fa-book "></i> <span>Gerenciar API Doc</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="treeview">
            <a href="#"><i class="fa fa-circle-o "></i> <span>Versoes da API</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('apidoc.create') }}"><i class="fa fa-arrows-h"></i>Nova versao</a></li>
                @foreach(Doc::getApis() as $api)
                    <li><a href="{{ route('apidoc.edit', $api->id) }}"><i class="fa fa-arrows-h"></i>{{ $api->version }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('codestatus.create') }}"><i class="fa  fa-circle-o"></i> Http Status Code</a></li>
        <li><a href="{{ route('entity.create') }}"><i class="fa  fa-circle-o"></i> Entidades</a></li>
        <li><a href="{{ route('resource.create') }}"><i class="fa  fa-circle-o"></i> Recursos</a></li>
    </ul>
</li>

