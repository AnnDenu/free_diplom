<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Переход в личный кабинет
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
	//Просмотр курсов на которые записались
	Route::get('/student/checkout', [StudentController::class, 'checkoutCourse'])->name('course.checkout');
    Route::get('/student/course/{id}', [StudentController::class, 'addCoursetoCart'])->name('addCourse.to.cart');
    Route::delete('/student/delete-cart-course', [StudentController::class, 'deleteCourse'])->name('delete.cart.course');

    //Управление курсами
    Route::get('/courses', [CourseController::class, 'storeCourse'])
        ->name('courses');
    //обновление курсов
    Route::get('/courses/update', [CourseController::class, 'update'])
        ->name('courses.update');
    //создание курсов
    Route::get('/courses/create', [CourseController::class, 'create'])
        ->name('courses.create');
    //удаление курсов
    Route::get('/courses/delete/{id}', [CourseController::class, 'destroy'])
        ->name('courses.destroy');

    //Управление категориями

    Route::get('/categories', [CategoryController::class, 'storeCategory'])
    ->name('categories');
    //обновление курсов
    Route::get('/categories/update', [CategoryController::class, 'update'])
    ->name('categories.update');
    //создание курсов
    Route::get('/categories/create', [CategoryController::class, 'create_category'])
    ->name('categories.create');
    //удаление курсов
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');

    //Управление разделами

    Route::get('/chapters', [ChapterController::class, 'storeChapter'])
    ->name('chapters');
    //создание разделов
    Route::get('/chapters/create', [ChapterController::class, 'create_chapter'])
    ->name('chapters.create');
    //обновление разделов
    Route::get('/chapters/update', [ChapterController::class, 'update_chapter'])
    ->name('chapters.update');
    //удаление разделов
    Route::get('/chapters/delete/{id}', [ChapterController::class, 'destroy_chapter'])
    ->name('destroy_chapter');

    //Управление темами

    Route::get('/themes', [ThemeController::class, 'storeTheme'])
    ->name('themes');
    //Создание темы
Route::get('/themes/create', [ThemeController::class, 'create_theme'])
    ->name('themes.create');
    //Обновление темы
    Route::get('/themes/update', [ThemeController::class, 'update'])
        ->name('themes.update');
    //Удаление темы
    Route::get('/themes/delete/{id}', [ThemeController::class, 'destroy'])
    ->name('themes.destroy');


//Управление заданиями
Route::get('/works', [WorkController::class, 'getWork'])->name('works');
Route::post('/works', [WorkController::class, 'create'])->name('create.works');
Route::get('/works/update', [WorkController::class, 'update'])->name('works.update');
Route::get('/works/delete/{id}', [WorkController::class, 'destroy'])->name('works.destroy');

    });

//Вывод всех курсов у user
Route::get('course', [CourseController::class, 'courseShow'])->name('course.show');
Route::get('course/{category}', [CourseController::class, 'courseShow'])->name('course.category');
//Подробности курса (карточка)
Route::get('/show/{id}', [CartController::class, 'cart'])->name('cart');



//Поиск(доделать)
Route::get('/course/search',[CourseController::class, 'search'])->name('courses.search');

require __DIR__.'/auth.php';
