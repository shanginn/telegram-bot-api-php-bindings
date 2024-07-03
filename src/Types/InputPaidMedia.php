<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the paid media to be sent. Currently, it can be one of.
 *
 * @see InputPaidMediaPhoto
 * @see InputPaidMediaVideo
 */
abstract class InputPaidMedia implements TypeInterface
{
    public function __construct()
    {
    }
}
