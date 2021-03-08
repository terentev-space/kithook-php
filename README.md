# KitHook PHP

[![Latest Version](https://img.shields.io/github/release/terentev-space/kithook-php.svg?style=flat-square)](https://github.com/terentev-space/kithook-php/releases)
[![Software License](https://img.shields.io/badge/license-Apache_2.0-brightgreen.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/terentev-space/kithook-php.svg?style=flat-square)](https://packagist.org/packages/terentev-space/kithook-php)

#### 🚧 Attention: the project is currently under development! 🚧

**Note:** Before using it, you need to deploy and configure [KitHook](https://github.com/terentev-space/kithook)

KitHook client for PHP

## Install

For RabbitMq use [kithook-php-rabbitmq](https://github.com/terentev-space/kithook-php-rabbitmq)
```bash
$ composer require terentev-space/kithook-php-rabbitmq
```

For Kafka use [kithook-php-kafka](https://github.com/terentev-space/kithook-php-kafka)
```bash
$ composer require terentev-space/kithook-php-kafka
```

## Usage

Data:
```php
$yourWebhookUri = 'https://example.com';
$yourWebhookId = 'myId-123';

$yourElseContentType = 'application/xml';

// Json
$yourWebhookJsonData = [
    'anything'
];
// Form
$yourWebhookFormData = [
    'param1' => 'value1',
];
// Query
$yourWebhookQueryData = [
    'param1' => 'value1',
];
// Xml
$yourWebhookXmlData = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<example>
<!-- ... -->
</example>
XML;
```

Examples:
```php
/** @var \KitHook\Interfaces\ClientInterface|\KitHook\Adapter $client **/

// Simple HTTP Put Json
$client->sendHttpPutJson($yourWebhookUri, $yourWebhookJsonData, $yourWebhookId);
// Simple HTTP Post Form
$client->sendHttpPostForm($yourWebhookUri, $yourWebhookFormData, $yourWebhookId);
// Simple HTTP Get Query
$client->sendHttpGetEmpty($yourWebhookUri . '?' . http_build_query($yourWebhookQueryData), $yourWebhookId);

// Build
$content = $client->contentBuilder()->makeHttp()
    // OR
    ->withType(\KitHook\Entities\Messages\Contents\QueueHttpMessageContent::TYPE_ELSE)
    ->withData($yourWebhookXmlData)
    ->withFormatForElseType($yourElseContentType)
    // OR
    ->fillElse($yourWebhookXmlData, $yourElseContentType)
    // FINALLY
    ->build();

$message = $client->messageBuilder()->makeHttp()
    // OR
    ->withId($yourWebhookId)
    ->withUri($yourWebhookUri)
    ->withMethod(\KitHook\Entities\Messages\QueueHttpMessage::METHOD_POST)
    ->withContent($content)
    // OR
    ->fillPost($yourWebhookUri, $yourWebhookId, $content, [/* headers */], [/* properties */])
    // OR
    ->fillPost($yourWebhookUri, $yourWebhookId)
    ->makeContent()
    ->fillForm($yourWebhookFormData)
    ->buildFromMessage()
    // FINALLY
    ->build();

$client->send($message);
```

## Credits

- [Ivan Terentev](https://github.com/terentev-space)
- [All Contributors](https://github.com/terentev-space/kithook-php/contributors)

## License

The Apache 2.0 License (Apache-2.0). Please see [License File](LICENSE) for more information.
