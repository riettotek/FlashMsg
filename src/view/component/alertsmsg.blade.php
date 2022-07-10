
@if (count($msgs = FlashMsg::messages()))
<div class=" top-0 left-0 right-0 sticky">
@foreach ($msgs as $alert)

  <div class="{{ $alert['bg'] }} max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between flex-wrap">
      <div class="w-0 flex-1 flex items-center">
        <span class="flex p-2 rounded-lg bg-indigo-800">
          @switch($alert['level'])
            @case('success')
            <i class="fa-solid fa-thumbs-up"></i>
              @break
              @case('warning')
              <i class="fa-solid fa-diamond-exclamation"></i>
                @break
                @case('info')
              <i class="fa-solid fa-circle-info"></i>
              @break
              @case('danger')
              <i class="fa-solid fa-triangle-exclamation"></i>
              @break
            @default
            <i class="fa-solid fa-circle-exclamation"></i>
          @endswitch
        </span>
        <p class="ml-3 font-medium text-white truncate">
          <span class="md:hidden"> {{ $alert['message'] }}</span>
          <span class="hidden md:inline">{{ $alert['mobile'] }}</span>
        </p>
      </div>

      <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
        <button type="button"
          class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
          <span class="sr-only">Chiudi</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endif