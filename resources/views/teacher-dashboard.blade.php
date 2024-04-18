<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('message.teacher_dashboard') }}
        </h2>


    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Tasks</h3>

                    <!-- Form for adding tasks -->
                    <form action="{{ route('task.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200"> {{ __('message.title') }}:</label>
                            <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full text-black" required>
                        </div>
                        <!-- Naziv rada na engleskom -->
                        <div class="mb-4">
                            <label for="title_en" class="block text-sm font-medium text-gray-700 dark:text-gray-200"> {{ __('message.title_en') }}:</label>
                            <input type="text" name="title_en" id="title_en" class="form-input rounded-md shadow-sm mt-1 block w-full text-black" >
                        </div>

                        <div class="mb-4">
                            <label for="task" class="block text-sm font-medium text-gray-700 dark:text-gray-200"> {{ __('message.task') }}:</label>
                            <textarea name="task" id="task" rows="4" class="form-textarea rounded-md shadow-sm mt-1 block w-full text-black" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="study_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200"> {{ __('message.study_type') }}:</label>
                            <select name="study_type" id="study_type" class="form-select rounded-md shadow-sm mt-1 block w-full text-black" required>
                                <option value="stručni"> {{ __('message.strucni_rad') }}</option>
                                <option value="preddiplomski"> {{ __('message.preddiplomski_rad') }}</option>
                                <option value="diplomski"> {{ __('message.diplomski_rad') }}</option>
                            </select>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Add Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>