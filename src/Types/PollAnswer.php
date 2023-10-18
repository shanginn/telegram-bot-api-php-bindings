<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 */
class PollAnswer implements TypeInterface
{
    /**
     * @param string     $pollId    Unique poll identifier
     * @param array<int> $optionIds 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
     * @param Chat|null  $voterChat Optional. The chat that changed the answer to the poll, if the voter is anonymous
     * @param User|null  $user      Optional. The user that changed the answer to the poll, if the voter isn't anonymous
     */
    public function __construct(
        public string $pollId,
        public array $optionIds,
        public ?Chat $voterChat = null,
        public ?User $user = null,
    ) {
    }
}
