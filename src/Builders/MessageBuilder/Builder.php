<?php

namespace KitHook\Builders\MessageBuilder;

use KitHook\Builders\MessageBuilder\Entities\HttpMessageBlueprint;
use KitHook\Builders\MessageBuilder\Entities\MessageBlueprint;

class Builder
{
    /** @var MessageBlueprint|HttpMessageBlueprint */
    private $blueprint;

    /**
     * @return HttpBuilder
     */
    public function makeHttp(): HttpBuilder
    {
        $this->blueprint = new HttpMessageBlueprint();
        return new HttpBuilder($this, $this->blueprint);
    }

    /**
     * @param string $id
     * @return $this
     */
    public function withId(string $id): self
    {
        $this->blueprint->setId($id);
        return $this;
    }
}
