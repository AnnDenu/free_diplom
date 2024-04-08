<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

use MoonShine\Resources\Resource;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class CourseResource extends Resource
{
	public static string $model = Course::class;

	public static string $title = 'Управление курсами';

	public function fields(): array
	{
		return [
            ID::make('#','id')->sortable(),
            Text::make('Название','name')->sortable(),
            Number::make('Категория','category_id')->sortable(),
            Text::make('Преподаватель','teacher_id')->sortable(),
            Textarea::make('Описание', 'description')->sortable()
            
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
