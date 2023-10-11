<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a menu button, which launches a Web App.
 */
class MenuButtonWebApp extends MenuButton
{
    /**
     * @param string     $text   Text on the button
     * @param WebAppInfo $webApp Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
     * @param string     $type   Type of the button, must be web_app
     */
    public function __construct(
        public string $text,
        public WebAppInfo $webApp,
        public string $type = 'web_app',
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'text',
            'web_app',
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
            text: $result['text'],
            webApp: \Shanginn\TelegramBotApiBindings\Types\WebAppInfo::fromResponseResult($result['web_app']),
            type: $result['type'] ?? 'web_app',
        );
    }
}
