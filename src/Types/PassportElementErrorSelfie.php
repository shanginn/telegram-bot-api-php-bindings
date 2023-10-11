<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie changes.
 */
class PassportElementErrorSelfie extends PassportElementError
{
    /**
     * @param string $type     The section of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”
     * @param string $fileHash Base64-encoded hash of the file with the selfie
     * @param string $message  Error message
     * @param string $source   Error source, must be selfie
     */
    public function __construct(
        public string $type,
        public string $fileHash,
        public string $message,
        public string $source = 'selfie',
    ) {
    }
}
