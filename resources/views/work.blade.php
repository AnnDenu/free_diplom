<x-app-layout>
    @section('content')
    @if(Auth::user()->role == 'teacher')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Задания') }}
        </h2>
    </x-slot>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
     <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
              <div class="py-3 px-4">
              </div>
              <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                  <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                    <th scope="col" class="py-3 px-4 pe-0">
                        
                      </th>
                      <th class="border border-slate-300 p-5">Пользователь</th>
                      <th class="border border-slate-300 p-5">На тему</th>
                      <th class="border border-slate-300 p-5">Файл(Ссылка на документ)</th>
                      <th class="border border-slate-300 p-5">Описание</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($works as $work)
                    <tr>
                        <form action="{{route('works.update')}}">
                      <input type="text" name="id" value="{{$work->id}}" hidden>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$work->users}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$work->content}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$work->themes}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        <a href="{{ route('works.destroy', $work->id) }}" class="btn btn-danger">Удалить</a>
                    </td>
                        </form>
                    </tr>
                    @endforeach
                      </td>
                    </tr>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>    
              <a href="{{route('dashboard')}}"  :active="request()->routeIs('dashboard')" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">Вернуться назад</a>
      </div>   
    </div>
    </div>      
    </div>
    </div> 
    @endif

    @if(Auth::user()->role == 'user')
<!--Отправка задания со стороны пользователя-->
<h1 class="text-center text-2xl">Задания</h1>
<div class="space-y-12">

    <form action="{{route('create.works')}}" method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-4 mb-4 grid-cols-2">
          <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Название..." required="">
        </div>
        <div class="col-span-2">
          <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Описание</label>
          <input type="text" name="content" id="content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Описание..." required="">
      </div>
    <div class="col-span-2">
      <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Документ</label>
      <input type="file" name="file" class="form-control">
  </div>
  <div class="col-span-2">
    <label for="theme_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">К какой теме?</label>
    <select name="theme_id" id="">
        @foreach($themes as $theme)
            <option value="{{$theme->id}}">{{$theme->name}}</option>
        @endforeach
    </select>
   
</div>
        </div>
        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Загрузить
        </button>
        
    </form>

</div>
@foreach($works as $work)  
<div class="flex flex-row mb-5">

        <div class=" basis-2/4 lg:p-5 shadow-xl">
            <p class="italic hover:not-italic">{{$work->content}}</p>
            <p class="italic hover:not-italic">{{$work->file}}</p>
        </div>
</div>
    @endforeach
@endif
</x-app-layout>
