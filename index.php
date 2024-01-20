<?php

require "db.php";

$stmt = $pdo -> query("SELECT * FROM `Works`");
$works = $stmt -> fetchAll();

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="dist/css//lg-transitions.min.css">
    
    <title>Мой сайт</title>
</head>
<body>
    <main>
        <section class="first-screen section-bg">
            <div class="container">
              <div>
                <h1>Веб-разработчик <br> к вашим услугам</h1>
              </div>
              <div>
                <a class="btn btn-bg" onclick="smoothScroll('#about')" href="#">Узнать больше</a>
                <a class="btn btn-outline" onclick="smoothScroll('#portfolio')" href="#">Нанять меня</a>
              </div>
            </div>
           
        </section> <a class="chevron" href="#about">
                <img src="img/arrow-down-338-svgrepo-com (1).svg" alt="scroll" width="50px">
             </a>
        <section>
            <div class="container">
              <h2 id="about">Обо мне</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda nesciunt reprehenderit veritatis molestiae harum maxime eius qui voluptatibus dolores error aliquid explicabo, dolore temporibus accusamus, illum, amet cupiditate rem aut!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod nobis facere placeat quo obcaecati qui nesciunt inventore eligendi beatae in magnam natus, commodi reprehenderit deleniti nulla doloremque incidunt maiores? Dolorum.</p>
            </div>
        </section>
        <section>
          <div class="container">
            <h2 id="portfolio">Портфолио</h2>  
            <div id="lightgallery" class="gallery">
              
            <?php foreach($works as $work): ?>
              
            <a class="img-wrapper" data-sub-html=<?= $work['name'] ?> href="<?= $work['file_path']?>">
              <img src= "<?= $work['file_path']?>" alt="img" >
            </a>

            <?php endforeach; ?>

            </div> 
          </div>
        </section>
        <section class="section-bg">
          <div class="container">
            <div class="d-flex">
              <div class="w-60 pr-4">
                <h2>Давайте работать вместе</h2>
                <p>
                   Практический опыт показывает, что новая модель организационной деятельности способствует повышению актуальности системы масштабного изменения ряда параметров!
                </p>
              </div>
                <div class="w-40">
                  <form action="feedback.php" method="POST">
                    <input name = "name" type="text" placeholder="Как к вам обращаться">
                    <input name="email" type="email" placeholder="Ваш email">
                    <textarea name="text" rows="4" placeholder="Сообщение"></textarea>
                    <input class="btn btn-bg" type="submit" value="Отправить">
                  </form>
                </div>
            </div>
         </div>
       </section>
    </main>
    <footer>
      <div class="container">
          Copyright &copy; 2020. Все права защищены.
      </div>
    </footer>

    <script src="dist/js/lightgallery.min.js"></script>
    <script>
      lightGallery(document.getElementById('lightgallery'));
      function smoothScroll(selector) {
        event.preventDefault();
    document.querySelector(selector).scrollIntoView({
         behavior: 'smooth'
    });}
  </script>
</body>
</html>