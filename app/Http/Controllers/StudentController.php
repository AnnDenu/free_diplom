<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Переход в личный кабинет
    public function index()
    {
        return view('lk_S');
    }
    //Просмотр добавленных курсов в личном кабинете
    public function checkoutCourse() {
        $courses = Course::all();
        
        return view('courseCheckout', [
            'courses' => $courses,
        ]);
    }
    //Добавление курса в обучение в ЛК 
    public function addCoursetoCart(Request $request ,$id)
    {
      
        $courses = Course::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            if($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
            }
        } else {
            $cart[$id] = [
                "name" => $courses->name,
                "description" => $courses->description,
                "quantity" => 1,
                
            ];
        }
        session()->put('cart', $cart);
        // берем препода курса и создаем чат между ним и студентом
        // dd(Course::find(["id"=>$id]));
        // dd($courses->users);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }
  //Удаление из обучения
    public function deleteCourse(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
        }
    }
}
