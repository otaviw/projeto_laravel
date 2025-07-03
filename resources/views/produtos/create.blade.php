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
                          action="{{ route('produtos.store') }}"
                          enctype="multipart/form-data"
                          class="w-full max-w-md flex flex-col gap-6">
                        @csrf

                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome"
                                :value="old('nome')" required autofocus autocomplete="nome" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="preco" :value="__('Preco')" />
                            <x-text-input id="preco" class="block mt-1 w-full" type="number" name="preco"
                                :value="old('preco')" required autofocus autocomplete="preco" />
                            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="descricao" :value="__('Descricao')" />
                            <x-textarea id="descricao" class="block mt-1 w-full" name="descricao" required autofocus autocomplete="descricao">{{ old('descricao') }}</x-textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>
                        <div>
                            <select name="categorias_id" id="categoria">
                                @foreach ( $categorias as $categoria )
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="image" :value="__('Imagem')" />
                            <input type="file" name="image" id="image" accept="image/*" class="block mt-1 w-full text-sm text-gray-500 dark:text-gray-300" />
                        </div>

                        <x-primary-button class="self-end">
                            Gravar produto
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>