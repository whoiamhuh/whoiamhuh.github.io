<x-admin-lay<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.restaurants.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Создать ресторан</a>
            </div>
                     <div class="m-2 p-2 bg-slate-100 rounded">
                       <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                           <form method="POST" action="{{ route('admin.restaurants.update', $restaurant->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                              <div class="sm:col-span-6">
                                  <label for="name" class="block text-sm font-medium text-gray-700"> Название </label>
                                     <div class="mt-1">
                                          <input type="text" id="name" name="name" value="{{ $restaurant->name }}"
                                          class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>
                      @error('name')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                         </div>
              
                <div class="sm:col-span-6 pt-5">
                  <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                   <div class="mt-1">
                    <textarea id="description" rows="3" name="description"
                     class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                     {{$restaurant->description}}
                    </textarea>
                     
                   </div>
                   @error('description')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                      </div>
                      <div class="sm:col-span-6">
                  <label for="image" class="block text-sm font-medium text-gray-700"> Изображение </label>
                  <div>
                    <img class="w-32 h-32" src="{{ Storage::url($restaurant->image) }}">
                  </div>
                     <div class="mt-1">
                          <input type="file" id="image" name="image" 
                          class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>
                      @error('image')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
               </div>
                      <div class="mt-6 p-4">
                      <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Сохранить</button>
                      </div>
                   </form>
                 </div>
             </div>
        </div>
    </div>
</x-admin-layout>