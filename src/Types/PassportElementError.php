<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an error in the Telegram Passport element which was submitted that should be resolved by the user. It should be one of:
 */
abstract class PassportElementError implements TypeInterface
{
	public function __construct()
	{
	}
}
