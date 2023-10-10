<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents one result of an inline query. Telegram clients currently support results of the following 20 types:
 */
abstract class InlineQueryResult implements TypeInterface
{
	public function __construct()
	{
	}
}
