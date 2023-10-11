<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object defines the criteria used to request a suitable chat. The identifier of the selected chat will be shared with the bot when the corresponding button is pressed. More about requesting chats ».
 */
class KeyboardButtonRequestChat implements TypeInterface
{
    /**
     * @param int                          $requestId               Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must be unique within the message
     * @param bool                         $chatIsChannel           pass True to request a channel chat, pass False to request a group or a supergroup chat
     * @param bool|null                    $chatIsForum             Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no additional restrictions are applied.
     * @param bool|null                    $chatHasUsername         Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a username. If not specified, no additional restrictions are applied.
     * @param bool|null                    $chatIsCreated           Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
     * @param ChatAdministratorRights|null $userAdministratorRights Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
     * @param ChatAdministratorRights|null $botAdministratorRights  Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
     * @param bool|null                    $botIsMember             Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
     */
    public function __construct(
        public int $requestId,
        public bool $chatIsChannel,
        public ?bool $chatIsForum = null,
        public ?bool $chatHasUsername = null,
        public ?bool $chatIsCreated = null,
        public ?ChatAdministratorRights $userAdministratorRights = null,
        public ?ChatAdministratorRights $botAdministratorRights = null,
        public ?bool $botIsMember = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'request_id',
            'chat_is_channel',
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
            chatIsChannel: $result['chat_is_channel'],
            chatIsForum: $result['chat_is_forum'] ?? null,
            chatHasUsername: $result['chat_has_username'] ?? null,
            chatIsCreated: $result['chat_is_created'] ?? null,
            userAdministratorRights: $result['user_administrator_rights'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ChatAdministratorRights::fromResponseResult($result['user_administrator_rights'])
                : null,
            botAdministratorRights: $result['bot_administrator_rights'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ChatAdministratorRights::fromResponseResult($result['bot_administrator_rights'])
                : null,
            botIsMember: $result['bot_is_member'] ?? null,
        );
    }
}
