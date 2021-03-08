<?php

namespace KitHook\Builders\MessageBuilder\ContentBuilder\Entities;

abstract class ContentBlueprint
{
    /** @var string */
    private $type;

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
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
