<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 */
class InlineKeyboardMarkup implements TypeInterface
{
	/**
	 * @param array<array<InlineKeyboardButton>> $inlineKeyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
	 */
	public function __construct(
		public array $inlineKeyboard,
	) {
	}
}
