<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route ('admin.reservations.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Создать бронирование</a>
            </div>
                     <div class="m-2 p-2 bg-slate-100 rounded">
                       <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                           <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}">
                            @csrf
                            @method('PUT')
                              <div class="sm:col-span-6">
                                  <label for="first_name" class="block text-sm font-medium text-gray-700"> Имя </label>
                                     <div class="mt-1">
                                          <input type="text" id="first_name" name="first_name" value="{{ $reservation->first_name }}"
                                           class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>
                      @error('first_name')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                         </div>
                         <div class="sm:col-span-6">
                                  <label for="last_name" class="block text-sm font-medium text-gray-700"> Фамилия </label>
                                     <div class="mt-1">
                                          <input type="text" id="last_name" name="last_name" value="{{ $reservation->last_name }}"
                                           class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>
                      @error('last_name')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                         </div>
                         <div class="sm:col-span-6">
                                  <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                                     <div class="mt-1">
                                          <input type="email" id="email" name="email" value="{{ $reservation->email }}"
                                           class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>
                      @error('email')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                         </div>
                         <div class="sm:col-span-6">
                                  <label for="tel_number" class="block text-sm font-medium text-gray-700"> Номер телефона </label>
                                     <div class="mt-1">
                                          <input type="text" id="tel_number" name="tel_number" value="{{ $reservation->tel_number }}"
                                           class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>
                      @error('tel_number')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                         </div>
                         <div class="sm:col-span-6">
                                  <label for="res_date" class="block text-sm font-medium text-gray-700"> Дата бронирования </label>
                                     <div class="mt-1">
                                          <input type="datetime-local" id="res_date" name="res_date" value="{{ $reservation->res_date }}"
                                           class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>
                      @error('res_date')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                         </div>
                         
                           <div class="sm:col-span-6 pt-5">
                  <label for="address" class="block text-sm font-medium text-gray-700">Адрес (улица)</label>
                   <div class="mt-1">
                   <select id="text" name="address" class="form-multiselect block w-full mt-1">
                   @foreach (App\Enums\RestaurantsAddress::cases() as $address)
                        <option value="{{ $address->value }}">{{ $address->name }}</option>
                    @endforeach
                   </select>
                   </div>
                   @error('address')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                   </div>
                         
                   
               <div class="sm:col-span-6 pt-5">
                  <label for="table_id" class="block text-sm font-medium text-gray-700">Стол</label>
                   <div class="mt-1">
                   <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1">
                   @foreach ($tables as $table)
                        <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>{{ $table->name }}
                           ({{$table->guest_number}} Гостя) ({{ $table->address}}) </option>
                           
                    @endforeach
                   </select>
                   </div>
                   @error('table_id')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
                   </div>
               <div class="sm:col-span-6">
                  <label for="guest_number" class="block text-sm font-medium text-gray-700"> Количество гостей </label>
                     <div class="mt-1">
                          <input type="text" id="guest_number" name="guest_number" value="{{ $reservation->guest_number }}"
                          class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>
                      @error('guest_number')
                        <div class="text-sm text-red-400">{{$message}}</div>
                      @enderror
               </div>
               
                   </div>
                      </div>
                      <div class="mt-6 p-4">
                      <button type="submit" 
                      class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Сохранить</button>
                      </div>
                   </form>
                 </div>
             </div>
        </div>
    </div>
</x-admin-layout>