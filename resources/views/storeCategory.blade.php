<x-app-layout>
    @if(Auth::user()->role == 'teacher')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Категории') }}
        </h2>
    </x-slot>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center">
                Создайте новую категорию
            </h3>
     <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
           
    <form action="{{route('categories.create')}}" class="p-4 md:p-5">
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название категории</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Категория..." required="">
            </div>
        </div>
        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Добавить категорию
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
                      <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Название категории</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($categories as $category)
                    <tr>
                        <form action="{{route('categories.update')}}">
                          <input type="text" name="id" value="{{$category->id}}" hidden>
                      <td class="py-3 ps-4">
                      </td>
                      <input type="text" name="id" value="{{$category->id}}" hidden>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$category->name}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        {{-- <a href="{{ route('categories.update', $category->id) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Редактировать</button> --}}
                        <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger">Удалить</a>
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
    
</x-app-layout>
