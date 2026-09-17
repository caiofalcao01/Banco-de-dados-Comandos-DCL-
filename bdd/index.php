<?php
// Configurações do Banco de Dados
$host = 'localhost';
$user = 'root';
$password = 'Senai@118';
$database = 'eleicao';

// Conexão
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// ===================================================
// --- LÓGICA PARA ELEITOR ---
// ===================================================

// Inserir Eleitor
if (isset($_POST['inserir'])) {
    $nome = $_POST['nome'];
    $numero_titulo = $_POST['numero_titulo'];
    $cidade = $_POST['cidade'];
    
    $sql = "INSERT INTO eleitor (nome, numero_titulo, cidade) VALUES ('$nome', '$numero_titulo', '$cidade')";
    $conn->query($sql);
}

// Excluir Eleitor
if (isset($_POST['excluir'])) {
    $id = $_POST['id_eleitor'];
    
    $sql = "DELETE FROM eleitor WHERE id_eleitor = $id";
    $conn->query($sql);
}

// Alterar Eleitor
if (isset($_POST['alterar'])) {
    $id = $_POST['id_eleitor'];
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    
    $sql = "UPDATE eleitor SET nome = '$nome', cidade = '$cidade' WHERE id_eleitor = $id";
    $conn->query($sql);
}

// ===================================================
// --- LÓGICA PARA CANDIDATO ---
// ===================================================

// Inserir Candidato
if (isset($_POST['inserir_candidato'])) {
    $nome = $_POST['nome_candidato'];
    $numero_candidato = $_POST['numero_candidato'];
    $cargo = $_POST['cargo'];
    
    $sql = "INSERT INTO candidato (nome, numero_candidato, cargo) VALUES ('$nome', '$numero_candidato', '$cargo')";
    $conn->query($sql);
}

// Excluir Candidato
if (isset($_POST['excluir_candidato'])) {
    $id = $_POST['id_candidato'];
    
    $sql = "DELETE FROM candidato WHERE id_candidato = $id";
    $conn->query($sql);
}

// Alterar Candidato
if (isset($_POST['alterar_candidato'])) {
    $id = $_POST['id_candidato'];
    $nome = $_POST['nome_candidato'];
    $numero_candidato = $_POST['numero_candidato'];
    $cargo = $_POST['cargo'];
    
    $sql = "UPDATE candidato SET nome = '$nome', numero_candidato = '$numero_candidato', cargo = '$cargo' WHERE id_candidato = $id";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Eleições</title>
</head>
<body>

    <!-- SEÇÃO DE ELEITORES -->
    <section>
        <h2>--- GERENCIAMENTO DE ELEITORES ---</h2>

        <h1>Adicionar Eleitor</h1>
        <form method="POST">
            Nome: <input type="text" name="nome" required><br>
            Título: <input type="text" name="numero_titulo" required><br>
            Cidade: <input type="text" name="cidade" required><br>
            <button type="submit" name="inserir">Inserir Eleitor</button>
        </form>
        
        <hr>

        <h1>Alterar Eleitor</h1>
        <form method="POST">
            ID do Eleitor: <input type="number" name="id_eleitor" required><br>
            Novo Nome: <input type="text" name="nome" required><br>
            Nova Cidade: <input type="text" name="cidade" required><br>
            <button type="submit" name="alterar">Alterar Eleitor</button>
        </form>

        <hr>

        <h1>Lista de Eleitores</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Título</th>
                <th>Cidade</th>
                <th>Ação</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM eleitor");
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_eleitor'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['numero_titulo'] . "</td>";
                echo "<td>" . $row['cidade'] . "</td>";
                echo "<td>
                        <form method='POST' style='display:inline;'>
                            <input type='hidden' name='id_eleitor' value='" . $row['id_eleitor'] . "'>
                            <button type='submit' name='excluir'>Excluir</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>

    <br><br><hr style="border: 3px solid #000;"><br><br>

    <!-- SEÇÃO DE CANDIDATOS -->
    <section>
        <h2>--- GERENCIAMENTO DE CANDIDATOS ---</h2>

        <h1>Adicionar Candidato</h1>
        <form method="POST">
            Nome: <input type="text" name="nome_candidato" required><br>
            Número do Candidato: <input type="number" name="numero_candidato" required><br>
            Cargo: <input type="text" name="cargo" required><br>
            <button type="submit" name="inserir_candidato">Inserir Candidato</button>
        </form>
        
        <hr>

        <h1>Alterar Candidato</h1>
        <form method="POST">
            ID do Candidato: <input type="number" name="id_candidato" required><br>
            Novo Nome: <input type="text" name="nome_candidato" required><br>
            Novo Número: <input type="number" name="numero_candidato" required><br>
            Novo Cargo: <input type="text" name="cargo" required><br>
            <button type="submit" name="alterar_candidato">Alterar Candidato</button>
        </form>

        <hr>

        <h1>Lista de Candidatos</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Número</th>
                <th>Cargo</th>
                <th>Ação</th>
            </tr>
            <?php
            $result_candidato = $conn->query("SELECT * FROM candidato");
            
            while ($row = $result_candidato->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_candidato'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['numero_candidato'] . "</td>";
                echo "<td>" . $row['cargo'] . "</td>";
                echo "<td>
                        <form method='POST' style='display:inline;'>
                            <input type='hidden' name='id_candidato' value='" . $row['id_candidato'] . "'>
                            <button type='submit' name='excluir_candidato'>Excluir</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>

</body>
</html>
<?php $conn->close(); ?>