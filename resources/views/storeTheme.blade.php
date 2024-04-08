<x-app-layout>
    @if(Auth::user()->role == 'teacher')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Темы') }}
        </h2>
    </x-slot>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center">
                Создайте новую тему
            </h3>
     <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
           
    <form action="{{route('themes.create')}}" class="p-4 md:p-5">
        <div class="grid gap-4 mb-4 grid-cols-2">
          <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название темы</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Название..." required="">
        </div>
        <div class="col-span-2">
          <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Описание</label>
          <input type="text" name="content" id="content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Описание..." required="">
      </div>
      <div class="col-span-2">
        <label for="type_of_activity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Тип работы</label>
        <input type="text" name="type_of_activity" id="type_of_activity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Теория..." required="">
    </div>
    <div class="col-span-2">
      <label for="document" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Документ</label>
      <input type="text" name="document" id="document" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Документ..." required="">
  </div>
  <div class="col-span-2">
    <label for="chapter_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">К какому разделу?</label>
    <select name="chapter_id">
      @foreach($chapters as $chapter)
        <option value="{{$chapter->id}}">
          {{$chapter->name}}
        </option>
      @endforeach
    </select>
</div>
        </div>
        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Добавить тему
        </button>
        
    </form>
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
                      <th scope="col" class="px-3 py-2 text-start text-xs font-medium text-gray-500 uppercase">Название темы</th>
                      <th scope="col" class="px-3 py-2 text-start text-xs font-medium text-gray-500 uppercase">Раздел</th>
                      <th scope="col" class="px-3 py-2 text-start text-xs font-medium text-gray-500 uppercase">Тип работы</th>
                      <th scope="col" class="px-3 py-2 text-start text-xs font-medium text-gray-500 uppercase">Описание</th>
                      <th scope="col" class="px-3 py-2 text-start text-xs font-medium text-gray-500 uppercase">Документ</th>
                    </tr>
                  </thead>
                  <div class="content">
                  <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($themes as $theme)
                    <tr>
                        <form action="{{route('themes.update')}}">
                          <td class="py-3 ps-4">
                          </td>
                      <input type="text" name="id" value="{{$theme->id}}" hidden>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$theme->name}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$chapter->name}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$theme->type_work}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$theme->content}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$theme->document}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        <a href="{{ route('themes.destroy', $theme->id) }}" class="btn btn-danger">Удалить</a>
                    </td>
                        </form>
                    </tr>
                    @endforeach
                      </td>
                    </tr>
                  </tbody>
                  </div>
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
    
</x-app-layout>
