<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 */
class InputLocationMessageContent extends InputMessageContent
{
	/**
	 * @param float $latitude Latitude of the location in degrees
	 * @param float $longitude Longitude of the location in degrees
	 * @param float|null $horizontalAccuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
	 * @param int|null $livePeriod Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
	 * @param int|null $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
	 * @param int|null $proximityAlertRadius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
	 */
	public function __construct(
		public float $latitude,
		public float $longitude,
		public ?float $horizontalAccuracy = null,
		public ?int $livePeriod = null,
		public ?int $heading = null,
		public ?int $proximityAlertRadius = null,
	) {
	}
}
