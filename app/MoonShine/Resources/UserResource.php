<?php

namespace App\MoonShine\Resources;
use MoonShine\Actions\ImportAction;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use MoonShine\Actions\ExportAction;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Actions\FiltersAction;

class UserResource extends Resource
{
	public static string $model = User::class;

	public static string $title = 'Управление пользователями';

	public function fields(): array
	{
		return [
            ID::make('#', 'id')->sortable()->showOnExport(),
            Text::make('ФИО', 'name')->sortable()->showOnExport(),
            Text::make('Password', 'password')->sortable()->showOnExport(),
            Text::make('Email', 'email')->sortable()->showOnExport(),
            Text::make('Роль', 'role')->showOnExport(),
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id','role' ];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
            ExportAction::make('Export')
            // Optional methods
            // If you want to run in the background
            ->queue()
            // Selecting a drive
            ->disk('public')
            // Selecting a save directory
            ->dir('/exports')
            // If you want to use csv format
            ->csv()
            // If you use csv
            ->delimiter(',')
        ,
        ];
    }
}
