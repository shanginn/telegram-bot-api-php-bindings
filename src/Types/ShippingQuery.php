<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about an incoming shipping query.
 */
class ShippingQuery implements TypeInterface
{
    /**
     * @param string          $id              Unique query identifier
     * @param User            $from            User who sent the query
     * @param string          $invoicePayload  Bot specified invoice payload
     * @param ShippingAddress $shippingAddress User specified shipping address
     */
    public function __construct(
        public string $id,
        public User $from,
        public string $invoicePayload,
        public ShippingAddress $shippingAddress,
    ) {
    }
}
