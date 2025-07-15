<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts do Blog
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-4">
            <x-link-button href="{{ route('blog.adicionar') }}">
                Criar post
            </x-link-button>
        </div>

        <form method="GET" action="{{ route('blog.index') }}" class="mb-4">
            <div class="flex items-center gap-2">
                <select name="category_id" class="rounded border-gray-300">
                    <option value="">Todas as categorias</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filtrar</button>
            </div>
        </form>

        @foreach ($posts as $post)
            @if (@$post)
                <div class="bg-white dark:bg-gray-800 shadow rounded p-4 mb-4">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $post->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $post->content }}</p>
                    <div class="text-sm text-gray-500 mt-4">
                        Autor: {{ $post->user->name ?? 'Desconhecido' }} |
                        Categoria: {{ $post->category->name ?? 'Sem categoria' }}
                    </div>
                </div>
            @else
                <p class="text-gray-600">Nenhum post encontrado.</p>    
            @endif
        @endforeach
    </div>
</x-app-layout>
