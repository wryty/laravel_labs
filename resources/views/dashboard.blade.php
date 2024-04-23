@php
    use App\Enums\UserRole;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="container">
                        <h2 style="color: black">Welcome, {{ Auth::user()->name }}</h2>
                        <img src={{ asset('image1.jpg') }} alt="Image" style="width: 100px; height: 100px"> 
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('users.index') }}" class="btn btn-primary" style="color: black">Manage Users</a>
                            <p>{{ config('roles')['ADMIN'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
