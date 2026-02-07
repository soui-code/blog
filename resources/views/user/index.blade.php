<h1>Liste des articles</h1>
<a href="{{route('articles.create')}}">Ajoute</a>

@foreach($articles as $article)
@if($article->user_id === auth()->id())
<h2>{{$article->title}}</h2>
<p>{{$article->content}}</p>
@if($article->image)
 <img src="{{asset('storage/'.$article->image)}}" width="200" height="200">
@endif
<p>Auteur : {{$article->user->name}}</p>
<a href="{{route('articles.edit',$article->id)}}">Modifier</a>
<a href="{{route('articles.show',$article->id)}}">Details</a>
@can('delete',$article)
<form action="{{route('articles.destroy',$article->id)}}" method="POST">
	@csrf

	@method('DELETE')
	<button >Supprimer</button>
</form>
@endcan
@endif
@endforeach
