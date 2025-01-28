<x-app-layout title="{{ __('Media') }}">

  <div class="content">

    <div class="content-box mb-4">
      <div class="flex flex-row">
          @if(config('settings::app_logo'))
              <img src="{{ asset(config('settings::app_logo')) }}"
                  class="w-16 h-full lg:block hidden rounded-md mr-4" />
          @endif
          <div class="w-full">
              <h1 class="text-3xl font-semibold text-red-500">
                {{ __('Media') }}
              </h1>
              <div class="w-full text-secondary-400">
                  {{ __('Our advertising material') }}
              </div>
          </div>
      </div>
  </div>

    <div class="content-box">
        <div class="mt-6 grid grid-cols-12 gap-4">
          <div class="lg:col-span-6 col-span-12 flex-col">
            <div>
              <textarea
                class="resize-none rounded-md w-full bg-secondary-50 text-gray-400"><a title="mygserv.de" href="https://mygserv.de"><img src="https://media.mygserv.de/banner/banner-468-60-blue-black.png" alt="mygserv.de" /></a></textarea>
            </div>
          </div>
          <div class="lg:col-span-6 col-span-12">
            <div class="flex justify-center items-center">
              <img class="inline-block align-middle mt-0 mb-0 center"
                src="https://media.mygserv.de/banner/banner-468-60-blue-black.png" alt="mygserv.de" />
            </div>
          </div>
          <div class="lg:col-span-6 col-span-12 flex-col">
            <div>
              <textarea
                class="resize-none rounded-md w-full bg-secondary-50 text-gray-400"><a title="mygserv.de" href="https://mygserv.de"><img src="https://media.mygserv.de/banner/banner-468-60-blue-white.png" alt="mygserv.de" /></a></textarea>
            </div>
          </div>
          <div class="lg:col-span-6 col-span-12">
            <div class="flex justify-center items-center">
              <img class="inline-block align-middle mt-0 mb-0 center"
                src="https://media.mygserv.de/banner/banner-468-60-blue-white.png" alt="mygserv.de" />
            </div>
          </div>
          <div class="lg:col-span-6 col-span-12 flex-col">
            <div>
              <textarea
                class="resize-none rounded-md w-full bg-secondary-50 text-gray-400"><a title="mygserv.de" href="https://mygserv.de"><img src="https://media.mygserv.de/banner/banner-88-31-blue-white.png" alt="mygserv.de" /></a></textarea>
            </div>
          </div>
          <div class="lg:col-span-6 col-span-12">
            <div class="flex justify-center items-center">
              <img class="inline-block align-middle mt-0 mb-0 center"
                src="https://media.mygserv.de/banner/banner-88-31-blue-white.png" alt="mygserv.de" />
            </div>
          </div>
        </div>
      </div>

  </div>

</x-app-layout>