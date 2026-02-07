<nav class="bg-gray-900 text-white mb-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="text-xl font-bold">
                Mon Blog
            </div>

            <div class="space-x-4">
                <a href="{{route('profile.edit')}}" class="hover:text-gray-300">Mon profil</a>
                <a href="{{route('articles.create')}}" class="hover:text-gray-300">Ajouter</a>
                <a href="{{route('user.index')}}" class="hover:text-gray-300">Mes articles</a>
            </div>
        </div>
    </div>
</nav>
<div class="max-w-7xl mx-auto px-4">
    <h1 class="text-2xl font-bold text-center mb-6">Liste des articles</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
        @foreach($articles as $article)

        <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
            
            @if($article->image)
                <img src="{{asset('storage/'.$article->image)}}"
                     class="w-full h-40 object-cover">
            @endif

            <div class="p-4 flex flex-col h-full">
                <h2 class="font-semibold text-lg mb-2">
                    {{$article->title}}
                </h2>

                <p class="text-gray-600 text-sm mb-3">
                    {{ \Illuminate\Support\Str::limit($article->content, 80) }}
                </p>

                <p class="text-xs text-gray-500 mt-auto">
                    Auteur : {{$article->user->name}}
                </p>

                <div class="flex justify-between mt-3">
                    <a href="{{route('articles.show',$article->id)}}"
                       class="text-blue-600 text-sm hover:underline">
                        Détails
                    </a>

                    @can('update',$article)
                        <a href="{{route('articles.edit',$article->id)}}"
                           class="text-yellow-600 text-sm hover:underline">
                            Modifier
                        </a>
                    @endcan
                </div>

                @can('delete',$article)
                <form action="{{route('articles.destroy',$article->id)}}" method="POST" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button class="w-full bg-red-500 text-white text-sm py-1 rounded hover:bg-red-600">
                        Supprimer
                    </button>
                </form>
                @endcan

            </div>
        </div>

        @endforeach
    </div>
</div>