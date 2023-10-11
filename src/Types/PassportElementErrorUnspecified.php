<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 */
class PassportElementErrorUnspecified extends PassportElementError
{
    /**
     * @param string $type        Type of element of the user's Telegram Passport which has the issue
     * @param string $elementHash Base64-encoded element hash
     * @param string $message     Error message
     * @param string $source      Error source, must be unspecified
     */
    public function __construct(
        public string $type,
        public string $elementHash,
        public string $message,
        public string $source = 'unspecified',
    ) {
    }
}
