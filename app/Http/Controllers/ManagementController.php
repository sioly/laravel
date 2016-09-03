<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use DB;

use Auth;

use Illuminate\Support\Facades\Redirect;


class ManagementController extends Controller
{
    function editgift($id){
			$title = Input::get('title');
			$content = Input::get('content');
			$file = Input::file('file');

			if(!empty($file)){
				$filename = $file->getClientOriginalName();
				$destinationPath = 'upload';
				$type = $file->getClientMimeType();
				DB::table('sale')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->update(array('title'=>$title,'content'=>$content,'file'=>$filename));
				$file->move($destinationPath, $filename);
				return Redirect::to('/');
			}else{
				DB::table('sale')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->update(array('title'=>$title,'content'=>$content));
				return Redirect::to('gift')->with('info','Votre annonce a bien été modifié');
			}
	}

	function deletegift($id){
		DB::table('sale')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->delete();
		return Redirect::to('gift')->with('info','Votre annonce a bien été supprimé');
	}

	function editswap($id){
			$title = Input::get('title');
			$content = Input::get('content');
			$itemsearch = Input::get('itemsearch');
			$file = Input::file('file');

			if(!empty($file)){
				$filename = $file->getClientOriginalName();
				$destinationPath = 'upload';
				$type = $file->getClientMimeType();

				DB::table('swap')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->update(array('title'=>$title,'itemsearch'=>$itemsearch,'content'=>$content,'file'=>$filename));
				$file->move($destinationPath, $filename);
				return Redirect::to('/');
			}else{
				DB::table('swap')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->update(array('title'=>$title,'itemsearch'=>$itemsearch,'content'=>$content));
				return Redirect::to('swap')->with('info','Votre annonce a bien été modifié');
			}
	}

	function deleteswap($id){
		DB::table('swap')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->delete();
		return Redirect::to('swap')->with('info','Votre annonce a bien été supprimé');
	}

	function editlocation($id){
			$title = Input::get('title');
			$content = Input::get('content');
			$file = Input::file('file');

			if(!empty($file)){
				$filename = $file->getClientOriginalName();
				$destinationPath = 'upload';
				$type = $file->getClientMimeType();
				DB::table('location')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->update(array('title'=>$title,'content'=>$content,'file'=>$filename));
				$file->move($destinationPath, $filename);
				return Redirect::to('location')->with('info','Votre annonce a bien été modifié');
			}else{
				DB::table('location')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->update(array('title'=>$title,'content'=>$content));
				return Redirect::to('location')->with('info','Votre annonce a bien été modifié');
			}
	}

	function deletelocation($id){
		DB::table('location')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->delete();
		return Redirect::to('location')->with('info','Votre annonce a bien été supprimé');
	}

	function editsale($id){
			$title = Input::get('title');
			$content = Input::get('content');
			$price = Input::get('price');
			$file = Input::file('file');

			if(!empty($file)){
				$filename = $file->getClientOriginalName();
				$destinationPath = 'upload';
				$type = $file->getClientMimeType();
				DB::table('sale')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->update(array('title'=>$title,'content'=>$content,'price'=>$price,'file'=>$filename));
				$file->move($destinationPath, $filename);
				return Redirect::to('sale')->with('info','Votre annonce a bien été modifié');
			}else{
				DB::table('sale')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->update(array('title'=>$title,'price'=>$price,'content'=>$content));
				return Redirect::to('sale')->with('info','Votre annonce a bien été modifié');
			}
	}

	function deletesale($id){
		DB::table('sale')->WHERE('id',$id)->WHERE('id_user',Auth::user()->id)->delete();
		return Redirect::to('sale')->with('info','Votre annonce a bien été supprimé');
	}

	function search(){
		return view('search');
	}

}
