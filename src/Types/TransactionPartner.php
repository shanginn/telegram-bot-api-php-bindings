<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the source of a transaction, or its recipient for outgoing transactions. Currently, it can be one of.
 *
 * @see TransactionPartnerUser
 * @see TransactionPartnerFragment
 * @see TransactionPartnerTelegramAds
 * @see TransactionPartnerOther
 */
abstract class TransactionPartner implements TypeInterface
{
    public function __construct()
    {
    }
}
