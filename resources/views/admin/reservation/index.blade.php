<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Новое бронирование</a>
            </div>
        <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
                                              <th scope="col" 
                                          class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                           Имя
                                              </th>
                                              <th scope="col" 
                                         class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                          Email
                                               </th>
                                              <th scope="col" 
                                          class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                           Дата бронирования
                                              </th>
                                             
                                              <th scope="col" 
                                          class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                           Стол
                                              </th>
                                              <th scope="col" 
                                          class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                           Количество гостей
                                              </th>
                                               <th scope="col" 
                                         class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                               </th>
                                         </tr>
        </thead>
        <tbody>
           @foreach ($reservations as $reservation)
           <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                              <td
                                                  class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                  {{ $reservation->first_name }} {{$reservation->last_name}}
                
                                             </td>
                                             <td
                                                  class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                  {{ $reservation->email }}
                                              </td>
                                              <td
                                                  class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                  {{ $reservation->res_date}}
                                              </td>
                                             
                                              <td
                                                  class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                  {{ $reservation->table->name}}
                                              </td>
                                              <td
                                                  class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                  {{ $reservation->guest_number}}
                                              </td>
                                        


                                              <td
                                                 class=" py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                 <div class="flex space-x-2">
                                                     <a href="{{ route('admin.reservations.edit', $reservation->id) }}" 
                                                     class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Редактировать</a>
                    
                                                  <form 
                                                      class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" 
                                                       method="POST"
                                                      action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                                     onsubmit="return confirm('Вы уверены?');">
                                                     @csrf
                                                     @method('DELETE')
                                                    <button type="submit">Удалить</button>
                                                 </form>
                                                 </div>
                                              </td>
                                          </tr>
           @endforeach
        </tbody>
    </table>
</div>
        </div>
    </div>
</x-admin-layout>