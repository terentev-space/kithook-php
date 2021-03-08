<?php

namespace KitHook\Entities\Messages;

use JsonSerializable;

abstract class QueueMessage implements JsonSerializable
{
    public const TYPE_HTTP = 'http';

    /** @var string */
    private $type;
    /** @var string|null */
    private $id;

    /**
     * QueueMessage constructor.
     * @param string $type
     * @param string|null $id
     */
    public function __construct(string $type, ?string $id = null)
    {
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
}
