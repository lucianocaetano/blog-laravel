@extends('layouts.app')
@section("title", "Register")

@section("content")
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('auth.register') }}" method="POST">
                @csrf

                <x-forms.input label="Email:" name="email" type="email" placeholder="youremail@gmail.com" :required="true"/>
                <x-forms.input label="Name:" name="name" type="text" placeholder="you name" :required="true"/>
                <x-forms.input label="Last Name:" name="last_name" type="text" placeholder="you last name" :required="true"/>
                <x-forms.input label="Password:" name="password" type="password" placeholder="my_secret_password_123" :required="true"/>
                <x-forms.input label="Password Confirm:" name="password_confirm" type="password" placeholder="my_secret_password_123" :required="true"/>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                You have an account?
                <a href="{{route('views.login')}}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign in</a>
            </p>
        </div>
    </div>
@endsection
