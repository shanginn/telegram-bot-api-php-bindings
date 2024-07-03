<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Contains a list of Telegram Star transactions.
 */
class StarTransactions implements TypeInterface
{
    /**
     * @param array<StarTransaction> $transactions The list of transactions
     */
    public function __construct(
        public array $transactions,
    ) {
    }
}
