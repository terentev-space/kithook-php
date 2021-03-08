<?php

namespace KitHook\Builders\MessageBuilder\Entities;

use KitHook\Entities\Messages\Contents\QueueHttpMessageContent;
use KitHook\Entities\Messages\QueueHttpMessage;

class HttpMessageBlueprint extends MessageBlueprint
{
    /** @var string */
    private $method;
    /** @var string */
    private $uri;
    /** @var QueueHttpMessageContent|null */
    private $content = null;
    /** @var array|null */
    private $properties = null;
    /** @var array|null */
    private $headers = null;

    public function __construct()
    {
        $this->setType(QueueHttpMessage::TYPE_HTTP);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @return QueueHttpMessageContent|null
     */
    public function getContent(): ?QueueHttpMessageContent
    {
        return $this->content;
    }

    /**
     * @param QueueHttpMessageContent|null $content
     */
    public function setContent(?QueueHttpMessageContent $content): void
    {
        $this->content = $content;
    }

    /**
     * @return array|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }

    /**
     * @param array|null $properties
     */
    public function setProperties(?array $properties): void
    {
        $this->properties = $properties;
    }

    /**
     * @return array|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * @param array|null $headers
     */
    public function setHeaders(?array $headers): void
    {
        $this->headers = $headers;
    }
}
