<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\Array\SaveArrayAction;
use Spatie\QueueableAction\QueueableAction;

class SaveTransAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(string $key, int|string|array|null $data): void
    {
        $filename = app(GetTransPathAction::class)->execute($key);
        $cont = File::getRequire($filename);
        if (! is_array($cont)) {
            $cont = [];
        }
        $piece = implode('.', array_slice(explode('.', $key), 1));
        if ('' !== $piece) {
            Arr::set($cont, $piece, $data);
        } else {
            $cont = $data;
        }

        if (! is_array($cont)) {
            throw new \Exception('Error in SaveTransAction');
        }

        app(SaveArrayAction::class)->execute(data: $cont, filename: $filename);
    }
}
