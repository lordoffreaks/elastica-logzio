<?php
namespace LogzIO;

use Elastica\Client;
use Psr\Log\LoggerInterface;


/**
 * Client to connect the the elasticsearch server.
 *
 * @author Alejandro Tabares <alex311es@gmail.com>
 */
class LogzIOElasticaClient extends Client
{
    /**
     * @inheritdoc
     */
    public function __construct(array $config = [], $callback = null, LoggerInterface $logger = null)
    {
        $config['host'] = 'listener.logz.io';
        $config['port'] = 8071;
        $this->setConfig($config);

        parent::__construct($config, $callback, $logger);
    }
}