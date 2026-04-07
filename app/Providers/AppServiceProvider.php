<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentView::registerRenderHook(
    'panels::auth.login.form.after',
    fn (): string => Blade::render('
        <div class="mt-5">
            <div class="relative flex items-center mb-4">
                <div class="flex-grow border-t border-gray-200 dark:border-white/10"></div>
                <span class="flex-shrink mx-4 text-xs text-gray-400 uppercase tracking-widest">Atau</span>
                <div class="flex-grow border-t border-gray-200 dark:border-white/10"></div>
            </div>

            <a href="{{ route("google.login") }}" 
                class="flex items-center justify-center w-full gap-2 px-3 py-1.5 border rounded-xl border-gray-300 dark:border-white/10 hover:bg-gray-50 dark:hover:bg-white/5 transition bg-white dark:bg-transparent">
                <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" 
                     class="w-[14px] h-[14px]" 
                     alt="Google Logo">
                <span class="text-[13px] font-medium text-gray-700 dark:text-gray-300">Masuk dengan Google</span>
            </a>
        </div>
    '),
);
    }
}
