<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object defines the criteria used to request suitable users. The identifiers of the selected users will be shared with the bot when the corresponding button is pressed. More about requesting users ».
 */
class KeyboardButtonRequestUsers implements TypeInterface
{
    /**
     * @param int       $requestId     Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must be unique within the message
     * @param bool|null $userIsBot     Optional. Pass True to request bots, pass False to request regular users. If not specified, no additional restrictions are applied.
     * @param bool|null $userIsPremium Optional. Pass True to request premium users, pass False to request non-premium users. If not specified, no additional restrictions are applied.
     * @param int|null  $maxQuantity   Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
     */
    public function __construct(
        public int $requestId,
        public ?bool $userIsBot = null,
        public ?bool $userIsPremium = null,
        public ?int $maxQuantity = null,
    ) {
    }
}
