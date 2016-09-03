<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Auth;

use App\Http\Requests;

use DB;

use Illuminate\Support\Facades\Redirect;

class ValidformController extends Controller
{
    function getgift(){
		$title = htmlspecialchars(Input::get('title'));
		$content = htmlspecialchars(Input::get('content'));
		$id_user = Auth::user()->id;
		$categorie = $_POST['cat'];
		$file = Input::file('file');
		$dep = Input::get('dep');

			if(!empty($file)){
				$filename = $file->getClientOriginalName();
				$destinationPath = 'upload';
				$type = $file->getClientMimeType();
				$size = $file->getSize();
				$width = 300;
				$height=300;
				//$size = 5000;
				DB::table('sale')->insert(
				array('title' => $title, 'content' => $content,'region'=>$dep, 'category'=>$categorie,'id_user'=>$id_user, 'file'=>$filename,'library'=>"don",'created_at'=>date("Y-m-d-H-i-s")));
				$file->move($destinationPath, $filename);
				return Redirect::to('gift')->with('info','Votre annonce a bien été posté');
			}else{
				DB::table('sale')->insert(
				array('title' => $title, 'content' => $content, 'category'=>$categorie,'id_user'=>$id_user,'library'=>"don",'created_at'=>date("Y-m-d-H-i-s")));	
				return Redirect::to('gift')->with('info','Votre annonce a bien été posté');
			}
	}

	function getswap(){
		$title = htmlspecialchars(Input::get('title'));
		$content = htmlspecialchars(Input::get('content'));
		$id_user = Auth::user()->id;
		$item = Input::get('item');
		$categorie = $_POST['cat'];
		$file = Input::file('file');
		$dep = Input::get('dep');

		if(!empty($file)){
			//$file = Input::file('file');
			$filename = $file->getClientOriginalName();
			$destinationPath = 'upload';
			$type = $file->getClientMimeType();
			DB::table('swap')->insert(
			array('title' => $title, 'content' => $content,'region'=>$dep,'itemsearch'=>$item, 'category'=>$categorie,'id_user'=>$id_user, 'file'=>$filename,'library'=>"troc",'created_at'=>date("Y-m-d-H-i-s")));	
			$file->move($destinationPath, $filename);
			return Redirect::to('swap')->with('info','Votre annonce a bien été posté');
		}else{
			DB::table('swap')->insert(
			array('title' => $title, 'content' => $content,'region'=>$dep,'itemsearch'=>$item,'category'=>$categorie,'id_user'=>$id_user,'library'=>"troc",'created_at'=>date("Y-m-d-H-i-s")));	
			return Redirect::to('swap')->with('info','Votre annonce a bien été posté');
		}
	}

	function getsale(){
		$title = htmlspecialchars(Input::get('title'));
		$content = htmlspecialchars(Input::get('content'));
		$price = Input::get('price');
		$id_user = Auth::user()->id;
		$categorie = $_POST['cat'];
		$file = Input::file('file');
		$dep = Input::get('dep');

		if(!empty($file)){
			//$file = Input::file('file');
			$filename = $file->getClientOriginalName();
			$destinationPath = 'upload';
			$type = $file->getClientMimeType();
			DB::table('sale')->insert(
			array('title' => $title, 'content' => $content,'region'=>$dep,'price'=>$price, 'category'=>$categorie,'id_user'=>$id_user, 'file'=>$filename,'library'=>"vente",'created_at'=>date("Y-m-d-H-i-s")));	
			$file->move($destinationPath, $filename);
			return Redirect::to('sale')->with('info','Votre annonce a bien été posté');
		}else{
			DB::table('sale')->insert(
			array('title' => $title, 'content' => $content,'region'=>$dep,'price'=>$price, 'category'=>$categorie,'id_user'=>$id_user,'library'=>"vente",'created_at'=>date("Y-m-d-H-i-s")));	
			return Redirect::to('sale')->with('info','Votre annonce a bien été posté');
		}
	}

	function getlocation(){
		$title = htmlspecialchars(Input::get('title'));
		$content = htmlspecialchars(Input::get('content'));
		$id_user = Auth::user()->id;
		$price = Input::get('price');
		$categorie = $_POST['cat'];
		$file = Input::file('file');
		$time = Input::get('time');
		$dep = Input::get('dep');

		if(!empty($file)){
			//$file = Input::file('file');
			$filename = $file->getClientOriginalName();
			$destinationPath = 'upload';
			$type = $file->getClientMimeType();
			DB::table('location')->insert(
			array('title' => $title, 'content' => $content,'region'=>$dep,'time'=>$time,'price'=>$price, 'category'=>$categorie,'id_user'=>$id_user, 'file'=>$filename,'library'=>"location",'created_at'=>date("Y-m-d-H-i-s")));	
			$file->move($destinationPath, $filename);
			return Redirect::to('location')->with('info','Votre annonce a bien été posté');
		}else{
			DB::table('location')->insert(
			array('title' => $title, 'content' => $content,'region'=>$dep,'time'=>$time,'price'=>$price,'category'=>$categorie,'id_user'=>$id_user,'library'=>"location",'created_at'=>date("Y-m-d-H-i-s")));	
			return Redirect::to('location')->with('info','Votre annonce a bien été posté');
		}
	}
}
