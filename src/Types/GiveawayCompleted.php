<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about the completion of a giveaway without public winners.
 */
class GiveawayCompleted implements TypeInterface
{
    /**
     * @param int          $winnerCount         Number of winners in the giveaway
     * @param int|null     $unclaimedPrizeCount Optional. Number of undistributed prizes
     * @param Message|null $giveawayMessage     Optional. Message with the giveaway that was completed, if it wasn't deleted
     */
    public function __construct(
        public int $winnerCount,
        public ?int $unclaimedPrizeCount = null,
        public ?Message $giveawayMessage = null,
    ) {
    }
}
