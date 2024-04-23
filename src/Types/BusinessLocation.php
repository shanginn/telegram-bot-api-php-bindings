<?php

namespace Shanginn\TelegramBotApiBindings\Types;

class BusinessLocation implements TypeInterface
{
    /**
     * @param string        $address  Address of the business
     * @param Location|null $location Optional. Location of the business
     */
    public function __construct(
        public string $address,
        public ?Location $location = null,
    ) {
    }
}
