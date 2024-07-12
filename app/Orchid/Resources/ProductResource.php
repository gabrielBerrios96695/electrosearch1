<?php

namespace App\Orchid\Resources;

use App\Models\Product;
use Orchid\Crud\Resource;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ProductResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Product::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->title('Nombre')
                ->placeholder('Nombre del producto')
                ->help('Ingrese el nombre del producto'),

            Input::make('description')
                ->title('Descripción')
                ->placeholder('Descripción del producto')
                ->help('Ingrese la descripción del producto'),

            Input::make('price')
                ->title('Precio')
                ->type('number')
                ->placeholder('Precio del producto')
                ->help('Ingrese el precio del producto'),

            Input::make('stock')
                ->title('Stock')
                ->type('number')
                ->placeholder('Stock del producto')
                ->help('Ingrese la cantidad de stock'),

            Relation::make('category_id')
                ->fromModel(\App\Models\Category::class, 'name')
                ->title('Categoría')
                ->help('Seleccione la categoría del producto'),
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
            TD::make('id', 'ID'),

            TD::make('name', 'Nombre'),

            TD::make('description', 'Descripción'),

            TD::make('price', 'Precio'),

            TD::make('stock', 'Stock'),

            TD::make('user_id', 'Usuario'),

            TD::make('category_id', 'Categoría')
                ->render(function ($product) {
                    return $product->category ? $product->category->name : 'Sin categoría';
                }),

            TD::make('created_at', 'Fecha de creación')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Fecha de actualización')
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
        return [
            Sight::make('id', 'ID'),
            Sight::make('name', 'Nombre'),
            Sight::make('description', 'Descripción'),
            Sight::make('price', 'Precio'),
            Sight::make('stock', 'Stock'),
            Sight::make('category.name', 'Categoría')
                ->render(function ($product) {
                    return $product->category ? $product->category->name : 'Sin categoría';
                }),
            Sight::make('created_at', 'Fecha de creación')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            Sight::make('updated_at', 'Fecha de actualización')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
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

    /**
     * Apply modifications to the query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(\Illuminate\Database\Eloquent\Builder $query)
    {
        return $query->with('category');
    }
}
