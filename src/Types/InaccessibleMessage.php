<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 */
class InaccessibleMessage extends MaybeInaccessibleMessage
{
    /**
     * @param Chat $chat      Chat the message belonged to
     * @param int  $messageId Unique message identifier inside the chat
     * @param int  $date      Always 0. The field can be used to differentiate regular and inaccessible messages.
     */
    public function __construct(
        public Chat $chat,
        public int $messageId,
        public int $date,
    ) {
    }
}
