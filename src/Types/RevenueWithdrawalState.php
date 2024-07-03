<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the state of a revenue withdrawal operation. Currently, it can be one of.
 *
 * @see RevenueWithdrawalStatePending
 * @see RevenueWithdrawalStateSucceeded
 * @see RevenueWithdrawalStateFailed
 */
abstract class RevenueWithdrawalState implements TypeInterface
{
    public function __construct()
    {
    }
}
