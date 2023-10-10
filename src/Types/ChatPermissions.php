<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 */
class ChatPermissions implements TypeInterface
{
	/**
	 * @param bool|null $canSendMessages Optional. True, if the user is allowed to send text messages, contacts, invoices, locations and venues
	 * @param bool|null $canSendAudios Optional. True, if the user is allowed to send audios
	 * @param bool|null $canSendDocuments Optional. True, if the user is allowed to send documents
	 * @param bool|null $canSendPhotos Optional. True, if the user is allowed to send photos
	 * @param bool|null $canSendVideos Optional. True, if the user is allowed to send videos
	 * @param bool|null $canSendVideoNotes Optional. True, if the user is allowed to send video notes
	 * @param bool|null $canSendVoiceNotes Optional. True, if the user is allowed to send voice notes
	 * @param bool|null $canSendPolls Optional. True, if the user is allowed to send polls
	 * @param bool|null $canSendOtherMessages Optional. True, if the user is allowed to send animations, games, stickers and use inline bots
	 * @param bool|null $canAddWebPagePreviews Optional. True, if the user is allowed to add web page previews to their messages
	 * @param bool|null $canChangeInfo Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
	 * @param bool|null $canInviteUsers Optional. True, if the user is allowed to invite new users to the chat
	 * @param bool|null $canPinMessages Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
	 * @param bool|null $canManageTopics Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
	 */
	public function __construct(
		public ?bool $canSendMessages = null,
		public ?bool $canSendAudios = null,
		public ?bool $canSendDocuments = null,
		public ?bool $canSendPhotos = null,
		public ?bool $canSendVideos = null,
		public ?bool $canSendVideoNotes = null,
		public ?bool $canSendVoiceNotes = null,
		public ?bool $canSendPolls = null,
		public ?bool $canSendOtherMessages = null,
		public ?bool $canAddWebPagePreviews = null,
		public ?bool $canChangeInfo = null,
		public ?bool $canInviteUsers = null,
		public ?bool $canPinMessages = null,
		public ?bool $canManageTopics = null,
	) {
	}
}
