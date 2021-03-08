<?php

namespace KitHook\Entities\Messages\Contents;

abstract class QueueHttpMessageContent
{
    public const TYPE_FORM = 'form';
    public const TYPE_TEXT = 'text';
    public const TYPE_JSON = 'json';
    public const TYPE_BYTE = 'byte';
    public const TYPE_ELSE = 'else';

    /** @var string */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    abstract public function toArray(): array;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
