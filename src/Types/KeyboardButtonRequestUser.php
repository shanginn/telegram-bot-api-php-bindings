<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object defines the criteria used to request a suitable user. The identifier of the selected user will be shared with the bot when the corresponding button is pressed. More about requesting users ».
 */
class KeyboardButtonRequestUser implements TypeInterface
{
    /**
     * @param int       $requestId     Signed 32-bit identifier of the request, which will be received back in the UserShared object. Must be unique within the message
     * @param bool|null $userIsBot     Optional. Pass True to request a bot, pass False to request a regular user. If not specified, no additional restrictions are applied.
     * @param bool|null $userIsPremium Optional. Pass True to request a premium user, pass False to request a non-premium user. If not specified, no additional restrictions are applied.
     */
    public function __construct(
        public int $requestId,
        public ?bool $userIsBot = null,
        public ?bool $userIsPremium = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'request_id',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            requestId: $result['request_id'],
            userIsBot: $result['user_is_bot'] ?? null,
            userIsPremium: $result['user_is_premium'] ?? null,
        );
    }
}
