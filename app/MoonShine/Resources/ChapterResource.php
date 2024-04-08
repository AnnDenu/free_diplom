<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Actions\FiltersAction;

class ChapterResource extends Resource
{
	public static string $model = Chapter::class;

	public static string $title = 'Разделы курсов';

	public function fields(): array
	{
		return [
		    ID::make('#','id')->sortable(),
            Text::make('Название', 'name')->sortable(),
            Number::make('Курс','course_id')->sortable(),
            Text::make('Описание', 'content')->sortable(),

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
