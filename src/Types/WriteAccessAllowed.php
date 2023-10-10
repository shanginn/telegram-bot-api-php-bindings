<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding it to the attachment menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess.
 */
class WriteAccessAllowed implements TypeInterface
{
	/**
	 * @param bool|null $fromRequest Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method requestWriteAccess
	 * @param string|null $webAppName Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
	 * @param bool|null $fromAttachmentMenu Optional. True, if the access was granted when the bot was added to the attachment or side menu
	 */
	public function __construct(
		public ?bool $fromRequest = null,
		public ?string $webAppName = null,
		public ?bool $fromAttachmentMenu = null,
	) {
	}
}
