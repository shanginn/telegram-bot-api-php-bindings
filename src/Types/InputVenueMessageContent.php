<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the content of a venue message to be sent as the result of an inline query.
 */
class InputVenueMessageContent extends InputMessageContent
{
    /**
     * @param float       $latitude        Latitude of the venue in degrees
     * @param float       $longitude       Longitude of the venue in degrees
     * @param string      $title           Name of the venue
     * @param string      $address         Address of the venue
     * @param string|null $foursquareId    Optional. Foursquare identifier of the venue, if known
     * @param string|null $foursquareType  Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null $googlePlaceId   Optional. Google Places identifier of the venue
     * @param string|null $googlePlaceType Optional. Google Places type of the venue. (See supported types.)
     */
    public function __construct(
        public float $latitude,
        public float $longitude,
        public string $title,
        public string $address,
        public ?string $foursquareId = null,
        public ?string $foursquareType = null,
        public ?string $googlePlaceId = null,
        public ?string $googlePlaceType = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'latitude',
            'longitude',
            'title',
            'address',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($result[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            latitude: $result['latitude'],
            longitude: $result['longitude'],
            title: $result['title'],
            address: $result['address'],
            foursquareId: $result['foursquare_id'] ?? null,
            foursquareType: $result['foursquare_type'] ?? null,
            googlePlaceId: $result['google_place_id'] ?? null,
            googlePlaceType: $result['google_place_type'] ?? null,
        );
    }
}
