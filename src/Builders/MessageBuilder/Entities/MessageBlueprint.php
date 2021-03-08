<?php

namespace KitHook\Builders\MessageBuilder\Entities;

abstract class MessageBlueprint
{
    /** @var string */
    private $type;
    /** @var string|null */
    private $id = null;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    protected function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }
}
