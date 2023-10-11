<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 */
class PassportData implements TypeInterface
{
    /**
     * @param array<EncryptedPassportElement> $data        Array with information about documents and other Telegram Passport elements that was shared with the bot
     * @param EncryptedCredentials            $credentials Encrypted credentials required to decrypt the data
     */
    public function __construct(
        public array $data,
        public EncryptedCredentials $credentials,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'data',
            'credentials',
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
            data: $result['data'],
            credentials: \Shanginn\TelegramBotApiBindings\Types\EncryptedCredentials::fromResponseResult($result['credentials']),
        );
    }
}
