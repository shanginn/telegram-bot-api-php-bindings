<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the content of an invoice message to be sent as the result of an inline query.
 */
class InputInvoiceMessageContent extends InputMessageContent
{
    /**
     * @param string              $title                     Product name, 1-32 characters
     * @param string              $description               Product description, 1-255 characters
     * @param string              $payload                   Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
     * @param string              $providerToken             Payment provider token, obtained via @BotFather
     * @param string              $currency                  Three-letter ISO 4217 currency code, see more on currencies
     * @param array<LabeledPrice> $prices                    Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
     * @param int|null            $maxTipAmount              Optional. The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
     * @param array<int>|null     $suggestedTipAmounts       Optional. A JSON-serialized array of suggested amounts of tip in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
     * @param string|null         $providerData              Optional. A JSON-serialized object for data about the invoice, which will be shared with the payment provider. A detailed description of the required fields should be provided by the payment provider.
     * @param string|null         $photoUrl                  Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
     * @param int|null            $photoSize                 Optional. Photo size in bytes
     * @param int|null            $photoWidth                Optional. Photo width
     * @param int|null            $photoHeight               Optional. Photo height
     * @param bool|null           $needName                  Optional. Pass True if you require the user's full name to complete the order
     * @param bool|null           $needPhoneNumber           Optional. Pass True if you require the user's phone number to complete the order
     * @param bool|null           $needEmail                 Optional. Pass True if you require the user's email address to complete the order
     * @param bool|null           $needShippingAddress       Optional. Pass True if you require the user's shipping address to complete the order
     * @param bool|null           $sendPhoneNumberToProvider Optional. Pass True if the user's phone number should be sent to provider
     * @param bool|null           $sendEmailToProvider       Optional. Pass True if the user's email address should be sent to provider
     * @param bool|null           $isFlexible                Optional. Pass True if the final price depends on the shipping method
     */
    public function __construct(
        public string $title,
        public string $description,
        public string $payload,
        public string $providerToken,
        public string $currency,
        public array $prices,
        public ?int $maxTipAmount = 0,
        public ?array $suggestedTipAmounts = null,
        public ?string $providerData = null,
        public ?string $photoUrl = null,
        public ?int $photoSize = null,
        public ?int $photoWidth = null,
        public ?int $photoHeight = null,
        public ?bool $needName = null,
        public ?bool $needPhoneNumber = null,
        public ?bool $needEmail = null,
        public ?bool $needShippingAddress = null,
        public ?bool $sendPhoneNumberToProvider = null,
        public ?bool $sendEmailToProvider = null,
        public ?bool $isFlexible = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'title',
            'description',
            'payload',
            'provider_token',
            'currency',
            'prices',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            title: $result['title'],
            description: $result['description'],
            payload: $result['payload'],
            providerToken: $result['provider_token'],
            currency: $result['currency'],
            prices: $result['prices'],
            maxTipAmount: $result['max_tip_amount'],
            suggestedTipAmounts: $result['suggested_tip_amounts'] ?? null,
            providerData: $result['provider_data'] ?? null,
            photoUrl: $result['photo_url'] ?? null,
            photoSize: $result['photo_size'] ?? null,
            photoWidth: $result['photo_width'] ?? null,
            photoHeight: $result['photo_height'] ?? null,
            needName: $result['need_name'] ?? null,
            needPhoneNumber: $result['need_phone_number'] ?? null,
            needEmail: $result['need_email'] ?? null,
            needShippingAddress: $result['need_shipping_address'] ?? null,
            sendPhoneNumberToProvider: $result['send_phone_number_to_provider'] ?? null,
            sendEmailToProvider: $result['send_email_to_provider'] ?? null,
            isFlexible: $result['is_flexible'] ?? null,
        );
    }
}
