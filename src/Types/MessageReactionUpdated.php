<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a change of a reaction on a message performed by a user.
 */
class MessageReactionUpdated implements TypeInterface
{
    /**
     * @param Chat                $chat        The chat containing the message the user reacted to
     * @param int                 $messageId   Unique identifier of the message inside the chat
     * @param int                 $date        Date of the change in Unix time
     * @param array<ReactionType> $oldReaction Previous list of reaction types that were set by the user
     * @param array<ReactionType> $newReaction New list of reaction types that have been set by the user
     * @param User|null           $user        Optional. The user that changed the reaction, if the user isn't anonymous
     * @param Chat|null           $actorChat   Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
     */
    public function __construct(
        public Chat $chat,
        public int $messageId,
        public int $date,
        public array $oldReaction,
        public array $newReaction,
        public ?User $user = null,
        public ?Chat $actorChat = null,
    ) {
    }
}
