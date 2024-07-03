<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes a transaction with a user.
 */
class TransactionPartnerUser extends TransactionPartner
{
    /**
     * @param string      $type           Type of the transaction partner, always “user”
     * @param User        $user           Information about the user
     * @param string|null $invoicePayload Optional. Bot-specified invoice payload
     */
    public function __construct(
        public string $type,
        public User $user,
        public ?string $invoicePayload = null,
    ) {
    }
}
