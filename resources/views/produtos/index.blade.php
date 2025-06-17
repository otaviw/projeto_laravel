<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{ route('produtos.create') }}">
                        + Produto
                    </x-link-button>
                </div>
            </div>
 
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($produtos as $produto)
                    <div class="bg-white dark:bg-gray-700 p-4 rounded shadow">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $produto->nome }}</h3>
                        <p class="text-gray-700 dark:text-gray-300">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $produto->descricao }}</p>

                        @if ($produto->image)
                            <img src="{{ asset('storage/' . $produto->image) }}" alt="Imagem do Produto" class="w-full h-48 object-cover rounded">
                        @else
                            <p class="text-sm italic text-gray-400">Sem imagem</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
