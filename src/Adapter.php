<?php

namespace KitHook;

use KitHook\Builders\MessageBuilder\Builder as MessageBuilder;
use KitHook\Builders\MessageBuilder\ContentBuilder\Builder as ContentBuilder;
use KitHook\Interfaces\ClientInterface;

class Adapter
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function messageBuilder(): MessageBuilder
    {
        return new MessageBuilder();
    }

    public function contentBuilder(): ContentBuilder
    {
        return new ContentBuilder();
    }

    /**
     * @param string $uri
     * @param string|null $id
     */
    public function sendHttpGetEmpty(string $uri, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillGet($uri, $id)
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param string|null $id
     */
    public function sendHttpPostEmpty(string $uri, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillPost($uri, $id)
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param string|null $id
     */
    public function sendHttpPutEmpty(string $uri, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillPut($uri, $id)
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param string|null $id
     */
    public function sendHttpDeleteEmpty(string $uri, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillDelete($uri, $id)
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param array|object|mixed $data
     * @param string|null $id
     */
    public function sendHttpGetJson(string $uri, $data, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillGet($uri, $id)
                ->makeContent()->fillJson($data)->buildFromMessage()
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param array|object|mixed $data
     * @param string|null $id
     */
    public function sendHttpPostJson(string $uri, $data, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillPost($uri, $id)
                ->makeContent()->fillJson($data)->buildFromMessage()
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param array|object|mixed $data
     * @param string|null $id
     */
    public function sendHttpPutJson(string $uri, $data, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillPut($uri, $id)
                ->makeContent()->fillJson($data)->buildFromMessage()
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param array|object|mixed $data
     * @param string|null $id
     */
    public function sendHttpDeleteJson(string $uri, $data, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillDelete($uri, $id)
                ->makeContent()->fillJson($data)->buildFromMessage()
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param array $data
     * @param string|null $id
     */
    public function sendHttpGetForm(string $uri, array $data, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillGet($uri, $id)
                ->makeContent()->fillForm($data)->buildFromMessage()
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param array $data
     * @param string|null $id
     */
    public function sendHttpPostForm(string $uri, array $data, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillPost($uri, $id)
                ->makeContent()->fillForm($data)->buildFromMessage()
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param array $data
     * @param string|null $id
     */
    public function sendHttpPutForm(string $uri, array $data, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillPut($uri, $id)
                ->makeContent()->fillForm($data)->buildFromMessage()
                ->build()
        );
    }

    /**
     * @param string $uri
     * @param array $data
     * @param string|null $id
     */
    public function sendHttpDeleteForm(string $uri, array $data, ?string $id = null): void
    {
        $this->client->send(
            $this->messageBuilder()
                ->makeHttp()->fillDelete($uri, $id)
                ->makeContent()->fillForm($data)->buildFromMessage()
                ->build()
        );
    }
}
