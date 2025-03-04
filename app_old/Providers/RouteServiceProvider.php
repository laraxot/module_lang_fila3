<?php

declare(strict_types=1);

namespace Modules\Lang\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Lang\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $name = 'Lang';

    public function boot(): void
    {
        parent::boot();
        $this->registerLang();
    }

    public function register(): void
    {
        parent::register();
        // $this->registerLang();
    }

    public function registerLang(): void
    {
        $locales = config('laravellocalization.supportedLocales');
        if (! \is_array($locales)) {
            $locales = ['it' => 'it', 'en' => 'en'];
        }
        $langs = array_keys($locales);

        /*
        if (! \is_array($langs)) {
            throw new \Exception('[.__LINE__.]['.class_basename(self::class).']');
        }
        \getRouteParameters();
        */
        $n = 1;
        if (inAdmin()) {
            $n = 3;
        }

        if (\in_array(request()->segment($n), $langs, false)) {
            $lang = request()->segment($n);
            if (null !== $lang) {
                app()->setLocale($lang);
            }
        }
    }
}
