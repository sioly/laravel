@extends('layouts.app')

@section('content')       
	<div id="ad">
	<?php
		$article = DB::table('swap')->where('id', $id)->get();
		foreach ($article as $a)
		{
			if($a->file != ""){
				echo '<h3>'.$a->title.'</h3><img src="../../upload/'.$a->file.'"><small>'.$a->content.'<br/>'.$a->itemsearch.'<br/>'.$a->region.'<br/>'.$a->id_user.'</small>';
				?><div id='edit'><?php
				if(Auth::user()->id == $a->id_user){
					?><a onClick="show('update')">Modifier</a><br/><?php
					?><a href="../deleteswap/<?php echo $id ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">Supprimer</a><?php
				}
				?></div><?php
			}else{
				echo '<h3>'.$a->title.'</h3><img src="../../upload/notimg.png"><small>'.$a->content.'<br/>'.$a->itemsearch.'<br/>'.$a->region.'<br/>'.$a->id_user.'</small>'
				?><div id='edit'><?php
				if(Auth::user()->id == $a->id_user){
					?><a onClick="show('update')">Modifier</a><br/><?php
					?><a href="../deleteswap/<?php echo $id ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">Supprimer</a><?php
				}
				?></div><?php
			}
		}
	?>
	</div>

	<div id="update">
		{{Form::open(array('url' => '/editswap/'.$id,'files'=>true))}}
		<label for="title">Titre</label><input type="text" required pattern="[a-zA-Z èéçàù]{2,50}" name="title" onkeyup="veriftitle(this);"/><div id="titlerror"></div><br/>
		<label for="content">Description</label><textarea name="content" placeholder="Entre 10 et 1000 caractères" required pattern="[a-zA-Z0-9 èéçàù.;:?!-,@]{10,1000}" onkeyup="verifcontent(this);"></textarea><div id="contenterror"></div><br/>
		<label for="itemsearch">Objet recherché</label><input type="text" required="true" name="itemsearch"/><br/>
		<label for="file">Image</label><input type="file" name="file" /></br>
		<input type="submit" name="submit" value="Modifier"/>
		{{form::close()}}
	</div>
@endsection