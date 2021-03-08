<?php

namespace KitHook\Builders\MessageBuilder;

use InvalidArgumentException;
use KitHook\Builders\MessageBuilder\Entities\HttpMessageBlueprint;
use KitHook\Entities\Messages\Contents\QueueHttpMessageContent;
use KitHook\Entities\Messages\QueueHttpMessage;
use KitHook\Builders\MessageBuilder\ContentBuilder\HttpBuilder as HttpContentBuilder;
use KitHook\Builders\MessageBuilder\ContentBuilder\Builder as ContentBuilder;

class HttpBuilder
{
    /**
     * @var Builder
     */
    private $builder;
    /**
     * @var HttpMessageBlueprint
     */
    private $blueprint;

    /**
     * HttpBuilder constructor.
     * @param Builder $builder
     * @param HttpMessageBlueprint $blueprint
     */
    public function __construct(Builder $builder, HttpMessageBlueprint $blueprint)
    {
        $this->builder = $builder;
        $this->blueprint = $blueprint;
    }

    /**
     * @param string|null $id
     * @return $this
     */
    public function withId(?string $id): self
    {
        $this->builder->withId($id);
        return $this;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function withMethod(string $method): self
    {
        if (!in_array($method, [
            QueueHttpMessage::METHOD_GET,
            QueueHttpMessage::METHOD_PUT,
            QueueHttpMessage::METHOD_POST,
            QueueHttpMessage::METHOD_DELETE,
            QueueHttpMessage::METHOD_HEAD,
            QueueHttpMessage::METHOD_OPTIONS,
            QueueHttpMessage::METHOD_PATCH,
            QueueHttpMessage::METHOD_TRACE,
        ], false)) {
            throw new InvalidArgumentException("Wrong method!");
        }
        $this->blueprint->setMethod($method);
        return $this;
    }

    /**
     * @param string $uri
     * @return $this
     */
    public function withUri(string $uri): self
    {
        $this->blueprint->setUri($uri);
        return $this;
    }

    /**
     * @param QueueHttpMessageContent|null $content
     * @return $this
     */
    public function withContent(?QueueHttpMessageContent $content): self
    {
        $this->blueprint->setContent($content);
        return $this;
    }

    /**
     * @param array|null $properties
     * @return $this
     */
    public function withProperties(?array $properties): self
    {
        $this->blueprint->setProperties($properties);
        return $this;
    }

    /**
     * @param array|null $headers
     * @return $this
     */
    public function withHeaders(?array $headers): self
    {
        $this->blueprint->setHeaders($headers);
        return $this;
    }

    /**
     * @return HttpContentBuilder
     */
    public function makeContent(): HttpContentBuilder
    {
        $contentBuilder = (new ContentBuilder())->makeHttp();
        $contentBuilder->setMessageBuilder($this);
        return $contentBuilder;
    }

    /**
     * @return QueueHttpMessage
     */
    public function build(): QueueHttpMessage
    {
        return new QueueHttpMessage(
            $this->blueprint->getMethod(),
            $this->blueprint->getUri(),
            $this->blueprint->getContent(),
            $this->blueprint->getProperties(),
            $this->blueprint->getHeaders(),
            $this->blueprint->getId()
        );
    }

    // USE

    public function useGetMethod(): self
    {
        return $this->withMethod(QueueHttpMessage::METHOD_GET);
    }

    public function usePutMethod(): self
    {
        return $this->withMethod(QueueHttpMessage::METHOD_PUT);
    }

    public function usePostMethod(): self
    {
        return $this->withMethod(QueueHttpMessage::METHOD_POST);
    }

    public function useDeleteMethod(): self
    {
        return $this->withMethod(QueueHttpMessage::METHOD_DELETE);
    }

    public function useHeadMethod(): self
    {
        return $this->withMethod(QueueHttpMessage::METHOD_HEAD);
    }

    public function useOptionsMethod(): self
    {
        return $this->withMethod(QueueHttpMessage::METHOD_OPTIONS);
    }

    public function usePathMethod(): self
    {
        return $this->withMethod(QueueHttpMessage::METHOD_PATCH);
    }

    public function useTraceMethod(): self
    {
        return $this->withMethod(QueueHttpMessage::METHOD_TRACE);
    }

    // FILL

    public function fill(?string $method, string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->withMethod($method)->withUri($uri)->withId($id)->withContent($content)->withHeaders($headers)->withProperties($properties);
    }

    public function fillGet(string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->fill(QueueHttpMessage::METHOD_GET, $uri, $id, $content, $headers, $properties);
    }

    public function fillPut(string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->fill(QueueHttpMessage::METHOD_PUT, $uri, $id, $content, $headers, $properties);
    }

    public function fillPost(string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->fill(QueueHttpMessage::METHOD_POST, $uri, $id, $content, $headers, $properties);
    }

    public function fillDelete(string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->fill(QueueHttpMessage::METHOD_DELETE, $uri, $id, $content, $headers, $properties);
    }

    public function fillHead(string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->fill(QueueHttpMessage::METHOD_HEAD, $uri, $id, $content, $headers, $properties);
    }

    public function fillOptions(string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->fill(QueueHttpMessage::METHOD_OPTIONS, $uri, $id, $content, $headers, $properties);
    }

    public function fillPatch(string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->fill(QueueHttpMessage::METHOD_PATCH, $uri, $id, $content, $headers, $properties);
    }

    public function fillTrace(string $uri, ?string $id = null, ?QueueHttpMessageContent $content = null, ?array $headers = null, ?array $properties = null): self
    {
        return $this->fill(QueueHttpMessage::METHOD_TRACE, $uri, $id, $content, $headers, $properties);
    }
}