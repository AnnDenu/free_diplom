<x-app-layout>
    <div class="overflow-hidden bg-dark:blue-400 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-1">
            <div class="lg:pr-8 lg:pt-4">
              <div class="lg:max-w-lg">
            <h2 class="font-semibold leading-7 text-indigo-600 text-3xl my-4 ">{{$course->name}}</h2>
            <p class="text-lg clear-none   dark:text-gray-400">{{ $course->teacher_id }}</p>
                    <div class="flex">
                    <div class=" mt-4 flex-auto w-64" data-aos="fade-up">
                        <p class="text-lg clear-none   dark:text-gray-400">{{ $course->description }}</p>
                    </div>
                    </div>
                    <p class="text-sm text-gray-900 dark:text-white my-3"><a class="text-sm font-black text-gray-900 dark:text-white">Длительность</a>: 12 месяцев</p>
                    </div>
                    <p class="text-4xl text-gray-900 dark:text-gray-600 my-8"> Программа обучения </p>
                    @foreach($themes as $theme)   
                    <h2 class="mb-2 text-xl font-semibold text-gray-900 dark:text-gray-600">{{ $theme->chapters }}</h2>
                    <p class="text-sm clear-none dark:text-gray-400">{{ $theme->chapters_content }}</p>
                    <ul class=" my-4 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                    <li> {{ $theme->content}} - {{ $theme->type_of_activity}} </li>
                    <li><a> {{ $theme->document}}<a></li>
                </ul>
                @endforeach
                </div>
            </div>
            <a href="{{ route('addCourse.to.cart', $course->id)}}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Начать обучение</a>
        </div>

    </x-app-layout>
