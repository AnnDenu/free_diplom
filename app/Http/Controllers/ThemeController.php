<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Chapter;
class ThemeController extends Controller
{
    //Отображение тем курса
    public function storeTheme():View {
        $themes = Theme::all();
        $chapters = Chapter::all();
        return view('storeTheme',[
        'themes'=> $themes,
        'chapters'=> $chapters,
        ]);
    }

        //создание тем
        public function create_theme(Request $request){

            $theme = Theme::create([
                "chapter_id"=> $request->chapter_id,
                "name" => $request->name,
                "type_of_activity" => $request->type_of_activity,
                "content" => $request->content,
                "document" => $request->document,
            ]);
            return back()->with("success","Вы успешно добавили тему");
        }

        //редактирование тем
        public function update(Request $request): RedirectResponse
        {
            $theme = Theme::find($request->id);
            $theme->name = $request->name;
            $theme->content = $request->content;
            $theme->type_work = $request->type_work;
            $theme->save();
        }

        //удаление тем
        public function destroy(String $id): RedirectResponse
        {
        $theme = Theme::find($id);
        $theme = $theme -> delete();
        return back()->with("success","Вы успешно удалили тему");
       }
}
