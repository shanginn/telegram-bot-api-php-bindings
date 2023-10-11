<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes the current status of a webhook.
 */
class WebhookInfo implements TypeInterface
{
    /**
     * @param string             $url                          Webhook URL, may be empty if webhook is not set up
     * @param bool               $hasCustomCertificate         True, if a custom certificate was provided for webhook certificate checks
     * @param int                $pendingUpdateCount           Number of updates awaiting delivery
     * @param string|null        $ipAddress                    Optional. Currently used webhook IP address
     * @param int|null           $lastErrorDate                Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
     * @param string|null        $lastErrorMessage             Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
     * @param int|null           $lastSynchronizationErrorDate Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
     * @param int|null           $maxConnections               Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     * @param array<string>|null $allowedUpdates               Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
     */
    public function __construct(
        public string $url,
        public bool $hasCustomCertificate,
        public int $pendingUpdateCount,
        public ?string $ipAddress = null,
        public ?int $lastErrorDate = null,
        public ?string $lastErrorMessage = null,
        public ?int $lastSynchronizationErrorDate = null,
        public ?int $maxConnections = null,
        public ?array $allowedUpdates = null,
    ) {
    }
}
