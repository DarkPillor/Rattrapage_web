<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Les activité</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/mon_css.css')}}">
    <link rel="stylesheet" href="{{asset('css/Activity.css')}}">
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>

  </head>
  <header>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
          @auth
              <a href="{{ url('/home') }}">Home</a>
              <a href="{{ url('/activitys')}}">Voir les activités</a>
              <a href="{{ url('/pastactivity')}}">Voir les activités passée</a>
              <a href="{{ url('/idee') }}">Voir les idées</a>
              <a href="{{ url('/activitys/create')}}"> Créer une idée</a>
              <a href="{{ route('logout') }}"> Déconnexion</a>
          @else
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
          @endauth
        </div>
        @endif
      </div>
    
</header>
<body>

<div class="Marketcontainer">

    @if (Auth::user()->type_id ==1)
        <input type="file" name="photo"  >
        <button type="submit" class="">Submit</button>
            <form action="{{action('PhotosController@update', $activity['id'])}}" method="post" class="formP" enctype="multipart/form-data">
              @csrf
               <input type="text" name="nom_product" placeholder="Nom du produit" class="AddP"><br>
               <input type="text" name="prix_product" placeholder="Prix en €" class="AddP"><br>
               <input type="file" name="Img_product" placeholder="image" class="ImgP" size="64"><br>
               <input type="text" name="description" placeholder="Description" class="AddP"><br>
               <input type="text" name="id_category" placeholder="category" class="AddP"><br>
               <button type="submit" class="AddValP">Submit</button>
               >
           </form>


   @endif

   <div class="BestProduct">
       <h1>Nos meilleurs ventes !</h1>

       <?php
       $products3 = DB::table('produit')->join('category', 'produit.Id_category', '=', 'category.Id_category')->orderBy('Nb_commande', 'desc')->take(3)->get();

        foreach ( $products3 as $product ):
                $Nom = $product->Nom_produit;
                $Description = $product->Des_produit;
                $Prix = $product->Prix_produit;
                $Image = $product->Image_produit;
                $Category = $product->Nom_category;

                echo"
                <div id=\"\" class=\"box\">
                    <p class=\"NomP\" >$Nom</p>
                    <p class=\"PrixP\" >$Prix €</p>
                    <p style=\"font-weight: bold\" class=\"Category\" >$Category</p>" ?>

                    <?= '<img src="data:image/jpeg;base64,'.base64_encode( $Image).'"/>';

                echo"</div>";
        endforeach;

        ?>
   </div>


   <div class="MarketProduct">

    <?php $products = DB::table('produit')->join('category', 'produit.Id_category', '=', 'category.Id_category')->get();


    foreach ($products as $product) {
        //var_dump($product);

        $Nom = $product->Nom_produit;
        $Description = $product->Des_produit;
        $Prix = $product->Prix_produit;
        $Image = $product->Image_produit;
        $product->disponible;
        $Class = "";
        $Category = $product->Nom_category;
        $Tmp = $product->Id_produit;

        if ($product->disponible == "0") {
            $Class = "HStock";
        }

        echo"
        <div id=\"$Tmp\" class=\"box\">
            <p class=\"NomP\" >$Nom</p>
            <p class=\"PrixP\" >$Prix €</p>"; ?>
            <img src="<?=$Image?>"/>
        <?php  echo "<p style=\"font-weight: bold\" class=\"Category\" >$Category $Class</p>
        </div>
        ";
    } ?>
    </div>
</div>

<div class="FondTempM disable">
</div>
<div class="Window">
    <div class="ViewArticle disable">
            <?php

            $Nom = isset($_GET['Nom']) ? $_GET['Nom'] : false;

            echo "on essai $Nom";


        //    include "Script/Article.php";
            //include "Article.blade.php";
            //$Id = $data->Id_produit;

//                echo "$Id";

            //$json = file_get_contents("Tab.json");

            /*$NomA = $produit->Nom_produit;
            $DescriptionA = $_GET['Des_produit'];
            $PrixA = $_GET['Prix_produit'];
            $ImageA = $_GET['Image_produit'];
            $ClassA = "";
            $CategoryA = $_GET['Nom_category'];
            if ($_GET['disponible'] == 0) {
                $ClassA = "HStock";
            }

            echo"
            <div id=\"$Tmp\" class=\"box\">
                <p class=\"NomP\" >$Nom</p>
                <p class=\"PrixP\" >$Prix €</p>"; /*?>
            <?= '<img src="data:image/jpeg;base64,'.base64_encode($Image).'"/>';
            echo "<p style=\"font-weight: bold\" class=\"Category\" >$Category $Class</p>
            </div>";*/

            ?>
    </div>
</div>
