<?php

namespace Package\Firmino\Apidoc\Http\Models; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ResponseApi extends Model
{
    /**
    *   Metodo para retornar as respostas da API
    *   @param array $option [type, content, responseCode] obrigatorio, opcional [description]
    *   @return array $response
    **/
    public static function default($options){
        return [
            'data' => [
                'type' => $options['type'],
                'content' => $options['content'],
                'description'=> $options['description'] ?? ""
            ],
            'responseCode' => $options['responseCode']
        ];
    }

    public static function success200($options){
        return [
            'code' => 200,
            'error' => 'Ok',
            'description' => 'Operação realizada com sucesso.',
            'itens' => $options['content'] ?? null,
        ];
    }

    public static function success201($options){
        return [
            'code' => 201,
            'error' => 'Created',
            'description' => 'A solicitação foi realizada, resultando na criação de um novo recurso.',
            'iten' => $options['content'] ?? null
        ];
    }

    public static function error400(){
        return [
            'code' => 400,
            'error' => 'Bad Request',
            'description' => 'A requisição possui parâmetro(s) inválido(s).'
        ];
    }

    public static function error401(){
        return [
            'code' => 401,
            'error' => 'Unauthorized',
            'description' => 'Verifique os dados enviados no cabecalho. O token ou o user-id podem estar incorreto'
        ];
    }

    public static function error404($options = null){
        return [
            'code' => 404,
            'error' => 'Not Found',
            'description' => 'O recurso informado no request não foi encontrado.'
        ];
    }


    public static function error405(){
        return [
            'code' => 405,
            'error' => 'Method Not Allowed',
            'description' => 'Url incorreta'
        ];
    }

    public static function error409(){
        return [
            'data' => [
                'content' => 'Conflito, registro existente',
                'description'=> 'Ja existe um registro com esse endereco de email'
            ],
            'responseCode' => 409
        ];
    }

    public static function error500(){
        return [
            'data' => [
                'content' => 'Requisicao invalida, verifique se os parametros foram enviados corretamente',
                'description'=> ''
            ],
            'responseCode' => 500
        ];
    }

    public static function errorApi(){
        return [
            'data' => [
                'content' => 'Requisicao invalida, verifique se os parametros foram enviados corretamente',
                'description'=> ''
            ],
            'responseCode' => 500
        ];
    }

}
