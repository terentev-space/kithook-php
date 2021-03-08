<?php

namespace KitHook\Entities\Messages;

use KitHook\Entities\Messages\Contents\QueueHttpMessageContent;

class QueueHttpMessage extends QueueMessage
{
    public const METHOD_GET = 'get';
    public const METHOD_PUT = 'put';
    public const METHOD_POST = 'post';
    public const METHOD_DELETE = 'delete';
    public const METHOD_HEAD = 'head';
    public const METHOD_OPTIONS = 'options';
    public const METHOD_PATCH = 'patch';
    public const METHOD_TRACE = 'trace';

    /** @var string */
    private $method;
    /** @var string */
    private $uri;
    /** @var QueueHttpMessageContent|null */
    private $content;
    /** @var array|null */
    private $properties;
    /** @var array|null */
    private $headers;

    public function __construct(
        string $method,
        string $uri,
        ?QueueHttpMessageContent $content = null,
        ?array $properties = null,
        ?array $headers = null,
        ?string $id = null
    ) {
        parent::__construct(QueueMessage::TYPE_HTTP, $id);
        $this->method = $method;
        $this->uri = $uri;
        $this->content = $content;
        $this->properties = $properties;
        $this->headers = $headers;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'id' => $this->getId(),
            'method' => $this->getMethod(),
            'uri' => $this->getUri(),
            'content' => $this->getContentArray(),
            'properties' => $this->getProperties(),
            'headers' => $this->getHeaders(),
        ];
    }

    public function jsonSerialize()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return QueueHttpMessageContent|null
     */
    public function getContent(): ?QueueHttpMessageContent
    {
        return $this->content;
    }

    /**
     * @return array|null
     */
    public function getContentArray(): ?array
    {
        $content = $this->getContent();
        if ($content instanceof QueueHttpMessageContent) {
            $content = $content->toArray();
        }
        return $content;
    }

    /**
     * @return array|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }

    /**
     * @return array|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }
}
