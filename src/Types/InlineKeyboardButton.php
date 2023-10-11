<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 */
class InlineKeyboardButton implements TypeInterface
{
    /**
     * @param string                           $text                         Label text on the button
     * @param string|null                      $url                          Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to mention a user by their ID without using a username, if this is allowed by their privacy settings.
     * @param string|null                      $callbackData                 Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
     * @param WebAppInfo|null                  $webApp                       Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot.
     * @param LoginUrl|null                    $loginUrl                     Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
     * @param string|null                      $switchInlineQuery            Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted.
     * @param string|null                      $switchInlineQueryCurrentChat Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted.This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting something from multiple options.
     * @param SwitchInlineQueryChosenChat|null $switchInlineQueryChosenChat  Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
     * @param CallbackGame|null                $callbackGame                 Optional. Description of the game that will be launched when the user presses the button.NOTE: This type of button must always be the first button in the first row.
     * @param bool|null                        $pay                          Optional. Specify True, to send a Pay button.NOTE: This type of button must always be the first button in the first row and can only be used in invoice messages.
     */
    public function __construct(
        public string $text,
        public ?string $url = null,
        public ?string $callbackData = null,
        public ?WebAppInfo $webApp = null,
        public ?LoginUrl $loginUrl = null,
        public ?string $switchInlineQuery = null,
        public ?string $switchInlineQueryCurrentChat = null,
        public ?SwitchInlineQueryChosenChat $switchInlineQueryChosenChat = null,
        public ?CallbackGame $callbackGame = null,
        public ?bool $pay = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'text',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($result[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            text: $result['text'],
            url: $result['url'] ?? null,
            callbackData: $result['callback_data'] ?? null,
            webApp: $result['web_app'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\WebAppInfo::fromResponseResult($result['web_app'])
                : null,
            loginUrl: $result['login_url'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\LoginUrl::fromResponseResult($result['login_url'])
                : null,
            switchInlineQuery: $result['switch_inline_query'] ?? null,
            switchInlineQueryCurrentChat: $result['switch_inline_query_current_chat'] ?? null,
            switchInlineQueryChosenChat: $result['switch_inline_query_chosen_chat'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\SwitchInlineQueryChosenChat::fromResponseResult($result['switch_inline_query_chosen_chat'])
                : null,
            callbackGame: $result['callback_game'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\CallbackGame::fromResponseResult($result['callback_game'])
                : null,
            pay: $result['pay'] ?? null,
        );
    }
}
