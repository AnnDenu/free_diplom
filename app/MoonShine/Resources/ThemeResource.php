<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Theme;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Actions\FiltersAction;

class ThemeResource extends Resource
{
	public static string $model = Theme::class;

	public static string $title = 'Themes';

	public function fields(): array
	{
		return [

		    ID::make('#','id')->sortable(),
		    Number::make('Раздел','chapter_id')->sortable(),
            Text::make('Название', 'name')->sortable(),
            Text::make('Описание','content')->sortable(),
            Image::make('Прикрепите документ', 'document')
            ->dir('/project/files') // The directory where the files will be stored in storage (by default /)
            ->disk('public') // Filesystems disk
            ->allowedExtensions(['jpg', 'gif', 'png', 'docx','doc']),
            Text::make('Тип занятия', 'type_of_activity')->sortable(),

        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
