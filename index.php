<?php

// mysql
    include_once('mysql.php');

    // querys
    $QUERY_INSERT_CATEGORY = "INSERT INTO categorys (category_name) VALUES (?)";
    $QUERY_GET_CATEGORYS_LIST = "SELECT * FROM categorys";

    $QUERY_INSERT_POST = "INSERT INTO posts (title, category_id, content) VALUES (?, ?, ?)";
    $QUERY_GET_POSTS_LIST = "SELECT * FROM posts INNER JOIN categorys ON `posts`.`category_id` = `categorys`.`id` ORDER BY category_name ASC";

    // categoriese kkkkkk
    $categorys_list = $pdo->prepare($QUERY_GET_CATEGORYS_LIST);
    $categorys_list->execute();

    $categorys_list = $categorys_list->fetchAll(PDO::FETCH_ASSOC);
    
    // current postes
    $posts_list = $pdo->prepare($QUERY_GET_POSTS_LIST);
    $posts_list->execute();

    $posts_list = $posts_list->fetchAll(PDO::FETCH_ASSOC);

    //cadastramento
    if(isset($_POST['cadastramentokkk'])){

        // criar poste
        if(isset($_POST['post-title']) && !empty($_POST['post-title'])){
            
            $title = $_POST['post-title'];
            $categoriamento = $_POST['post-category'];
            $conteudo = $_POST['post-content'];

            $sql = $pdo->prepare($QUERY_INSERT_POST);

            $sql->execute([
                $title,
                $categoriamento,
                $conteudo

            ]);

        }

        // create categorykkkkkkkkkkkkkkkkkkkkkkkkkkk
        if(isset($_POST['category-name']) && !empty($_POST['category-name'])){

            $categoria_nome = $_POST['category-name'];

            $sql = $pdo->prepare($QUERY_INSERT_CATEGORY);

            $sql->execute([ $categoria_nome ]);

        }

        header('Refresh: 0');
    
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet" />

    <title>programar no sublime é coisa de maluco</title>
</head>

<body>

    <!-- Header -->
    <header>

        <h1>Robson Notíciamentos</h1>

        <form method="POST">

            <div class="signup-post">

                <p>Poste</p>

                <input type="text" name="post-title" placeholder="Tìtutlo" />

                <select name="post-category">

                    <?php

                    foreach ($categorys_list as $key => $category) {

                        echo "<option value='$category[id]'>$category[category_name]</option>";
                    }

                    ?>

                </select>

                <input type="text" name="post-content" placeholder="Conteuudo" />

            </div> <!-- Post -->

            <div class="signup-category">

                <p>Cadastrar categomerda</p>

                <input type="text" name="category-name" placeholder="nome" />

            </div> <!-- Category -->

            <button type="submit" name="cadastramentokkk">CadAStrameNto</button>

        </form> <!-- Form -->

    </header> <!-- Header -->

    <section class="postskkk">

        <div class="filtramento">
            <form method="POST">

                <p>Fiutramento POR Categoreaaas</p>

                <?php

                    foreach($categorys_list as $key => $category){
                        
                        echo "<input type='checkbox' name='$category[id]' /> " . $category['category_name'];
                        echo '<br/>';

                    }

                ?>

            </form>
        </div>

        <div class="postamento-wrapper">

            <?php

                foreach($posts_list as $key => $post){

                    echo "
                    <div class='prost' categoriamento='$post[category_id]'>

                        <div class='prost-title'>
                            <h2>$post[title] <span> - $post[category_name]</span></h2>
                        </div>

                        <p>$post[content]</p>

                    </div>
                    ";

                }
            

            ?>

        </div>

    </section>

    <!-- escripitamentos -->
    <script src="script.js"></script>

</body>

</html>
