<?php

namespace KitHook\Entities\Messages\Contents;

class QueueHttpMessageContentElse extends QueueHttpMessageContent
{
    /** @var string */
    private $data;

    /** @var string */
    private $format;

    /**
     * QueueHttpMessageContentElse constructor.
     * @param string $data
     * @param string $format
     */
    public function __construct(string $data, string $format)
    {
        parent::__construct(parent::TYPE_ELSE);
        $this->data = $data;
        $this->format = $format;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'data' => $this->getData(),
            'format' => $this->getFormat(),
        ];
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }
}
