<h1>Enregistre un article</h1>
<form action="{{route('articles.store')}}" method="post">
	@csrf
  <label>titre</label>
  <input type="text" name="title"> <br> <br>
  <label>Contenu</label>
  <textarea name="content"></textarea>
  <button>Creer</button>
</form>