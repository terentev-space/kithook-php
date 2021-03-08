<?php

namespace KitHook\Entities\Messages\Contents;

class QueueHttpMessageContentByte extends QueueHttpMessageContent
{
    /** @var string */
    private $data;

    /**
     * QueueHttpMessageContentByte constructor.
     * @param string $data
     */
    public function __construct($data)
    {
        parent::__construct(parent::TYPE_BYTE);
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
    public function getData()
    {
        return $this->data;
    }
}
