<?php

namespace App\Providers;

use App\MoonShine\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\Menu\MenuDivider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use App\MoonShine\Resources\CourseResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\ChapterResource;
use App\MoonShine\Resources\ThemeResource;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([
            MenuItem::make('Администраторы системы', new MoonShineUserResource()),
            MenuDivider::make(), 
        MenuItem::make('Курсы', new CourseResource()),
        MenuDivider::make(), 
        MenuItem::make('Категории курсов', new CategoryResource()),
        MenuDivider::make(), 
        MenuItem::make('Разделы курсов', new ChapterResource()),
        MenuDivider::make(), 
        MenuItem::make('Темы разделов', new ThemeResource()),
        MenuDivider::make(), 
        MenuItem::make('Пользователи и роли', new UserResource()),
       ]);
    }
}
