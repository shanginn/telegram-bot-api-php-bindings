<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes data sent from a Web App to the bot.
 */
class WebAppData implements TypeInterface
{
    /**
     * @param string $data       The data. Be aware that a bad client can send arbitrary data in this field.
     * @param string $buttonText Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field.
     */
    public function __construct(
        public string $data,
        public string $buttonText,
    ) {
    }
}
