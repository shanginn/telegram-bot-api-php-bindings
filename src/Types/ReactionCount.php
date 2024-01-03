<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a reaction added to a message along with the number of times it was added.
 */
class ReactionCount implements TypeInterface
{
    /**
     * @param ReactionType $type       Type of the reaction
     * @param int          $totalCount Number of times the reaction was added
     */
    public function __construct(
        public ReactionType $type,
        public int $totalCount,
    ) {
    }
}
