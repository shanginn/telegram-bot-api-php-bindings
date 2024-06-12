<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Contains information about the location of a Telegram Business account.
 */
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
