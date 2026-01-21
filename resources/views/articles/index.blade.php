<h1>Liste des articles</h1>
@foreach($articles as $article)
<h2>{{$article->title}}</h2>
<p>{{$article->content}}</p>
<p>Auteur : {{$article->user->name}}</p>
<a href="{{route('articles.edit')}}">Modifier</a>
<form action="{{route('articles.destroy')}}" method="post">
	<button >Supprimer</button>
</form>
@endforeach