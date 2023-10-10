<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 */
class KeyboardButtonPollType implements TypeInterface
{
	/**
	 * @param string|null $type Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode. If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
	 */
	public function __construct(
		public ?string $type = null,
	) {
	}
}
