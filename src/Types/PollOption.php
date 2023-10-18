<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about one answer option in a poll.
 */
class PollOption implements TypeInterface
{
    /**
     * @param string $text       Option text, 1-100 characters
     * @param int    $voterCount Number of users that voted for this option
     */
    public function __construct(
        public string $text,
        public int $voterCount,
    ) {
    }
}
