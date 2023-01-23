<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/8e5d31eab8.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">   

<main>
<div class="container1">

<section class="search-bar">
    <div class="row">
        <div class="col-lg-10 mx-auto">
        
            <form>
                <div>
                    <div class="input-group">
                        <input type="search" class="form1"  placeholder= "Search Here">
                        <input type="search" class="form1"  placeholder= "Quantity">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-link"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        </div>
    
 </div>
 <h1>Fun. Fast. Tasty. Delicious.</h1>
     <p class="text-center my-1"> Healthy foods are foods that fill up our stomach and provide us with energy.
Vegetables are very healthy foods for our bodies.
Healthy foods keep our bodies disease-free.</p>
</main>

<?php
$msg="";
//if upload button is pressed
if(isset($_POST['upload'])){
    //the path to store the uploaded image
    $target= "includes/images/".basename($_FILES['image']['name']);

    //connect to database
    $db = mysqli_connect("localhost","root","","photos");

    //get all the submitted data from the form

    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $sql = "INSERT INTO images (image,text) VALUES ('$image','$text' )";
    mysqli_query($db, $sql);//stores the submitted data into the database table:images

    //now lets move the uploaded image into the folder:images
    if(move_uploaded_file($_FILES['image']['tmp_name'] ,$target)){
        $msg ="Order Succesfully";
    }
    else{
        $msg="There was some problem while order";
    }
    
}
?>
    <div id="content" >

    <?php
        $db = mysqli_connect("localhost","root","","photos");
        $sql= "SELECT * FROM images";
        $result = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($result)){
        echo "<div id = 'img_div'>";
            echo "<b>Order</b>";
        echo "<div class='img1'>";
            echo "<img src='includes/images/".$row['image']."' >";
            echo "</div>";
            echo "<p>".$row['text']."</p>";
        echo "</div>";
        }
            ?>
        <div class="two">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Say something about order"></textarea>
            </div>
            <div>
                <input type="submit" name="upload" value="upload Image">
            </div>
        </form>
        </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

