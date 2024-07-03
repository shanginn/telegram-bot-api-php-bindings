<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
 */
class ExternalReplyInfo implements TypeInterface
{
    /**
     * @param MessageOrigin           $origin             Origin of the message replied to by the given message
     * @param Chat|null               $chat               Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
     * @param int|null                $messageId          Optional. Unique message identifier inside the original chat. Available only if the original chat is a supergroup or a channel.
     * @param LinkPreviewOptions|null $linkPreviewOptions Optional. Options used for link preview generation for the original message, if it is a text message
     * @param Animation|null          $animation          Optional. Message is an animation, information about the animation
     * @param Audio|null              $audio              Optional. Message is an audio file, information about the file
     * @param Document|null           $document           Optional. Message is a general file, information about the file
     * @param PaidMediaInfo|null      $paidMedia          Optional. Message contains paid media; information about the paid media
     * @param array<PhotoSize>|null   $photo              Optional. Message is a photo, available sizes of the photo
     * @param Sticker|null            $sticker            Optional. Message is a sticker, information about the sticker
     * @param Story|null              $story              Optional. Message is a forwarded story
     * @param Video|null              $video              Optional. Message is a video, information about the video
     * @param VideoNote|null          $videoNote          Optional. Message is a video note, information about the video message
     * @param Voice|null              $voice              Optional. Message is a voice message, information about the file
     * @param bool|null               $hasMediaSpoiler    Optional. True, if the message media is covered by a spoiler animation
     * @param Contact|null            $contact            Optional. Message is a shared contact, information about the contact
     * @param Dice|null               $dice               Optional. Message is a dice with random value
     * @param Game|null               $game               Optional. Message is a game, information about the game. More about games »
     * @param Giveaway|null           $giveaway           Optional. Message is a scheduled giveaway, information about the giveaway
     * @param GiveawayWinners|null    $giveawayWinners    Optional. A giveaway with public winners was completed
     * @param Invoice|null            $invoice            Optional. Message is an invoice for a payment, information about the invoice. More about payments »
     * @param Location|null           $location           Optional. Message is a shared location, information about the location
     * @param Poll|null               $poll               Optional. Message is a native poll, information about the poll
     * @param Venue|null              $venue              Optional. Message is a venue, information about the venue
     */
    public function __construct(
        public MessageOrigin $origin,
        public ?Chat $chat = null,
        public ?int $messageId = null,
        public ?LinkPreviewOptions $linkPreviewOptions = null,
        public ?Animation $animation = null,
        public ?Audio $audio = null,
        public ?Document $document = null,
        public ?PaidMediaInfo $paidMedia = null,
        public ?array $photo = null,
        public ?Sticker $sticker = null,
        public ?Story $story = null,
        public ?Video $video = null,
        public ?VideoNote $videoNote = null,
        public ?Voice $voice = null,
        public ?bool $hasMediaSpoiler = null,
        public ?Contact $contact = null,
        public ?Dice $dice = null,
        public ?Game $game = null,
        public ?Giveaway $giveaway = null,
        public ?GiveawayWinners $giveawayWinners = null,
        public ?Invoice $invoice = null,
        public ?Location $location = null,
        public ?Poll $poll = null,
        public ?Venue $venue = null,
    ) {
    }
}
