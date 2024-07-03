<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The withdrawal succeeded.
 */
class RevenueWithdrawalStateSucceeded extends RevenueWithdrawalState
{
    /**
     * @param string $type Type of the state, always “succeeded”
     * @param int    $date Date the withdrawal was completed in Unix time
     * @param string $url  An HTTPS URL that can be used to see transaction details
     */
    public function __construct(
        public string $type,
        public int $date,
        public string $url,
    ) {
    }
}
