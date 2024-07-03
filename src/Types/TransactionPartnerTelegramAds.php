<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes a withdrawal transaction to the Telegram Ads platform.
 */
class TransactionPartnerTelegramAds extends TransactionPartner
{
    /**
     * @param string $type Type of the transaction partner, always “telegram_ads”
     */
    public function __construct(
        public string $type,
    ) {
    }
}
