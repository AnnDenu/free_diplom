<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    //реализация поиска и показ всех курсов
    public function courseShow($categoryId=0){
        if (request('search')) {
            $courses = Course::where('name', 'like', '%' . request('search') . '%')->get();
        } else {
        $courses = Course::with('category');        
        }
//распределние курсов по категориям с помощью id
         if($categoryId){
            $courses->where('category_id', $categoryId);
        }

        if(request('search')){
            $categories = Category::where('name','like','%' . request('search') . '%')->get();
        } else {
            $categories = Category::all();
        }
       
        return view('course', [
            'courses' => $courses->get(),
            'categories'=> $categories
        ]);
   
    }
        //Вывод курсов у преподавателя
        public function storeCourse($categoryId = 0) {
        $courses = Course::all();
        $categories = Category::all();

        if($categoryId){
            $courses->where('category_id', $categoryId);
        }

        return view('storeCourse',[
        'courses'=>$courses,
        'categories'=> $categories
        ]);
        }
        
        //Добавление курса в систему

        public function create(Request $request)
        {
            $create = Course::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
            ]);
            return back()->with("success","Вы успешно добавили курс");      
        }

        //Изменение курса

        public function update(Request $request){
            

            $update = Course::findOrFail($request->id);
            $update->name = $request->name;
            $update->description = $request->description;
            $update->category_id = $request->category_id;
            $update->save();
            
            return back()->with("success","Success");

            }

        //Удаление курсов

        public function destroy(Request $request, string $id): RedirectResponse
        {
            $delete = Course::find($id);
            $delete->delete();
            return back();
        }
}

