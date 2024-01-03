<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes the options used for link preview generation.
 */
class LinkPreviewOptions implements TypeInterface
{
    /**
     * @param bool|null   $isDisabled       Optional. True, if the link preview is disabled
     * @param string|null $url              Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
     * @param bool|null   $preferSmallMedia Optional. True, if the media in the link preview is suppposed to be shrunk; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     * @param bool|null   $preferLargeMedia Optional. True, if the media in the link preview is suppposed to be enlarged; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     * @param bool|null   $showAboveText    Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be shown below the message text
     */
    public function __construct(
        public ?bool $isDisabled = null,
        public ?string $url = null,
        public ?bool $preferSmallMedia = null,
        public ?bool $preferLargeMedia = null,
        public ?bool $showAboveText = null,
    ) {
    }
}
