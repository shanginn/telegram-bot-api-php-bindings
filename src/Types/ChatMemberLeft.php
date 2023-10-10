<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 */
class ChatMemberLeft extends ChatMember
{
	/**
	 * @param string $status The member's status in the chat, always “left”
	 * @param User $user Information about the user
	 */
	public function __construct(
		public string $status,
		public User $user,
	) {
	}
}
