<?php

namespace Shanginn\TelegramBotApiBindings;

interface TelegramBotApiSerializerInterface
{
    public function serialize(array $data): string;

    public function deserialize(string $data, array $types): mixed;
}
