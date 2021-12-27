<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                 
  
                  <form method="POST" action="{{ route('dashboard.editbill') }}">
                      @csrf
                      @if(session()->get('message'))
                      <div class="alert alert-success" role="alert">
                          <strong>Success: </strong>{{session()->get('message')}}
                      </div>
                      @endif
                      <div class="grid grid-cols-2 gap-6">
                        <div class="grid grid-rows-2 gap-6">
                            <div>
                                <x-label for="date" :value="__('Date')" />
                                <x-input id="date" class="block mt-1 w-full" type="date" name="date" value="{{ $bill->date }}" autofocus />
                            </div>
                            <div>
                                <x-label for="due" :value="__('Due')" />
                                <x-input id="due" class="block mt-1 w-full" type="date" name="due" value="{{ $bill->due }}" autofocus />
                            </div>
                          
                        </div>
                        <div class="grid grid-rows-2 gap-6">
                          <div>
                              <x-label for="total" :value="__('Total')" />
                              <x-input id="total" class="block mt-1 w-full" type="number" name="total" value="{{ $bill->total }}" autofocus />
                            </div>
                            <div>
                              <x-label for="status" :value="__('Status')" />
                              <x-input id="status" class="block mt-1 w-full" type="text" name="status" value="{{ $bill->status }}" autofocus />
                              <x-input id="id" class="block mt-1 w-full" type="hidden" name="id" value="{{ $bill->id }} " autofocus />
                            </div>
                        </div>

                    </div>
                      <div class="flex items-center justify-end mt-4">
                          <x-button class="ml-3">
                              {{ __('Update') }}
                          </x-button>
                      </div>
                  </form>
  
                  
                  
                  
              </div>
          </div>
      </div>
  </div>
     
    
    </div>
  </x-app-layout>