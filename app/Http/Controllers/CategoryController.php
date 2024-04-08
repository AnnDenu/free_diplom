<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
  //Вывод категорий у преподавателя
        public function storeCategory():View {
        $categories = Category::all();
        return view('storeCategory',[
        'categories'=> $categories
        ]);
    }
//Добавление категорий
    public function create_category(Request $request){

        $category = Category::create([
            "name"=> $request->name,
        ]);
        return back()->with("success","Вы успешно добавили категорию");
    }

//обновление категории
public function update(Request $request): RedirectResponse
{
    $id = $request->id;
    $category = Category::find($id);
 return back()->with("success","Вы успешно обновили категорию");
}


//Удаление категории
    public function destroy(String $id): RedirectResponse{
        $category = Category::find($id);
        $category = $category -> delete();
        return back()->with("success","Вы успешно удалили категорию");
    }
}
