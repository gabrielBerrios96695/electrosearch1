<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            /*Menu::make('Get Started')
                ->icon('bs.book')
                ->title('Navigation')
                ->route(config('platform.index')),

            Menu::make('Sample Screen')
                ->icon('bs.collection')
                ->route('platform.example')
                ->badge(fn () => 6),


*/
            

            Menu::make(__('Usuarios'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__(' Control de Acceso')),

            Menu::make(__('Roles'))
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(), 

            Menu::make(__('Example'))
                ->icon('bs.collection')
                ->route('platform.example')
                ->permission('platform.example.index')
                ->title(__('Ejemplos'))   
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),

            ItemPermission::group(__('Example'))
                ->addPermission('platform.example.index', __('Index')),
        ];
    }
}
