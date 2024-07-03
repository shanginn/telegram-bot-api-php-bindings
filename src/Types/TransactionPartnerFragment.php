<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes a withdrawal transaction with Fragment.
 */
class TransactionPartnerFragment extends TransactionPartner
{
    /**
     * @param string                      $type            Type of the transaction partner, always “fragment”
     * @param RevenueWithdrawalState|null $withdrawalState Optional. State of the transaction if the transaction is outgoing
     */
    public function __construct(
        public string $type,
        public ?RevenueWithdrawalState $withdrawalState = null,
    ) {
    }
}
