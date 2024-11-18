<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register_page.css">
    <link rel="stylesheet" href="functions.css">
</head>
<body>

<div class="wrapper">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Log in</div>
                     <form class="flip-card__form" action="login_src.php" method="POST">
                        <input class="flip-card__input" name="username" placeholder="Usuario" type="text">
                        <input class="flip-card__input" name="password" placeholder="Senha" type="password">
                        <button class="flip-card__btn">Let`s go!</button>
                        <?php

                $parametros_get = $_GET;

                // Verifica se o array de parâmetros está vazio
                if (!empty($parametros_get)) {
                
                    $usuario_errado = $_GET['condition'];

                    if($usuario_errado == "undefined"){
                        echo "<p id='paragraph-to-hide' style='color: red'>Usuario ou senha invalido</p>";
                    }
                }
                ## checa se esta errado e da a mensagem
                ?>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Registrar-se</div>
                     <form class="flip-card__form" action="../register/register_src.php" method="POST">
                        <input class="flip-card__input" name="username" placeholder="Usuario" type="text">
                        <input class="flip-card__input" name="password" placeholder="Senha" type="password">
                        <select name="classe">
                            <option value="Fogo">Fogo</option>
                            <option value="Ar">Ar</option>
                            <option value="Agua">Agua</option>
                            <option value="Terra">Terra</option>
                        </select>
                        <button class="flip-card__btn">Confirmar!</button>
                     </form>
                  </div>
               </div>
            </label>
        </div>   
   </div>
   <script>
        function hideParagraph() {
            const paragraph = document.getElementById('paragraph-to-hide');
            paragraph.style.display = 'none';
        }

        setTimeout(hideParagraph, 3000); // define o tempo que o paragrafo do "usuario ou senha invalido" fica aparecendo
    </script>
</body>
</html>