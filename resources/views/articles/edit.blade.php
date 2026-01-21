<h1>Modifier l'article</h1>
<form action="{{route('articles.update')}}" method="post">
	@csrf
	@method('PUT')
	<label>Titre</label>
	<input type="text" name="title" value="{{$artle->title}}">
	<label>Contenu</label>
	<textarea name="textarea">{{$article->content}}</textarea>
	<button>Modifier</button>
</form>