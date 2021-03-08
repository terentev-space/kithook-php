<?php

namespace KitHook\Entities\Messages\Contents;

class QueueHttpMessageContentText extends QueueHttpMessageContent
{
    /** @var string */
    private $data;

    /**
     * QueueHttpMessageContentText constructor.
     * @param string $data
     */
    public function __construct(string $data)
    {
        parent::__construct(parent::TYPE_TEXT);
        $this->data = $data;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'data' => $this->getData(),
        ];
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }
}
