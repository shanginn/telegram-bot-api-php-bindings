<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a message about the completion of a giveaway with public winners.
 */
class GiveawayWinners implements TypeInterface
{
    /**
     * @param Chat        $chat                          The chat that created the giveaway
     * @param int         $giveawayMessageId             Identifier of the message with the giveaway in the chat
     * @param int         $winnersSelectionDate          Point in time (Unix timestamp) when winners of the giveaway were selected
     * @param int         $winnerCount                   Total number of winners in the giveaway
     * @param array<User> $winners                       List of up to 100 winners of the giveaway
     * @param int|null    $additionalChatCount           Optional. The number of other chats the user had to join in order to be eligible for the giveaway
     * @param int|null    $premiumSubscriptionMonthCount Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
     * @param int|null    $unclaimedPrizeCount           Optional. Number of undistributed prizes
     * @param bool|null   $onlyNewMembers                Optional. True, if only users who had joined the chats after the giveaway started were eligible to win
     * @param bool|null   $wasRefunded                   Optional. True, if the giveaway was canceled because the payment for it was refunded
     * @param string|null $prizeDescription              Optional. Description of additional giveaway prize
     */
    public function __construct(
        public Chat $chat,
        public int $giveawayMessageId,
        public int $winnersSelectionDate,
        public int $winnerCount,
        public array $winners,
        public ?int $additionalChatCount = null,
        public ?int $premiumSubscriptionMonthCount = null,
        public ?int $unclaimedPrizeCount = null,
        public ?bool $onlyNewMembers = null,
        public ?bool $wasRefunded = null,
        public ?string $prizeDescription = null,
    ) {
    }
}
