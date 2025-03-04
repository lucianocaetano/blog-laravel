@extends("layouts.dashboard")

@section("content")
    <form class="max-w-sm mx-auto mt-[100px]" action="{{ route('dashboard.posts.store') }}" method="post" >
        @csrf

        @if(session("status"))
            <small class="text-green-500">{{status("status")}}</small>
        @endif

        <h1 class="text-3xl font-bold mb-4">Create new post</h1>
        <x-forms.input label="Categorias:" name="categories" type="text" placeholder="categories form you post" :required="true"/>
        @foreach ($errors->get('categories.*') as $messages)
            @foreach ($messages as $message)
                <small class="text-red-500">{{$message}}</small>
            @endforeach
        @endforeach
        <x-forms.input label="Title:" name="title" type="text" placeholder="title form you post" :required="true" />
        <x-forms.input label="Description:" name="description" type="text" placeholder="description form you post" :required="true" />
        <div>
            <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content:</label>
            <div class="mt-2">
                <textarea id="content" placeholder="content form you post" name="content" required class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{old('content')}}</textarea>
            </div>
            @error("content")
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
        <div class="flex items-center justify-between w-full mt-2">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
            <a class="flex cursor-pointer text-blue-500" href="{{route('dashboard.posts.index')}}">atrás</a>
        </div>
    </form>
@endsection
