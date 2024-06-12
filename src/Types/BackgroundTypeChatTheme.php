<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The background is taken directly from a built-in chat theme.
 */
class BackgroundTypeChatTheme extends BackgroundType
{
    /**
     * @param string $type      Type of the background, always “chat_theme”
     * @param string $themeName Name of the chat theme, which is usually an emoji
     */
    public function __construct(
        public string $type,
        public string $themeName,
    ) {
    }
}
