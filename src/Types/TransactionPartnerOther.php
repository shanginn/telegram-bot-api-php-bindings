<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes a transaction with an unknown source or recipient.
 */
class TransactionPartnerOther extends TransactionPartner
{
    /**
     * @param string $type Type of the transaction partner, always “other”
     */
    public function __construct(
        public string $type,
    ) {
    }
}
