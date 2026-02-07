<h1>Article de {{$user->name}}</h1>
@if ($articles->empty) 
   <p>Aucun article ecrire</p>
@endif
@foreach($articles as $article)
  <h2>{{$article->title}}</h2>
  <p>{{$article->content}}</p>
  <a href="{{route('articles.edit',$article->id)}}">Modifier</a>
  <form method="post" action="{{route('articles.destroy',$article->id)}}">
  	 <button>Supprimer</button>
  </form>
  @endforeach