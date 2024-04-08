
<x-app-layout>
    <div class="bg-white ">
        <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
            @foreach ($categories as $category)
        <a href="{{route('course.category', $category->id)}}" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 
        rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900
         dark:focus:ring-blue-800">{{$category->name}}</a>
        @endforeach
        <a href="{{route('course.show')}}" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 
            rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-white-500 dark:bg-gray-900
             dark:focus:ring-blue-800">Назад</a>
    </div>
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <h2 class="text-2xl font-bold tracking-tight text-gray-900">Все программы обучения</h2>
          <div class="h-50 w-196 grid grid-cols-1 gap-4 content-normal">
          <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($courses as $course)
                <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="mt-4 flex justify-between">
                <div>
                <a href="{{ route('cart', $course->id) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$course->name}}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$course->description}}</p>
                <a href="{{ route('cart', $course->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ознакомиться
                </a>
                </div>
                </div>
                </div>
                 @endforeach     
            </div>
          </div>
          </div>
        </div>
    </div>
    </x-app-layout>