<?php

include 'Response.php';

class Request
{

    const HTTP_POST_METHOD_NAME = 'POST';
    const HTTP_GET_METHOD_NAME = 'GET';

    /**
     * Check if the method and the uri matches the request
     *
     * @param string $method    the method to match
     * @param string $uri       The uri part of the url to match
     * @return boolean
     */
    public static function matchAction($method, $uri)
    {
        return self::matchMethod($method) && self::matchUri($uri);
    }

    /**
     * Check if the method matches the request
     *
     * @param string $method    the method to match
     * @param string $uri       The uri part of the url to match
     * @return boolean
     */
    public static function matchMethod($method)
    {
        return $_SERVER['REQUEST_METHOD'] == $method;
    }

    /**
     * Check if the uri matches the request
     *
     * @param string $method    the method to match
     * @param string $uri       The uri part of the url to match
     * @return boolean
     */
    public static function matchUri($uri)
    {
        $matchExpression = sprintf('~^%s$~', $uri);
        return preg_match($matchExpression, $_SERVER['REQUEST_URI']);
    }

    /**
     * Process the post request
     *
     * @param string $endpoint      the endpoint that listen to this method
     * @param Closure $closure      the closure function that is executed when the request
     *                              matches the endpoint and the method
     * @return Response
     */
    public static function post($uri, Closure $closure)
    {
        if (self::matchAction(self::HTTP_POST_METHOD_NAME, $uri)) {
            $context = self::getContext($uri);
            $closure($context);
        }
    }

    public static function getContext($uri)
    {
        $context = [];
        preg_match(sprintf('~%s~', $uri), $_SERVER['REQUEST_URI'], $context);
        return array_pop($context);
    }

    /**
     * Process the get request
     *
     * @param string $endpoint      the endpoint that listen to this method
     * @param Closure $closure      the closure function that is executed when the request
     *                              matches the endpoint and the method
     * @return Response
     */
    public static function get($uri, Closure $closure)
    {
        if (self::matchAction(self::HTTP_GET_METHOD_NAME, $uri)) {
            $context = self::getContext($uri);
            $closure($context);
        }
    }

}
