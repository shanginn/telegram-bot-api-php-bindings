<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes that no specific value for the menu button was set.
 */
class MenuButtonDefault extends MenuButton
{
	/**
	 * @param string $type Type of the button, must be default
	 */
	public function __construct(
		public string $type = 'default',
	) {
	}
}
