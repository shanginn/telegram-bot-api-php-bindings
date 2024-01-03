<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The boost was obtained by the creation of a Telegram Premium giveaway. This boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 */
class ChatBoostSourceGiveaway extends ChatBoostSource
{
    /**
     * @param string    $source            Source of the boost, always “giveaway”
     * @param int       $giveawayMessageId Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if the message isn't sent yet.
     * @param User|null $user              Optional. User that won the prize in the giveaway if any
     * @param bool|null $isUnclaimed       Optional. True, if the giveaway was completed, but there was no user to win the prize
     */
    public function __construct(
        public string $source,
        public int $giveawayMessageId,
        public ?User $user = null,
        public ?bool $isUnclaimed = null,
    ) {
    }
}
