<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 */
class InputContactMessageContent extends InputMessageContent
{
	/**
	 * @param string $phoneNumber Contact's phone number
	 * @param string $firstName Contact's first name
	 * @param string|null $lastName Optional. Contact's last name
	 * @param string|null $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
	 */
	public function __construct(
		public string $phoneNumber,
		public string $firstName,
		public ?string $lastName = null,
		public ?string $vcard = null,
	) {
	}
}
