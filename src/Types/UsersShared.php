<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 */
class UsersShared implements TypeInterface
{
    /**
     * @param int               $requestId Identifier of the request
     * @param array<SharedUser> $users     information about users shared with the bot
     */
    public function __construct(
        public int $requestId,
        public array $users,
    ) {
    }
}
