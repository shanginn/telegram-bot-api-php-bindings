<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).
 */
class ReplyKeyboardMarkup implements TypeInterface
{
    /**
     * @param array<array<KeyboardButton>> $keyboard              Array of button rows, each represented by an Array of KeyboardButton objects
     * @param bool|null                    $isPersistent          Optional. Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
     * @param bool|null                    $resizeKeyboard        Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
     * @param bool|null                    $oneTimeKeyboard       Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but clients will automatically display the usual letter-keyboard in the chat - the user can press a special button in the input field to see the custom keyboard again. Defaults to false.
     * @param string|null                  $inputFieldPlaceholder Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
     * @param bool|null                    $selective             Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.Example: A user requests to change the bot's language, bot replies to the request with a keyboard to select the new language. Other users in the group don't see the keyboard.
     */
    public function __construct(
        public array $keyboard,
        public ?bool $isPersistent = null,
        public ?bool $resizeKeyboard = null,
        public ?bool $oneTimeKeyboard = null,
        public ?string $inputFieldPlaceholder = null,
        public ?bool $selective = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'keyboard',
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
            keyboard: $result['keyboard'],
            isPersistent: $result['is_persistent'] ?? null,
            resizeKeyboard: $result['resize_keyboard'] ?? null,
            oneTimeKeyboard: $result['one_time_keyboard'] ?? null,
            inputFieldPlaceholder: $result['input_field_placeholder'] ?? null,
            selective: $result['selective'] ?? null,
        );
    }
}
