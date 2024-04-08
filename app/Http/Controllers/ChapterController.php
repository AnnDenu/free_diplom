<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

class ChapterController extends Controller
{
    //Отображение разделов курса
    public function storeChapter():View {
        $chapters = Chapter::all();
        return view('storeChapter',[
        'chapters'=> $chapters
        ]);
    }
//Добавление разделов

    public function create_chapter(Request $request): RedirectResponse{
        
        $chapters = Chapter::create([
            "name"=> $request->name,
            "content"=> $request->content,
            "course_id"=> $request->course_id,
        ]);
        return back()->with("success","Вы успешно добавили раздел");
    }
//Редактирование разделов

    public function update_chapter(Request $request){
        $chapter = Chapter::find($request->id);
        $chapter->name = $request->name;
        $chapter->content = $request->content;
        $chapter->course_id = $request->course_id;
        $chapter->save();
      
        return back()->with("success","Вы успешно обновили раздел");
    }

//Удаление раздела

public function destroy(String $chapter_id): RedirectResponse{
    $chapter = Chapter::findOrFail($chapter_id);
    $chapter->delete();
    return back()->with("success","Cool");
}
}
