<h1>Detail sur article</h1>
@if ($article->empty) 
   <p>Aucun article ecrire</p>
@endif
@if($article->image)
  <img src="{{asset('storage/'.$article->image)}}" width="200" height="200">
@endif
  <h2>{{$article->title}}</h2>
  <p>{{$article->content}}</p>
  <h3>Date de publication :{{$article->created_at}}</h3>
<h3>auteur : {{$article->user->name}}</h3>
<a href="{{route('articles.index')}}">Retour</a>
  <a href="{{route('articles.edit',$article->id)}}">Modifier</a>
  <form method="post" action="{{route('articles.destroy',$article->id)}}">
  	 <button>Supprimer</button>
  </form>
