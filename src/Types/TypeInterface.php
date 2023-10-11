<?php

namespace Shanginn\TelegramBotApiBindings\Types;

interface TypeInterface
{
    public static function fromResponseResult(array $result): self;
}
