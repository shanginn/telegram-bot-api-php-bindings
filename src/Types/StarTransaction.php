<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes a Telegram Star transaction.
 */
class StarTransaction implements TypeInterface
{
    /**
     * @param string                  $id       Unique identifier of the transaction. Coincides with the identifer of the original transaction for refund transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful incoming payments from users.
     * @param int                     $amount   Number of Telegram Stars transferred by the transaction
     * @param int                     $date     Date the transaction was created in Unix time
     * @param TransactionPartner|null $source   Optional. Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment refunding a failed withdrawal). Only for incoming transactions
     * @param TransactionPartner|null $receiver Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a withdrawal). Only for outgoing transactions
     */
    public function __construct(
        public string $id,
        public int $amount,
        public int $date,
        public ?TransactionPartner $source = null,
        public ?TransactionPartner $receiver = null,
    ) {
    }
}
