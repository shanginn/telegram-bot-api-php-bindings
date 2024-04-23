<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a point on the map.
 */
class Location implements TypeInterface
{
    /**
     * @param float      $latitude             Latitude as defined by sender
     * @param float      $longitude            Longitude as defined by sender
     * @param float|null $horizontalAccuracy   Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null   $livePeriod           Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
     * @param int|null   $heading              Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     * @param int|null   $proximityAlertRadius Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
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
