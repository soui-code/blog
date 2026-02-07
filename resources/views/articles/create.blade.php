@auth

  <h1>Enregistre un article</h1>
  <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label>titre</label>
    <input type="text" name="title"> <br> <br>
    <label>Contenu</label>
    <textarea name="content"></textarea><br><br>
    <label>Image</label>
    <input type="file" name="image"><br><br>
    <button>Creer</button>
  </form>
@endauth
@guest
  <p>
    Créer un compte pour ajoute un article 
    <a href="{{ route('register') }}">Creer un compte</a>
  </p>
@endguest