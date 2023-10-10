<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 */
class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
	/**
	 * @param string $type Scope type, must be all_chat_administrators
	 */
	public function __construct(
		public string $type = 'all_chat_administrators',
	) {
	}
}
