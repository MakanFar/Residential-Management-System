<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Portal') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                 
  
                  <form method="POST" action="{{ route('dashboard.payment') }}">
                      @csrf
                      @if(session()->get('message'))
                      <div class="alert alert-success" role="alert">
                          <strong>Success: </strong>{{session()->get('message')}}
                      </div>
                      @endif
                      <div class="grid grid-cols-2 gap-6">
                          <div class="grid grid-rows-2 gap-6">
                              <div>
                                  <x-label for="name" :value="__('Name')" />
                                  <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}" autofocus />
                              </div>
                              <div>
                                  <x-label for="IBAN" :value="__('IBAN')" />
                                  <x-input id="IBAN" class="block mt-1 w-full" type="IBAN" name="IBAN" value="Ex: TR1938901239" autofocus />
                              </div>
                          </div>
                          <div class="grid grid-rows-2 gap-6">
                              <div>
                                <x-label for="IBAN" :value="__('Date')" />
                                <x-input id="IBAN" class="block mt-1 w-full" type="Date" name="Date" value="Ex: 12/2023" autofocus />
                              </div>
                              <div>
                                <x-label for="CSV" :value="__('CSV')" />
                                <x-input id="CSV" class="block mt-1 w-full" type="CSV" name="CSV" value="***" autofocus />
                              </div>
                          </div>
                      </div>
                      <div class="flex items-center justify-end mt-4">
                          <x-button class="ml-3">
                              {{ __('PAY') }}
                          </x-button>
                      </div>
                  </form>
  
                  
                  
                  
              </div>
          </div>
      </div>
  </div>
     
    
    </div>
  </x-app-layout>