<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 */
class BotCommandScopeAllGroupChats extends BotCommandScope
{
    /**
     * @param string $type Scope type, must be all_group_chats
     */
    public function __construct(
        public string $type = 'all_group_chats',
    ) {
    }
}
