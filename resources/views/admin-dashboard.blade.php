<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Assign Roles</h3>

                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    <form action="{{ route('assign.roles') }}" method="POST">
                        @csrf

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Roles</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                @foreach($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <input id="{{ $user->id }}_student" name="role_{{ $user->id }}" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600" value="student" {{ $user->role === 'student' ? 'checked' : '' }}>
                                            <label for="{{ $user->id }}_student" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-200">Student</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="{{ $user->id }}_teacher" name="role_{{ $user->id }}" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600" value="teacher" {{ $user->role === 'teacher' ? 'checked' : '' }}>
                                            <label for="{{ $user->id }}_teacher" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-200">Teacher</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="{{ $user->id }}_admin" name="role_{{ $user->id }}" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600" value="admin" {{ $user->role === 'admin' ? 'checked' : '' }}>
                                            <label for="{{ $user->id }}_admin" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-200">Admin</label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>