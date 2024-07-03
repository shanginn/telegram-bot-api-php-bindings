<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes paid media. Currently, it can be one of.
 *
 * @see PaidMediaPreview
 * @see PaidMediaPhoto
 * @see PaidMediaVideo
 */
abstract class PaidMedia implements TypeInterface
{
    public function __construct()
    {
    }
}
