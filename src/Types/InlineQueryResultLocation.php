<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    /**
     * @param string                    $id                   Unique identifier for this result, 1-64 Bytes
     * @param float                     $latitude             Location latitude in degrees
     * @param float                     $longitude            Location longitude in degrees
     * @param string                    $title                Location title
     * @param string                    $type                 Type of the result, must be location
     * @param float|null                $horizontalAccuracy   Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null                  $livePeriod           Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
     * @param int|null                  $heading              Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     * @param int|null                  $proximityAlertRadius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
     * @param InlineKeyboardMarkup|null $replyMarkup          Optional. Inline keyboard attached to the message
     * @param InputMessageContent|null  $inputMessageContent  Optional. Content of the message to be sent instead of the location
     * @param string|null               $thumbnailUrl         Optional. Url of the thumbnail for the result
     * @param int|null                  $thumbnailWidth       Optional. Thumbnail width
     * @param int|null                  $thumbnailHeight      Optional. Thumbnail height
     */
    public function __construct(
        public string $id,
        public float $latitude,
        public float $longitude,
        public string $title,
        public string $type = 'location',
        public ?float $horizontalAccuracy = null,
        public ?int $livePeriod = null,
        public ?int $heading = null,
        public ?int $proximityAlertRadius = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
        public ?string $thumbnailUrl = null,
        public ?int $thumbnailWidth = null,
        public ?int $thumbnailHeight = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'id',
            'latitude',
            'longitude',
            'title',
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
            id: $result['id'],
            latitude: $result['latitude'],
            longitude: $result['longitude'],
            title: $result['title'],
            type: $result['type'] ?? 'location',
            horizontalAccuracy: $result['horizontal_accuracy'] ?? null,
            livePeriod: $result['live_period'] ?? null,
            heading: $result['heading'] ?? null,
            proximityAlertRadius: $result['proximity_alert_radius'] ?? null,
            replyMarkup: ($result['reply_markup'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup::fromResponseResult($result['reply_markup'])
                : null,
            inputMessageContent: ($result['input_message_content'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InputMessageContent::fromResponseResult($result['input_message_content'])
                : null,
            thumbnailUrl: $result['thumbnail_url'] ?? null,
            thumbnailWidth: $result['thumbnail_width'] ?? null,
            thumbnailHeight: $result['thumbnail_height'] ?? null,
        );
    }
}
