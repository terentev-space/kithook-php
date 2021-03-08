<?php

namespace KitHook\Builders\MessageBuilder\ContentBuilder\Entities;

class HttpContentBlueprint extends ContentBlueprint
{
    /** @var mixed|null */
    private $data;

    /** @var mixed|null */
    private $elseFormat;

    /**
     * @return mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed|null $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed|null
     */
    public function getElseFormat()
    {
        return $this->elseFormat;
    }

    /**
     * @param mixed|null $elseFormat
     */
    public function setElseFormat($elseFormat): void
    {
        $this->elseFormat = $elseFormat;
    }
}
