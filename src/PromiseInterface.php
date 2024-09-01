<?php

declare(strict_types=1);

namespace Shanginn\TelegramBotApiBindings;

/**
 * A promise represents the eventual result of an asynchronous operation.
 *
 * The primary way of interacting with a promise is through its then method,
 * which registers callbacks to receive either a promise's eventual value or
 * the reason why the promise cannot be fulfilled.
 *
 * @template-covariant T The type of the value that the promise resolves to
 *
 * @see https://promisesaplus.com/
 * @see https://github.com/guzzle/promises/blob/2.0/src/PromiseInterface.php
 * @see https://github.com/reactphp/promise/blob/3.x/src/PromiseInterface.php
 */
interface PromiseInterface
{
    /**
     * Appends fulfillment and rejection handlers to the promise, and returns
     * a new promise resolving to the return value of the called handler.
     *
     * @template TFulfilled
     * @template TRejected
     *
     * @param (callable((T is void ? null : T)): (PromiseInterface<TFulfilled>|TFulfilled))|null $onFulfilled
     * @param (callable(\Throwable): (PromiseInterface<TRejected>|TRejected))|null               $onRejected
     *
     * @return PromiseInterface<($onRejected is null ? ($onFulfilled is null ? T : TFulfilled) : ($onFulfilled is null ? T|TRejected : TFulfilled|TRejected))>
     */
    public function then(
        ?callable $onFulfilled = null,
        ?callable $onRejected = null,
    ): PromiseInterface;
}
