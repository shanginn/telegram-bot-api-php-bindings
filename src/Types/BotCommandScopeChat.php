<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the scope of bot commands, covering a specific chat.
 */
class BotCommandScopeChat extends BotCommandScope
{
	/**
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param string $type Scope type, must be chat
	 */
	public function __construct(
		public int|string $chatId,
		public string $type = 'chat',
	) {
	}
}
