<?php 

include 'Response.php';

class Request {

    const HTTP_POST_METHOD_NAME = 'POST';
    const HTTP_GET_METHOD_NAME = 'GET';

    static function matchAction($method, $uri){
        return self::matchMethod($method) && self::matchUri($uri);
    }

    static function matchMethod($method)
    {
        return $_SERVER['REQUEST_METHOD'] == $method;
    }

    static function matchUri($uri)
    {
        return $_SERVER['REQUEST_URI'] == $uri;
    }

    /**
     * Process the post http method
     *
     * @param string $endpoint      the endpoint that listen to this method
     * @param Closure $closure      the closure function that is executed when the request
     *                              matches the endpoint and the method
     * @return App\Lib\Response
     */
    static function post($uri, Closure $closure){
        if(self::matchAction(self::HTTP_POST_METHOD_NAME, $uri)){
            Response::handle($closure());
        }
    }

    /**
     * Process the get http method
     *
     * @param string $endpoint      the endpoint that listen to this method
     * @param Closure $closure      the closure function that is executed when the request
     *                              matches the endpoint and the method
     * @return App\Lib\Response
     */
    static function get($uri, Closure $closure){
        if(self::matchAction(self::HTTP_GET_METHOD_NAME, $uri)){
            Response::handle($closure());
        }
    }

}