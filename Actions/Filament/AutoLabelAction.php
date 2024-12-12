<?php

declare(strict_types=1);

namespace Modules\Lang\Actions\Filament;

use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Wizard\Step;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\BaseFilter;
use Illuminate\Support\Arr;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class AutoLabelAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     * return number of input added.
     *
     * @param Field|BaseFilter|Column|Step|Action $component
     *
     * @return Field|BaseFilter|Column|Step|Action
     */
    public function execute($component)
    {
        $backtrace = debug_backtrace();
        Assert::string($class = Arr::get($backtrace, '5.class'));
        $trans_key = app(GetTransKeyAction::class)->execute($class);

        if ($component instanceof Step) {
            $val = $component->getLabel();
            $label_tkey = $trans_key.'.steps.'.$val.'';
        } else {
            $val = $component->getName();
            $label_tkey = $trans_key.'.fields.'.$val.'';
        }

        if ($component instanceof Action) {
            $label_tkey = $trans_key.'.actions.'.$val.'';
        }

        $label_key = $label_tkey.'.label';

        $label = trans($label_key);
        if (is_string($label)) {
            if ($label_key == $label) {
                $label_value = $val;
                $label_key1 = $label_tkey;
                $label1 = trans($label_key1);
                if ($label_key1 != $label1) {
                    $label_value = $label1;
                }

                app(SaveTransAction::class)->execute($label_key, $label_value);
            }
            $component->label($label);
        } else {
            $component->label('FIX:'.$label_key);
        }

        return $component;
    }
}
