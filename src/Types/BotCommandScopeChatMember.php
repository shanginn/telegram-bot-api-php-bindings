<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 */
class BotCommandScopeChatMember extends BotCommandScope
{
	/**
	 * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
	 * @param int $userId Unique identifier of the target user
	 * @param string $type Scope type, must be chat_member
	 */
	public function __construct(
		public int|string $chatId,
		public int $userId,
		public string $type = 'chat_member',
	) {
	}
}
