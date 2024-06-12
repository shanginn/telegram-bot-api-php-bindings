<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object defines the criteria used to request suitable users. Information about the selected users will be shared with the bot when the corresponding button is pressed. More about requesting users ».
 */
class KeyboardButtonRequestUsers implements TypeInterface
{
    /**
     * @param int       $requestId       Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must be unique within the message
     * @param bool|null $userIsBot       Optional. Pass True to request bots, pass False to request regular users. If not specified, no additional restrictions are applied.
     * @param bool|null $userIsPremium   Optional. Pass True to request premium users, pass False to request non-premium users. If not specified, no additional restrictions are applied.
     * @param int|null  $maxQuantity     Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
     * @param bool|null $requestName     Optional. Pass True to request the users' first and last names
     * @param bool|null $requestUsername Optional. Pass True to request the users' usernames
     * @param bool|null $requestPhoto    Optional. Pass True to request the users' photos
     */
    public function __construct(
        public int $requestId,
        public ?bool $userIsBot = null,
        public ?bool $userIsPremium = null,
        public ?int $maxQuantity = null,
        public ?bool $requestName = null,
        public ?bool $requestUsername = null,
        public ?bool $requestPhoto = null,
    ) {
    }
}
