<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the content of a media message to be sent. It should be one of.
 *
 * @see InputMediaAnimation
 * @see InputMediaDocument
 * @see InputMediaAudio
 * @see InputMediaPhoto
 * @see InputMediaVideo
 */
abstract class InputMedia implements TypeInterface
{
    public function __construct()
    {
    }
}
