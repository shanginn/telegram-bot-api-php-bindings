<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the venue.
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    /**
     * @param string                    $id                  Unique identifier for this result, 1-64 Bytes
     * @param float                     $latitude            Latitude of the venue location in degrees
     * @param float                     $longitude           Longitude of the venue location in degrees
     * @param string                    $title               Title of the venue
     * @param string                    $address             Address of the venue
     * @param string                    $type                Type of the result, must be venue
     * @param string|null               $foursquareId        Optional. Foursquare identifier of the venue if known
     * @param string|null               $foursquareType      Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null               $googlePlaceId       Optional. Google Places identifier of the venue
     * @param string|null               $googlePlaceType     Optional. Google Places type of the venue. (See supported types.)
     * @param InlineKeyboardMarkup|null $replyMarkup         Optional. Inline keyboard attached to the message
     * @param InputMessageContent|null  $inputMessageContent Optional. Content of the message to be sent instead of the venue
     * @param string|null               $thumbnailUrl        Optional. Url of the thumbnail for the result
     * @param int|null                  $thumbnailWidth      Optional. Thumbnail width
     * @param int|null                  $thumbnailHeight     Optional. Thumbnail height
     */
    public function __construct(
        public string $id,
        public float $latitude,
        public float $longitude,
        public string $title,
        public string $address,
        public string $type = 'venue',
        public ?string $foursquareId = null,
        public ?string $foursquareType = null,
        public ?string $googlePlaceId = null,
        public ?string $googlePlaceType = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
        public ?string $thumbnailUrl = null,
        public ?int $thumbnailWidth = null,
        public ?int $thumbnailHeight = null,
    ) {
    }
}
