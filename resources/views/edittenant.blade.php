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
                 
  
                  <form method="POST" action="{{ route('dashboard.edittenant') }}">
                      @csrf
                      @if(session()->get('message'))
                      <div class="alert alert-success" role="alert">
                          <strong>Success: </strong>{{session()->get('message')}}
                      </div>
                      @endif
                      <div class="grid grid-cols-1 gap-6">
                        <div class="grid grid-rows-1 gap-6">
                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" autofocus />
                            </div>
                          
                        </div>
                        <div class="grid grid-rows-1 gap-6">
                              <x-label for="email" :value="__('Email')" />
                              <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" autofocus />
                              <x-input id="id" class="block mt-1 w-full" type="hidden" name="id" value="{{ $user->id }} " autofocus />
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