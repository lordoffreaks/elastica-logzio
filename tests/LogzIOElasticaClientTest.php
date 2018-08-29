<?php

declare(strict_types=1);

use LogzIO\LogzIOElasticaClient;
use LogzIO\Transport\LogzIOGuzzle;
use PHPUnit\Framework\TestCase;

final class LogzIOElasticaClientTest extends TestCase
{
  public function testCanBeInstanciatedWithoutErrors(): void
  {

    $config = [];
    $config['transport'] = new LogzIOGuzzle();
    $config['transport']->setToken('YOUR_API_KEY');
    $config['transport']->setType('record');

    $client = new LogzIOElasticaClient($config);

      $this->assertInstanceOf(
            LogzIOElasticaClient::class,
            $client
      );
  }
}
