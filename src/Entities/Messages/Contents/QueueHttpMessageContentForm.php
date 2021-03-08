<?php

namespace KitHook\Entities\Messages\Contents;

class QueueHttpMessageContentForm extends QueueHttpMessageContent
{
    /** @var array */
    private $data;

    /**
     * QueueHttpMessageContentForm constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct(parent::TYPE_FORM);
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
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
