<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents one shipping option.
 */
class ShippingOption implements TypeInterface
{
	/**
	 * @param string $id Shipping option identifier
	 * @param string $title Option title
	 * @param array<LabeledPrice> $prices List of price portions
	 */
	public function __construct(
		public string $id,
		public string $title,
		public array $prices,
	) {
	}
}
