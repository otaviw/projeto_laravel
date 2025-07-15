<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos &raquo; Criar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <form method="POST"
                          action="{{ route('blog.salvar') }}"
                          enctype="multipart/form-data"
                          class="w-full max-w-md flex flex-col gap-6">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="content" :value="__('Content')" />
                            <x-textarea id="content" class="block mt-1 w-full" name="content" required autofocus autocomplete="content">{{ old('content') }}</x-textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <div>
                            <select name="category_id" id="category" class="block mt-1 w-full">
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <x-primary-button class="self-end">
                            Gravar post
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>