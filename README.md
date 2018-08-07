# Panel Manager Api Doc
Pacote para gerenciamento de documentação de API.
Este pacote está em desenvolvimento, porém ja é possível usa-lo para gerenciar a documentação de suas API's.

[![license](https://img.shields.io/github/license/mashape/apistatus.svg)]()

Para mais detalhes veja a documentação completa [![Wiki](https://github.com/firmino2611/panel-manager-apidoc/wiki/--Home)]() **(ainda em construção)**
# Instalação

Instalando via composer

```javascript composer require firmino/apidoc ```

Instalando manualmente, adicione a seguinte linha em seu arquivo <i>composer.json</i>:

```javascript "firmino/apidoc": "dev-master" ```

Registre o ServiceProvider em <i>config/app.php</i> 

```php
'providers' => [
      Package\Firmino\Apidoc\Providers\ApiDocServiceProvider::class,
]
```

Registre também o Facade no mesmo arquivo 

```php
'aliases' => [
      'Doc' => Package\Firmino\Apidoc\Facades\Apidoc::class,
]
```

## Publicando arquivos

Execute o comando abaixo para publicar os arquivos necessários para a configuração do painel

```php php artisan vendor:publish --provider="Package\Firmino\Apidoc\Providers\ApiDocServiceProvider" ```

Rode as migrações 

```php php artisan migrate ```
## Testando

Acesse a rota padrão <i>/apidoc</i> para visualizar o painel. Esta informação pode ser alterada no arquivo de configurações.

## Facade

O Facade disponivel no momento possui apenas dois métodos

#### Doc::getApis()
Retorna todas as Apis cadastrada

#### Doc::getParameters()
Retorna todos os parametros registrados





