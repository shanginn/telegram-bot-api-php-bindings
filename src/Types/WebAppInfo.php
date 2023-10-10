<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes a Web App.
 */
class WebAppInfo implements TypeInterface
{
	/**
	 * @param string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
	 */
	public function __construct(
		public string $url,
	) {
	}
}
