<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Blacktatoo</title>
</head>
<body>
    <a href="index.php" class="btm">Voltar</a>
    <div class="box">
        <form action="pagina_extra.php" method="POST">
        <input type="hidden" name="operacao" value="inserir_funcionario">
        <input type="hidden" name="permissao" value="2">
            <fieldset>
                <legend><b>Fórmulário de Funcionário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="apelido" id="apelido" class="inputUser" required>
                    <label for="apelido" class="labelInput">Apelido</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha_rep" id="senha_rep" class="inputUser" required>
                    <label for="senha_rep" class="labelInput">Repetir a Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="CPF" id="CPF" class="inputUser" required>
                    <label for="nome" class="labelInput">CPF</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="Telefone" id="Telefone" class="inputUser" required>
                    <label for="nome" class="labelInput">Telefone</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
