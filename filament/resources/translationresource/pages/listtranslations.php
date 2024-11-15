<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\TranslationResource\Pages;

use Modules\Lang\Filament\Resources\TranslationResource;
use Modules\Xot\Filament\Pages\XotBaseListRecords;

class ListTranslations extends XotBaseListRecords
{
    protected static string $resource = TranslationResource::class;
}
