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

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'url',
            'has_custom_certificate',
            'pending_update_count',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            url: $result['url'],
            hasCustomCertificate: $result['has_custom_certificate'],
            pendingUpdateCount: $result['pending_update_count'],
            ipAddress: $result['ip_address'] ?? null,
            lastErrorDate: $result['last_error_date'] ?? null,
            lastErrorMessage: $result['last_error_message'] ?? null,
            lastSynchronizationErrorDate: $result['last_synchronization_error_date'] ?? null,
            maxConnections: $result['max_connections'] ?? null,
            allowedUpdates: $result['allowed_updates'] ?? null,
        );
    }
}
