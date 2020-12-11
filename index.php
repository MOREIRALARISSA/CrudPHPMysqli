<?php include ('database.php') ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <section class="sidebar">
            <h2>Cadastro de Cliente</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <fieldset>
                    <legend>Preencher para editar e apagar</legend>
                    <div class="input-block">
                        <label for="id">Id</label>
                        <input type="number" name="id" id="id" placeholder="Insira o id..." />
                    </div>

                    <div class="button-block">
                        <input type="submit" name="edit" value="Editar" />
                        <input type="submit" name="delete" value="Apagar" />
                    </div>
                </fieldset>

                <fieldset>
                    <div class="input-block">
                        <label for="name">Nome do cliente</label>
                        <input type="text" name="name" placeholder="Insira o nome..." value="" />
                    </div>

                    <div class="input-block">
                        <label for="email">E-mail do cliente</label>
                        <input type="email" name="email" placeholder="Insira o e-mail..." value="" />
                    </div>

                    <div class="input-block">
                        <label for="city">Cidade do cliente</label>
                        <input type="text" name="city" placeholder="Insira a cidade..." value="" />
                    </div>

                    <div class="input-block">
                        <label for="uf">Estado do cliente</label>
                        <input type="text" name="uf" maxlength="2" placeholder="Insira o estado..." value="" />
                    </div>

                    <div class="button-block">
                        <input type="submit" name="add" value="Cadastrar" />
                    </div>
                </fieldset>
            </form>
        </section>

        <article class="table-container">
            <div>
                <h1>Lista de Cadastros</h1>

                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?=$html?>
                    </tbody>
                </table>
            </div>
        </article>
    </main>
</body>

</html>