<?php

namespace KitHook\Builders\MessageBuilder\ContentBuilder;

use InvalidArgumentException;
use KitHook\Builders\MessageBuilder\ContentBuilder\Entities\HttpContentBlueprint;
use KitHook\Builders\MessageBuilder\HttpBuilder as HttpMessageBuilder;
use KitHook\Entities\Messages\Contents\QueueHttpMessageContent;
use KitHook\Entities\Messages\Contents\QueueHttpMessageContentByte;
use KitHook\Entities\Messages\Contents\QueueHttpMessageContentElse;
use KitHook\Entities\Messages\Contents\QueueHttpMessageContentForm;
use KitHook\Entities\Messages\Contents\QueueHttpMessageContentJson;
use KitHook\Entities\Messages\Contents\QueueHttpMessageContentText;

class HttpBuilder
{
    /**
     * @var Builder
     */
    private $builder;
    /**
     * @var HttpContentBlueprint
     */
    private $blueprint;

    /**
     * @var HttpMessageBuilder
     */
    private $messageBuilder;

    /**
     * HttpBuilder constructor.
     * @param Builder $builder
     * @param HttpContentBlueprint $blueprint
     */
    public function __construct(Builder $builder, HttpContentBlueprint $blueprint)
    {
        $this->builder = $builder;
        $this->blueprint = $blueprint;
    }

    /**
     * @param HttpMessageBuilder $messageBuilder
     */
    public function setMessageBuilder(HttpMessageBuilder $messageBuilder): void
    {
        $this->messageBuilder = $messageBuilder;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function withType(string $type): self
    {
        if (!in_array($type, [
            QueueHttpMessageContent::TYPE_FORM,
            QueueHttpMessageContent::TYPE_TEXT,
            QueueHttpMessageContent::TYPE_JSON,
            QueueHttpMessageContent::TYPE_BYTE,
            QueueHttpMessageContent::TYPE_ELSE,
        ], false)) {
            throw new InvalidArgumentException("Wrong type!");
        }
        $this->blueprint->setType($type);
        return $this;
    }

    /**
     * @param $data
     * @return $this
     */
    public function withData($data): self
    {
        $this->blueprint->setData($data);
        return $this;
    }

    /**
     * @param string $format
     * @return $this
     */
    public function withFormatForElseType(string $format): self
    {
        $this->blueprint->setElseFormat($format);
        return $this;
    }

    /**
     * @return QueueHttpMessageContent
     */
    public function build(): QueueHttpMessageContent
    {
        switch ($this->blueprint->getType()) {
            case QueueHttpMessageContent::TYPE_FORM:
                return new QueueHttpMessageContentForm($this->blueprint->getData());
            case QueueHttpMessageContent::TYPE_TEXT:
                return new QueueHttpMessageContentText($this->blueprint->getData());
            case QueueHttpMessageContent::TYPE_JSON:
                return new QueueHttpMessageContentJson($this->blueprint->getData());
            case QueueHttpMessageContent::TYPE_BYTE:
                return new QueueHttpMessageContentByte($this->blueprint->getData());
            case QueueHttpMessageContent::TYPE_ELSE:
                return new QueueHttpMessageContentElse($this->blueprint->getData(), $this->blueprint->getElseFormat());
        }

        throw new InvalidArgumentException("Wrong content type!");
    }

    /**
     * @return HttpMessageBuilder
     */
    public function buildFromMessage(): HttpMessageBuilder
    {
        $this->messageBuilder->withContent($this->build());
        return $this->messageBuilder;
    }

    // USE

    public function useFormType(): self
    {
        return $this->withType(QueueHttpMessageContent::TYPE_FORM);
    }

    public function useTextType(): self
    {
        return $this->withType(QueueHttpMessageContent::TYPE_TEXT);
    }

    public function useJsonType(): self
    {
        return $this->withType(QueueHttpMessageContent::TYPE_JSON);
    }

    public function useByteType(): self
    {
        return $this->withType(QueueHttpMessageContent::TYPE_BYTE);
    }

    public function useElseType(): self
    {
        return $this->withType(QueueHttpMessageContent::TYPE_ELSE);
    }

    // FILL

    /**
     * @param array $data
     * @return $this
     */
    public function fillForm($data): self
    {
        return $this->useFormType()->withData($data);
    }

    /**
     * @param string $data
     * @return $this
     */
    public function fillText($data): self
    {
        return $this->useTextType()->withData($data);
    }

    /**
     * @param array|object|mixed $data
     * @return $this
     */
    public function fillJson($data): self
    {
        return $this->useJsonType()->withData($data);
    }

    /**
     * @param string $data
     * @return $this
     */
    public function fillByte($data): self
    {
        return $this->useByteType()->withData($data);
    }

    /**
     * @param string $data
     * @param string $dataContentType
     * @return $this
     */
    public function fillElse($data, string $dataContentType): self
    {
        return $this->useElseType()->withData($data)->withFormatForElseType($dataContentType);
    }
}
