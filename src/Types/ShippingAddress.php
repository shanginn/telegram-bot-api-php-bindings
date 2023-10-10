<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a shipping address.
 */
class ShippingAddress implements TypeInterface
{
	/**
	 * @param string $countryCode Two-letter ISO 3166-1 alpha-2 country code
	 * @param string $state State, if applicable
	 * @param string $city City
	 * @param string $streetLine1 First line for the address
	 * @param string $streetLine2 Second line for the address
	 * @param string $postCode Address post code
	 */
	public function __construct(
		public string $countryCode,
		public string $state,
		public string $city,
		public string $streetLine1,
		public string $streetLine2,
		public string $postCode,
	) {
	}
}
