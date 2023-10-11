<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes an inline message sent by a Web App on behalf of a user.
 */
class SentWebAppMessage implements TypeInterface
{
    /**
     * @param string|null $inlineMessageId Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message.
     */
    public function __construct(
        public ?string $inlineMessageId = null,
    ) {
    }
}
