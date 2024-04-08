<?php

namespace App\Http\Controllers;
use App\Models\Work;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
class WorkController extends Controller
{

    public function show(){
        return view("works");
    }

//Загрузка задания
public function create(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
    ]);

    $fileName = time().'_'.$request->file->getClientOriginalName();  
    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
    $file_path = '/storage'.$filePath;
    $user_id = auth()->user()->id;
    $fileModel = Work::create([
        'file'=> $file_path,
        'user_id' => $user_id,
        'theme_id'=>$request->theme_id,
        'content'=>$request->content
    ]);

    return back()
    ->with('success','You have successfully file uplaod.')
    ->with('file',$fileName); 
}
    public function getWork(Theme $themes)
    {
        $themes = Theme::all(); 
        //Происходит объединение таблицы "works" с таблицами "users" и "themes" по id пользователей и id тем соответственно.
        $works = Work::join('users', 'works.user_id','=','user_id')
        ->join('themes','works.theme_id', '=', 'theme_id')
        //Выбираются (*) все поля из таблицы "works", а также дополнительные поля с переименованием для имени пользователя ("users.name") и имени темы ("themes.name").
        ->select('works.*', 'users.name as users', 'themes.name as themes')
        //Результаты запроса сохраняются в переменную "$works"
        ->get();

        //Функция возвращает представление "work"
        return view('work',['works'=>$works,'themes'=>$themes]);
    }
    public function destroy(String $id): RedirectResponse
        {
        $work = Work::find($id);
        $work = $work -> delete();
        return back();
       }

}