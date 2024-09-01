<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an error in the Telegram Passport element which was submitted that should be resolved by the user. It should be one of:
 *
 * @see PassportElementErrorDataField
 * @see PassportElementErrorFrontSide
 * @see PassportElementErrorReverseSide
 * @see PassportElementErrorSelfie
 * @see PassportElementErrorFile
 * @see PassportElementErrorFiles
 * @see PassportElementErrorTranslationFile
 * @see PassportElementErrorTranslationFiles
 * @see PassportElementErrorUnspecified
 */
abstract class PassportElementError implements TypeInterface
{
    public function __construct()
    {
    }
}
