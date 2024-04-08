<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Theme;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(String $id){
        $course = Course::find($id);
        //функция используется для получения всех тем, связанных с курсом, из базы данных. 
        //Она объединяет таблицы "chapters" и "themes" по полю "id" и выбирает все строки, 
        //где поле "course_id" равно значению переменной $course->id.
        $themes = Theme::join("chapters","chapters.id","=","themes.chapter_id")
                        ->where('chapters.course_id', '=', $course->id)
                        //Затем она выбирает все необходимые поля из таблицы "chapters", 
                         //включая название главы ("name"), содержимое главы ("content") и идентификатор главы ("chapter_id"). 
                        //Полученные данные возвращаются в виде объекта с именем "themes".
                        ->select('themes.*', 'chapters.name as chapters', 'chapters.content as chapters_content')
                        
                        ->get();
        return view('/show', [
            'course' => $course,
            'themes'=>$themes,
        ]);
    }

    public function upload(Request $request)
    {
        $image = $request->file('document');
        $path = '/path/to/save/image';

        if ($image && is_file($image->getPath())) {
            saveImage($image, $path);
        }

        return response()->json(['message' => 'File uploaded successfully']);
    }

}
