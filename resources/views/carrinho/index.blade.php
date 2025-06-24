<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Carrinho
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($carrinho) > 0)
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($carrinho as $produto)
                        <div class="bg-white dark:bg-gray-700 p-4 rounded shadow flex flex-col">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $produto['nome'] }}</h3>
                            <p class="text-gray-700 dark:text-gray-300">R$ {{ number_format($produto['preco'], 2, ',', '.') }}</p>
                            <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $produto['descricao'] }}</p>

                            @if (!empty($produto['image']))
                                <img src="{{ asset('storage/' . $produto['image']) }}" alt="Imagem do Produto" class="w-full h-48 object-cover rounded mb-4">
                            @else
                                <p class="text-sm italic text-gray-400 mb-4">Sem imagem</p>
                            @endif

                            <div class="mt-auto">
                                <form method="POST" action="{{ route('carrinho.remover', $produto['id'] ?? $loop->index) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                        Remover do carrinho
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 dark:text-gray-400">Seu carrinho está vazio.</p>
            @endif
        </div>
    </div>
</x-app-layout>
