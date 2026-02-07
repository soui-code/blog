<h1>Mon profil</h1>
@csrf
<a href="{{route('user.edit',$user->id)}}">Modifier</a>
<h3>Nom: {{$user->name}}</h3>
<h3>E-mail: {{$user->email}}</h3>