<?php

namespace App\Http;


class Request
{
    public static function  post($url = null, $contains = false)
    {
        $req = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "POST") {
            if ($url === null) {
                return true;
            } else {
                if ($contains) {
                    if (str_contains($req, $url)) {
                        return true;
                    }
                } else {
                    if ($url === $req) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public static function  get($url = null, $contains = false, $params = false)
    {

        $req = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "GET") {
            if ($url === null) {
                return true;
            } else {
                if ($contains) {
                    if (str_contains($req, $url)) {
                        return true;
                    }
                } else {
                    if ($params && is_array($params)) {
                        $paramsNumber = count($params);
                        $explode = explode('/', $req);
                        $explodeUrl = explode('/', $url);
                        if (str_contains($req, $url) && ($paramsNumber === (count($explode) - count($explodeUrl)))) {
                            if ($paramsNumber == 1) {
                                $id = $explode[count($explode) - 1];
                                return [$params[0] => $id];
                            } else {
                                $pars = [];
                                for ($i = 0; $i < $paramsNumber; $i++) {
                                    $id = $explode[count($explode) + ($i - $paramsNumber)];
                                    $pars[] = [$params[$i] => $id];
                                }
                                return $pars;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        if ($url === $req) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }



    public static function put($params = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            if ($params != null) {
                if (isset($_REQUEST[$params])) {
                    return true;
                }
            } else {
                return true;
            }
        }
        return false;
    }
    public static function delete($params = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ($params != null) {
                if (isset($_REQUEST[$params])) {
                    return true;
                }
            } else {
                return true;
            }
        }
        return false;
    }


    public static function validate($data)
    {

        // Get the request method
        $method = $_SERVER['REQUEST_METHOD'];
        $req = $_REQUEST;

        // Get the request body
        // $body = file_get_contents('php://input');

        // Validate the request method
        if ($method !== 'POST') {
            http_response_code(405);
            echo 'Method Not Allowed';
            exit;
        }

        foreach ($data as $value) {
            if (isset($req[$value])) {
            } else {
                return false;
            }
        }

        return true;
    }

    public static function  getParams($params)
    {
        $req = $_SERVER['REQUEST_URI'];
        $paramsNumber = count($params);
        $explode = explode('/', $req);
        if ($paramsNumber == 1) {
            $id = $explode[count($explode) - 1];
            return [$params[0] => $id];
        } else {
            $pars = [];
            for ($i = 0; $i < $paramsNumber; $i++) {
                $id = $explode[count($explode) + ($i - $paramsNumber)];
                $pars[] = [$params[$i] => $id];
            }
            return $pars;
        }
    }
    public static function  params()
    {
        return $_REQUEST;
    }
}

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle)
    {
        return strpos($haystack, $needle) !== false;
    }
}
