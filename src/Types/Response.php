<?php

namespace Shanginn\TelegramBotApiBindings\Types;

class Response implements TypeInterface
{
    public bool $ok;
    public \stdClass|TypeInterface|array|int|string|bool|null $result = null;
    public ?int $errorCode = null;
    public ?string $description = null;
    public \stdClass|ResponseParameters|null $parameters = null;
}
