<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes the opening hours of a business.
 */
class BusinessOpeningHours implements TypeInterface
{
    /**
     * @param string                              $timeZoneName Unique name of the time zone for which the opening hours are defined
     * @param array<BusinessOpeningHoursInterval> $openingHours List of time intervals describing business opening hours
     */
    public function __construct(
        public string $timeZoneName,
        public array $openingHours,
    ) {
    }
}
