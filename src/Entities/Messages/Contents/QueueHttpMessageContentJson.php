<?php

namespace KitHook\Entities\Messages\Contents;

class QueueHttpMessageContentJson extends QueueHttpMessageContent
{
    /** @var array|object|mixed */
    private $data;

    /**
     * QueueHttpMessageContentJson constructor.
     * @param array|object|mixed $data
     */
    public function __construct($data)
    {
        parent::__construct(parent::TYPE_JSON);
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
     * @return array|mixed|object
     */
    public function getData()
    {
        return $this->data;
    }
}
