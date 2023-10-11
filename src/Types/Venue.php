<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a venue.
 */
class Venue implements TypeInterface
{
    /**
     * @param Location    $location        Venue location. Can't be a live location
     * @param string      $title           Name of the venue
     * @param string      $address         Address of the venue
     * @param string|null $foursquareId    Optional. Foursquare identifier of the venue
     * @param string|null $foursquareType  Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null $googlePlaceId   Optional. Google Places identifier of the venue
     * @param string|null $googlePlaceType Optional. Google Places type of the venue. (See supported types.)
     */
    public function __construct(
        public Location $location,
        public string $title,
        public string $address,
        public ?string $foursquareId = null,
        public ?string $foursquareType = null,
        public ?string $googlePlaceId = null,
        public ?string $googlePlaceType = null,
    ) {
    }
}
