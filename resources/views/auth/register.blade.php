<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ isset($user) ? route('update.user') : route('inscription') }}">
            @csrf
            @if(isset($user))
                <input type="hidden" name="id_user" value="{{$user->id}}">
            @endif

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <input id="name" class="block mt-1 w-full" type="text" name="name"  
                    @if(isset($user))
                        value="{{$user->name}}"
                    @else
                        value="{{old('name')}}"
                    @endif
                />
            </div>
            <!-- Prenom -->
            <div>
                <x-label for="prenom" :value="__('Prenom')" />

                <input id="prenom" class="block mt-1 w-full" type="text" name="prenom"  required autofocus
                @if(isset($user))
                    value="{{$user->prenom}}"
                @else
                    value="{{old('prenom')}}"
                @endif
                />
            </div>
             <!-- Adresse -->
             <div>
                <x-label for="adresse" :value="__('Adresse')" />

                <input id="adresse" class="block mt-1 w-full" type="text" name="adresse" required autofocus
                @if(isset($user))
                    value="{{$user->adresse}}"
                @else
                    value="{{old('adresse')}}"
                @endif
                />
            </div>
             <!-- Telephone -->
             <div>
                <x-label for="telephone" :value="__('Telephone')" />

                <input id="telephone" class="block mt-1 w-full" type="text" name="telephone"  required autofocus
                @if(isset($user))
                    value="{{$user->telephone}}"
                @else
                    value="{{old('telephone')}}"
                @endif
                />
            </div>
             <!-- Cin -->
             <div>
                <x-label for="cin" :value="__('Cin')" />

                <input id="cin" class="block mt-1 w-full" type="text" name="cin"  required autofocus
                @if(isset($user))
                    value="{{$user->cin}}"
                @else
                    value="{{old('cin')}}"
                @endif
                />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                @if(isset($user))
                    value="{{$user->email}}"
                @else
                    value="{{old('email')}}"
                @endif                
                />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                {{ isset($user) ? '' : 'required' }}  autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" {{ isset($user) ? '' : 'required' }} />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ isset($user) ? __('Mettre à jour') : __('Enregistrer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
