<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 */
class ChosenInlineResult implements TypeInterface
{
    /**
     * @param string        $resultId        The unique identifier for the result that was chosen
     * @param User          $from            The user that chose the result
     * @param string        $query           The query that was used to obtain the result
     * @param Location|null $location        Optional. Sender location, only for bots that require user location
     * @param string|null   $inlineMessageId Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
     */
    public function __construct(
        public string $resultId,
        public User $from,
        public string $query,
        public ?Location $location = null,
        public ?string $inlineMessageId = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'result_id',
            'from',
            'query',
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
            resultId: $result['result_id'],
            from: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['from']),
            query: $result['query'],
            location: $result['location'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Location::fromResponseResult($result['location'])
                : null,
            inlineMessageId: $result['inline_message_id'] ?? null,
        );
    }
}
