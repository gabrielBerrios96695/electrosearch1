<?php

namespace App\Orchid\Resources;

use App\Models\Category;
use App\Orchid\Resources\Auth;
use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;

use Orchid\Screen\Sight;

class CategoryResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Category::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
      
        return [
            Input::make('name')
                ->title('Nombre de la categoria')
                ->type('text')
                ->placeholder('Nombre de la categoria')
                ->required(),


                
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make('name', 'Nombre de la categoria'),

            TD::make('idUser', 'Nombre de la Creador' ),
               

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
