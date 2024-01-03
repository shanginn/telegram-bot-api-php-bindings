<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the bot's menu button in a private chat. It should be one of.
 *
 * @see MenuButtonCommands
 * @see MenuButtonWebApp
 * @see MenuButtonDefault
 */
abstract class MenuButton implements TypeInterface
{
    public function __construct()
    {
    }
}
