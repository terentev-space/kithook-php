<?php

namespace KitHook\Builders\MessageBuilder\ContentBuilder;

use KitHook\Builders\MessageBuilder\ContentBuilder\Entities\ContentBlueprint;
use KitHook\Builders\MessageBuilder\ContentBuilder\Entities\HttpContentBlueprint;

class Builder
{
    /** @var ContentBlueprint|HttpContentBlueprint */
    private $blueprint;

    /**
     * @return HttpBuilder
     */
    public function makeHttp(): HttpBuilder
    {
        $this->blueprint = new HttpContentBlueprint();
        return new HttpBuilder($this, $this->blueprint);
    }
}
