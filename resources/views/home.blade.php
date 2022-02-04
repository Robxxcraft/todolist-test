@extends('main')
@section('title')
    Home
@endsection

@section('content')
<div class="relative min-h-screen md:flex">
    <div class="basis-1/4 md:block flex flex-col justify-between bg-zinc-100 font-semibold space-y-6 pt-12 pl-2 pr-4 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-300 ease">
        <div class="mx-4 space-y-3">
            <a href="/list/add">
                <div class="tracking-wide text-center bg-blue-500 rounded-sm shadow-sm">
                    <div class="text-white font-bold px-4 py-2 hover:bg-blue-600 rounded hover:text-white transition duration-200">
                  Create
                </div>
                </div>
            </a>
            <a href="/">
                <div class="mt-12 tracking-wide rounded-sm">
                    <div class="text-gray-500 font-bold px-4 py-2 rounded hover:text-gray-700 transition duration-200">
                        <svg class="mr-2 inline" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" /><path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" /></svg>
                        Home
                </div>
                </div>
            </a>
            </div>
    </div>
    <div class="basis-full bg-gray-50">
        <div class="p-8 tracking-wide">
            <div>
                <div class="text-gray-600 text-2xl font-bold">To Do List</div>
                <div class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae reiciendis quas dolor quaerat similique, quam corrupti tempora eaque nulla vero.</div>
            </div>

            <div class="flex justify-between gap-4 mt-12">
                <div class="flex items-center shadow-md px-2 py-1 w-full rounded-sm justify-between bg-gray-200 text-gray-600">
                    <span>Waiting</span>
                    <div class="bg-gray-800 text-white rounded-sm py-1 px-2">{{$waiting}}</div>
                </div>
                <div class="flex items-center shadow-md px-2 py-1 w-full rounded-sm justify-between bg-gray-200 text-gray-600">
                    <span>On Process</span>
                    <div class="bg-gray-800 text-white rounded-sm py-1 px-2">{{$onprocess}}</div>
                </div>
                <div class="flex items-center shadow-md px-2 py-1 w-full rounded-sm justify-between bg-gray-200 text-gray-600">
                    <span>Done</span>
                    <div class="bg-gray-800 text-white rounded-sm py-1 px-2">{{$done}}</div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-8">
                @foreach ($lists as $list)
                <div class="bg-gray-200 text-gray-600 p-2 shadow-md">
                    <div class="flex justify-between">
                        @auth
                            <a href="/list/{{$list->id}}" class="text-blue-400 hover:text-blue-500">{{$list->title}}</a>
                        @endauth
                        @guest
                            <div class="text-gray-600">{{$list->title}}</div>
                        @endguest
                        @if ($list->status == 'waiting')
                        <div class="bg-blue-500 shadow-sm font-bold tracking-wide text-white px-2 py-1 rounded-sm">{{ucwords($list->status)}}</div>
                        @endif
                        @if ($list->status == 'on-process')
                        <div class="bg-orange-500 shadow-sm font-bold tracking-wide text-white px-2 py-1 rounded-sm">{{ucwords($list->status)}}</div>
                        @endif
                        @if ($list->status == 'done')
                        <div class="bg-green-500 shadow-sm font-bold tracking-wide text-white px-2 py-1 rounded-sm">{{ucwords($list->status)}}</div>
                        @endif
                    </div>
                    <div class="text-gray-400 mb-2 mt-4">{{$list->detail ? $list->detail : 'No detail'}}</div>
                    <div class="flex justify-between">
                        @if ($list->status == 'waiting')
                            <a href="/list/{{$list->id}}/onprocess" class="bg-orange-500 text-sm text-white px-2 py-1 rounded-sm">Mark On Process</a>
                        @endif
                        @if ($list->status == 'on-process')
                            <a href="/list/{{$list->id}}/done" class="bg-green-500 text-sm text-white px-2 py-1 rounded-sm">Mark as Done</a>
                        @endif
                        @auth
                            <a href="/list/{{$list->id}}/delete" class="bg-red-500 shadow-sm text-sm text-white px-2 py-1 rounded-sm">Delete</a>
                        @endauth
                    </div>
                </div>    
                @endforeach
            </div>
        </div>
    </div>

    <div class="basis-1/4 bg-gray-50 border-l">
        <div class="p-8 tracking-wide">
            <div class="flex items-center">
                <div class="text-gray-600 text-lg font-bold mr-2">Active</div>
                <div class="text-blue-500">(25)</div>
            </div>
            <div class="flex gap-1 mt-1">
                <div class="rounded-full bg-gray-300 w-8 h-8"></div>
                <div class="rounded-full bg-gray-300 w-8 h-8"></div>
                <div class="rounded-full bg-gray-300 w-8 h-8"></div>
                <div class="rounded-full bg-gray-300 w-8 h-8"></div>
            </div>
            @guest
            <div class="tracking-wider mt-8">
                <a href="/login">
                    <div class="bg-blue-500 shadow-sm py-2 px-4 rounded-sm text-center px-4">
                        <div class="text-white text-lg font-bold">Login</div>
                    </div>
                </a>
            </div>
            <div class="tracking-wider mt-4">
                <a href="/register">
                    <div class="bg-blue-500 shadow-sm py-2 px-4 rounded-sm text-center px-4">
                        <div class="text-white text-lg font-bold">Register</div>
                    </div>
                </a>
            </div>
            @endguest
            @auth
            <div class="tracking-wide mt-8">
                <div class="flex items-center text-gray-600 mb-1">
                    <div class="w-8 h-8 bg-gray-100 rounded-full mr-2 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg>
                    </div>
                    <div class="text-sm">{{Auth::user()->username}}</div>
                </div>
                <div class="mb-4 text-gray-400 truncate">{{Auth::user()->email}}</div>
                <a href="/logout" class="flex justify-end text-red-600 font-bold">Logout</a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection