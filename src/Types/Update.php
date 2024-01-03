<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an incoming update.At most one of the optional parameters can be present in any given update.
 */
class Update implements TypeInterface
{
    /**
     * @param int                              $updateId             The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you're using webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
     * @param Message|null                     $message              Optional. New incoming message of any kind - text, photo, sticker, etc.
     * @param Message|null                     $editedMessage        Optional. New version of a message that is known to the bot and was edited
     * @param Message|null                     $channelPost          Optional. New incoming channel post of any kind - text, photo, sticker, etc.
     * @param Message|null                     $editedChannelPost    Optional. New version of a channel post that is known to the bot and was edited
     * @param MessageReactionUpdated|null      $messageReaction      Optional. A reaction to a message was changed by a user. The bot must be an administrator in the chat and must explicitly specify "message_reaction" in the list of allowed_updates to receive these updates. The update isn't received for reactions set by bots.
     * @param MessageReactionCountUpdated|null $messageReactionCount Optional. Reactions to a message with anonymous reactions were changed. The bot must be an administrator in the chat and must explicitly specify "message_reaction_count" in the list of allowed_updates to receive these updates.
     * @param InlineQuery|null                 $inlineQuery          Optional. New incoming inline query
     * @param ChosenInlineResult|null          $chosenInlineResult   Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
     * @param CallbackQuery|null               $callbackQuery        Optional. New incoming callback query
     * @param ShippingQuery|null               $shippingQuery        Optional. New incoming shipping query. Only for invoices with flexible price
     * @param PreCheckoutQuery|null            $preCheckoutQuery     Optional. New incoming pre-checkout query. Contains full information about checkout
     * @param Poll|null                        $poll                 Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
     * @param PollAnswer|null                  $pollAnswer           Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
     * @param ChatMemberUpdated|null           $myChatMember         Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
     * @param ChatMemberUpdated|null           $chatMember           Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify "chat_member" in the list of allowed_updates to receive these updates.
     * @param ChatJoinRequest|null             $chatJoinRequest      Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates.
     * @param ChatBoostUpdated|null            $chatBoost            Optional. A chat boost was added or changed. The bot must be an administrator in the chat to receive these updates.
     * @param ChatBoostRemoved|null            $removedChatBoost     Optional. A boost was removed from a chat. The bot must be an administrator in the chat to receive these updates.
     */
    public function __construct(
        public int $updateId,
        public ?Message $message = null,
        public ?Message $editedMessage = null,
        public ?Message $channelPost = null,
        public ?Message $editedChannelPost = null,
        public ?MessageReactionUpdated $messageReaction = null,
        public ?MessageReactionCountUpdated $messageReactionCount = null,
        public ?InlineQuery $inlineQuery = null,
        public ?ChosenInlineResult $chosenInlineResult = null,
        public ?CallbackQuery $callbackQuery = null,
        public ?ShippingQuery $shippingQuery = null,
        public ?PreCheckoutQuery $preCheckoutQuery = null,
        public ?Poll $poll = null,
        public ?PollAnswer $pollAnswer = null,
        public ?ChatMemberUpdated $myChatMember = null,
        public ?ChatMemberUpdated $chatMember = null,
        public ?ChatJoinRequest $chatJoinRequest = null,
        public ?ChatBoostUpdated $chatBoost = null,
        public ?ChatBoostRemoved $removedChatBoost = null,
    ) {
    }
}
