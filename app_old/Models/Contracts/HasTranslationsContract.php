<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Contracts;

interface HasTranslationsContract
{
    public function getTranslation(string $key, string $locale, bool $useFallbackLocale = true): mixed;

    /**
     * @param int|array|string|null $value
     */
    public function setTranslation(string $key, string $locale, $value): self;
}
