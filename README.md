# Panel Manager Api Doc
Pacote para gerenciamento de documentação de API.
Este pacote está em desenvolvimento, porém ja é possível usa-lo para gerenciar a documentação de suas API's.

[![license](https://img.shields.io/github/license/mashape/apistatus.svg)]()

# Instalação

Instalando via composer

<pre>composer require firmino/apidoc</pre>

Instalando manualmente, adicione a seguinte linha em seu arquivo <i>composer.json</i>:

<pre>"firmino/apidoc": "dev-master"</pre>

Registre o ServiceProvider em <i>config/app.php</i> 

<pre>
'providers' => [
      Package\Firmino\Apidoc\Providers\ApiDocServiceProvider::class,
]
</pre>

Registre também o Facade no mesmo arquivo 

<pre>
'aliases' => [
      'Doc' => Package\Firmino\Apidoc\Facades\Apidoc::class,
]
</pre>

## Publicando arquivos

Execute o comando abaixo para publicar os arquivos necessários para a configuração do painel

<pre>php artisan vendor:publish --provider="Package\Firmino\Apidoc\Providers\ApiDocServiceProvider"</pre>

Rode as migrações 

<pre>php artisan migrate</pre>

## Testando

Acesse a rota padrão <i>/apidoc</i> para visualizar o painel. Esta informação pode ser alterada no arquivo de configurações.

## Facade

O Facade disponivel no momento possui apenas dois métodos

#### Doc::getApis()
Retorna todas as Apis cadastrada

#### Doc::getParameters()
Retorna todos os parametros registrados





