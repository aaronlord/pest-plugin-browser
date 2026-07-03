<?php

declare(strict_types=1);

namespace Pest\Browser\Exceptions;

use RuntimeException;

/**
 * Thrown when the Playwright driver returns an error response that carries
 * a structured `errorDetails` payload (e.g. `expectScreenshot` comparison
 * failures, which carry `diff`/`actual`/`previous` binaries alongside the
 * generic "Expect failed" error message).
 *
 * @internal
 */
final class PlaywrightErrorDetailsException extends RuntimeException
{
    /**
     * @param  array<string, mixed>  $details
     */
    public function __construct(string $message, private readonly array $details)
    {
        parent::__construct($message);
    }

    /**
     * @return array<string, mixed>
     */
    public function details(): array
    {
        return $this->details;
    }
}
