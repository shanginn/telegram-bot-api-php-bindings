<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a location to which a chat is connected.
 */
class ChatLocation implements TypeInterface
{
    /**
     * @param Location $location The location to which the supergroup is connected. Can't be a live location.
     * @param string   $address  Location address; 1-64 characters, as defined by the chat owner
     */
    public function __construct(
        public Location $location,
        public string $address,
    ) {
    }
}
