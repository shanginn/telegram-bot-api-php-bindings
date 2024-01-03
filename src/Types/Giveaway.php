<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a message about a scheduled giveaway.
 */
class Giveaway implements TypeInterface
{
    /**
     * @param array<Chat>        $chats                         The list of chats which the user must join to participate in the giveaway
     * @param int                $winnersSelectionDate          Point in time (Unix timestamp) when winners of the giveaway will be selected
     * @param int                $winnerCount                   The number of users which are supposed to be selected as winners of the giveaway
     * @param bool|null          $onlyNewMembers                Optional. True, if only users who join the chats after the giveaway started should be eligible to win
     * @param bool|null          $hasPublicWinners              Optional. True, if the list of giveaway winners will be visible to everyone
     * @param string|null        $prizeDescription              Optional. Description of additional giveaway prize
     * @param array<string>|null $countryCodes                  Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which eligible users for the giveaway must come. If empty, then all users can participate in the giveaway. Users with a phone number that was bought on Fragment can always participate in giveaways.
     * @param int|null           $premiumSubscriptionMonthCount Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
     */
    public function __construct(
        public array $chats,
        public int $winnersSelectionDate,
        public int $winnerCount,
        public ?bool $onlyNewMembers = null,
        public ?bool $hasPublicWinners = null,
        public ?string $prizeDescription = null,
        public ?array $countryCodes = null,
        public ?int $premiumSubscriptionMonthCount = null,
    ) {
    }
}
