# PHP Logz.io Logger

PHP library to send realtime logs to Logz.io, an ELK as a service.

### Installing

Install with composer:

```sh
$ composer require lordoffreaks/elastica-logzio
```

### Usage

First of all, you need an account on Logz.io. Then, go to you profile settings and get your api key (token).

#### Configure
To configure the library, you just need to get an instance of `LogzIO\Transport\LogzIOGuzzle`, set the `token` and the the `type`. You need to do it once per Transport. After that create an instance of `LogzIO\LogzIOElasticaClient` and use it as a normal `Elastica\Client` client.

```sh
<?php
use LogzIO\LogzIOElasticaClient;
use LogzIO\Transport\LogzIOGuzzle;

$config = [];
$config['transport'] = new LogzIOGuzzle();
$config['transport']->setToken('YOUR_API_KEY');
$config['transport']->setType('record');

$client = new LogzIOElasticaClient($config);
```

#### Sending logs
To send a log, you need to get an instance of `LogzIO\LogzIOElasticaClient` and use it as a normal `Elastica\Client` client:

```sh
<?php
use LogzIO\LogzIOElasticaClient;
use LogzIO\Transport\LogzIOGuzzle;

$config = [];
$config['transport'] = new LogzIOGuzzle();
$config['transport']->setToken('YOUR_API_KEY');
$config['transport']->setType('record');

$client = new LogzIOElasticaClient($config);
$data = [
    'name' => 'Alejandro',
    'surname' => 'Tabares',
];

// First parameter is the id of document.
$documents = [
    new \Elastica\Document($id, $data)
];

$resp = $client->addDocuments([$documents);
```

#### Usage with Monolog
As described in https://github.com/Seldaek/monolog/blob/master/src/Monolog/Handler/ElasticSearchHandler.php#L23 just:

```sh
<?php
use LogzIO\LogzIOElasticaClient;
use LogzIO\Transport\LogzIOGuzzle;

// Your type.
$type = 'record';
$config = [];
$config['transport'] = new LogzIOGuzzle();
$config['transport']->setToken('YOUR_API_KEY');
$config['transport']->setType($type);

$client = new LogzIOElasticaClient($config);

$options = array(
    'index' => 'YOUR_INDEX_NAME',
    'type' => $type,
);

$handler = new ElasticSearchHandler($client, $options);
$log = new Logger('application');
$log->pushHandler($handler);
```

### Contributing

To contribute, create a fork, make your changes, make tests, test and create a PR.


### License

This library is licenced under MIT.
