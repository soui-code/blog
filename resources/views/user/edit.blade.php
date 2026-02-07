<h1>Modifier mon profil</h1>
<form method="POST" action="{{route('user.update',$user->id)}}" enctype="multiparts/form-data">
	@csrf
	@method('PUT') 
	<label>Nom</label>
    <input type="text" name="name" value="{{$user->name}}">
    <input type="file" name="image">
    <button>Enregistrer</button>
</form>
