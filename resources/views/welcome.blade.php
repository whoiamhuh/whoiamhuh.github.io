<x-guest-layout>
    <!-- Main Hero Content -->
    <div
      class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
      style="background-image: url('https://images.wallpaperscraft.ru/image/single/restoran_stoliki_interer_206807_1920x1080.jpg')">
      <h1
        class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-green-600 md:text-center sm:leading-none lg:text-5xl">
        <span class="inline md:block">Добро пожаловать в БыстроЕм</span>
      </h1>
      <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
        Рады приветствовать вас на сайте для бронирования столов в сети ресторанов БыстроЕм!
      </div>
      <div class="flex flex-col items-center mt-12 text-center">
        <span class="relative inline-flex w-full md:w-auto">
          <a href="{{ route('reservations.step.one')}}" type="button"
            class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-500 focus:outline-none">
            Забронировать стол
          </a>
      </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-32 bg-white md:px-0">
      <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
        <div class="flex flex-wrap items-center sm:-mx-3">
          <div class="w-full md:w-1/2 md:px-3">
            <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
              <!-- <h1
              class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
            > -->
              <h3 class="text-xl">О сети ресторанов БыстроЕм
              </h3>

              <!-- </h1> -->
              <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
              БыстроЕм - это молодая и динамично развивающаяся сеть ресторанов быстрого питания. Все наши рестораны оснащены современным оборудованием, просторными залами и быстрыми кассами, что позволяет быстро обслуживать большое количество посетителей. Наша миссия - предоставлять высококачественное и вкусное питание по доступной цене, делая ваше посещение наших ресторанов приятным и комфортным. 
              </p>
              <div class="relative flex">
                <a href="{{ route('restaurants.index')}}"
                  class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-green-600 rounded-md sm:mb-0 hover:bg-green-700 sm:w-auto">
                  Посмотреть рестораны
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/2">
            <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
              <img src="https://i.pinimg.com/564x/fc/05/85/fc05852f8aac321f666aea8f5a90259a.jpg" />
            </div>
          </div>
        </div>
      </div>
    </section>

    
</x-guest-layout>