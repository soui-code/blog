<h1>Modifier l'article</h1>
<form action="{{route('articles.update',$articles->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<img src="{{asset('storage/'.$articles->image)}}" width="200" height="200"> <br>
	<label>Titre</label>
	<input type="text" name="title" value="{{$articles->title}}"> <br><br>
	<label>Contenu</label>
	<textarea name="content">{{$articles->content}}</textarea><br><br>
	<label>Image</label>
	<input type="file" name="image">
	<button>Modifier</button>
</form>