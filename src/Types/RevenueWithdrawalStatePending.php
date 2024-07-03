<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The withdrawal is in progress.
 */
class RevenueWithdrawalStatePending extends RevenueWithdrawalState
{
    /**
     * @param string $type Type of the state, always “pending”
     */
    public function __construct(
        public string $type,
    ) {
    }
}
