<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about a poll.
 */
class Poll implements TypeInterface
{
    /**
     * @param string                    $id                    Unique poll identifier
     * @param string                    $question              Poll question, 1-300 characters
     * @param array<PollOption>         $options               List of poll options
     * @param int                       $totalVoterCount       Total number of users that voted in the poll
     * @param bool                      $isClosed              True, if the poll is closed
     * @param bool                      $isAnonymous           True, if the poll is anonymous
     * @param string                    $type                  Poll type, currently can be “regular” or “quiz”
     * @param bool                      $allowsMultipleAnswers True, if the poll allows multiple answers
     * @param int|null                  $correctOptionId       Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
     * @param string|null               $explanation           Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
     * @param array<MessageEntity>|null $explanationEntities   Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
     * @param int|null                  $openPeriod            Optional. Amount of time in seconds the poll will be active after creation
     * @param int|null                  $closeDate             Optional. Point in time (Unix timestamp) when the poll will be automatically closed
     */
    public function __construct(
        public string $id,
        public string $question,
        public array $options,
        public int $totalVoterCount,
        public bool $isClosed,
        public bool $isAnonymous,
        public string $type,
        public bool $allowsMultipleAnswers,
        public ?int $correctOptionId = null,
        public ?string $explanation = null,
        public ?array $explanationEntities = null,
        public ?int $openPeriod = null,
        public ?int $closeDate = null,
    ) {
    }
}
