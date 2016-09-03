<?php
    if(isset($_POST['search']) && !empty($_POST['search'])){

        $search = $_POST['search'];
        $cat = $_POST['categorie'];
        $library = $_POST['library'];
        $recherche = htmlspecialchars($_POST['search']);
            try 
            {
                $bdd = new PDO('mysql:host=localhost;dbname=laravel', 'root', '');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            // RECHERCHE RUBRIQUE+BOUTIQUE+SEARCH
            if($cat != "all" && $library == "don"){
                //header('location : location.php');
                $req = $bdd->prepare("SELECT * FROM sale WHERE title LIKE '%$search%' AND category like '$cat' AND library like '$library'");
                $req->execute(array('search' => $recherche . '%'));
            }elseif($cat != "all" && $library != "all" && $library != "don"){
                $req = $bdd->prepare("SELECT * FROM $library WHERE title LIKE '%$search%' AND category like '$cat' AND library like '$library'");
                $req->execute(array('search' => $recherche . '%'));
            // RECHERCHE RUBRIQUE+SEARCH
            }else if($cat == "all" && $library != "all" && $library != "don"){
                $req = $bdd->prepare("SELECT * FROM $library WHERE title LIKE '%$search%' AND library LIKE '$library'");
                $req->execute(array('search' => $recherche . '%'));
            }else if($cat == "all" && $library == "don"){
                $req = $bdd->prepare("SELECT * FROM sale WHERE title LIKE '%$search%' AND library LIKE '$library'");
                $req->execute(array('search' => $recherche . '%'));
            // RECHERCHE CATEGORIE+SEARCH
            }else if($cat != "all" && $library == "all"){
                $req = $bdd->prepare("SELECT title,file,id,library FROM sale WHERE title LIKE '%$search%' AND category LIKE '$cat' UNION ALL SELECT title,file,id,library FROM location WHERE title LIKE '%$search%' AND category LIKE '$cat' UNION ALL SELECT title,file,id,library FROM troc WHERE title LIKE '%$search%' AND category LIKE '$cat'");
                $req->execute(array('search' => $recherche . '%'));
            // RECHERCHE SEARCH
            }else if($cat == "all" && $library == "all"){
                $req = $bdd->prepare("SELECT title,file,id,library FROM sale WHERE title LIKE '%$search%' UNION ALL SELECT title,file,id,library FROM location WHERE title LIKE '%$search%' UNION ALL SELECT title,file,id,library FROM swap WHERE title LIKE '%$search%'");
                $req->execute(array('search' => $recherche . '%'));
            }

            while($data = $req->fetch()){
                if($data['file'] != ""){
                    if($data['library'] =="don"){
                        echo '<div class="picture">'.HTML::image('../public/upload/'.$data['file'], 'picture').html::link('/annoncedon/'.$data['id'], $data['title']).'</div>';
                    }elseif($data['library'] =="vente"){
                        echo '<div class="picture">'.HTML::image('../public/upload/'.$data['file'], 'picture').html::link('/annoncevente/'.$data['id'], $data['title']).'</div>';
                    }elseif($data['library'] =="troc"){
                        echo '<div class="picture">'.HTML::image('../public/upload/'.$data['file'], 'picture').html::link('/annoncetroc/'.$data['id'], $data['title']).'</div>';
                    }elseif($data['library'] =="location"){
                        echo '<div class="picture">'.HTML::image('../public/upload/'.$data['file'], 'picture').html::link('/annoncelocation/'.$data['id'], $data['title']).'</div>';
                    }
                }else{
                    if($data['library' =="don"]){
                        echo '<div class="picture">'.HTML::image('../public/images/notimg.png', 'picture').html::link('/annoncedon/'.$data['id'], $data['title']).'</div>';
                    }elseif($data['library' =="vente"]){
                        echo '<div class="picture">'.HTML::image('../public/images/notimg.png', 'picture').html::link('/annoncevente/'.$data['id'], $data['title']).'</div>';
                    }elseif($data['library' =="troc"]){
                        echo '<div class="picture">'.HTML::image('../public/images/notimg.png', 'picture').html::link('/annoncetroc/'.$data['id'], $data['title']).'</div>';
                    }elseif($data['library' =="location"]){
                        echo '<div class="picture">'.HTML::image('../public/images/notimg.png', 'picture').html::link('/annoncelocation/'.$data['id'], $data['title']).'</div>';
                    }
                }
            }
        }
?>