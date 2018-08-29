<?php

namespace LogzIO\Transport;

use Elastica\Transport\Guzzle;
use Elastica\Connection;
use Elastica\Request;
use GuzzleHttp\Psr7\Uri;

class LogzIOGuzzle extends Guzzle 
{
    /**
     * Http scheme.
     *
     * @var string Http scheme
     */
    protected $_scheme = 'https';

    private $token;

    private $type;

    /**
     * @param Request    $request
     * @param Connection $connection
     *
     * @return \Psr7\Request
     */
     protected function _createPsr7Request(Request $request, Connection $connection)
     {
         $req = parent::_createPsr7Request($request, $connection);
         $uri = Uri::withQueryValue($req->getUri(), 'token', $this->token);
         $uri = Uri::withQueryValue($uri, 'type', $this->type);

         return $req->withUri($uri);
     }

     public function setToken($token) 
     {
         $this->token = $token;
     }

     public function setType($type) 
     {
         $this->type = $type;
     }
}
