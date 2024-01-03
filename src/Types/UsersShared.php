<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 */
class UsersShared implements TypeInterface
{
    /**
     * @param int        $requestId Identifier of the request
     * @param array<int> $userIds   Identifiers of the shared users. These numbers may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting them. But they have at most 52 significant bits, so 64-bit integers or double-precision float types are safe for storing these identifiers. The bot may not have access to the users and could be unable to use these identifiers, unless the users are already known to the bot by some other means.
     */
    public function __construct(
        public int $requestId,
        public array $userIds,
    ) {
    }
}
