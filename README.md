# 🗳️ Sistema de Gerenciamento Eleitoral (PHP & MySQL)

Um sistema web simples e eficiente desenvolvido em PHP puro e MySQL para gerenciamento completo de **Eleitores** e **Candidatos**, permitindo realizar operações de **CRUD** (Criar, Ler, Atualizar e Deletar) diretamente via interface web.

---

## 📌 Funcionalidades

### 👤 Gerenciamento de Eleitores
- **Cadastrar Eleitor:** Registre nome, número do título de eleitor e cidade.
- **Alterar Eleitor:** Atualize o nome e a cidade a partir do ID do eleitor.
- **Listar Eleitores:** Exibição dinâmica de todos os eleitores cadastrados em formato de tabela.
- **Excluir Eleitor:** Remoção direta de registros individualmente.

### 🏛️ Gerenciamento de Candidatos
- **Cadastrar Candidato:** Registre nome, número do candidato e cargo concorrido.
- **Alterar Candidato:** Atualize nome, número e cargo a partir do ID do candidato.
- **Listar Candidatos:** Tabela dinâmica com todos os candidatos cadastrados.
- **Excluir Candidato:** Remoção de candidatos em tempo real.

---

## 🛠️ Tecnologias Utilizadas

- **Linguagem Backend:** PHP (utilizando extensão nativa `mysqli`)
- **Banco de Dados:** MySQL / MariaDB
- **Servidor Web:** Apache / PHP Built-in Server
- **Frontend:** HTML5

---

## 🗄️ Estrutura do Banco de Dados

Para que o sistema funcione corretamente, crie o banco de dados `eleicao` e execute o script SQL abaixo:

```sql
CREATE DATABASE IF NOT EXISTS eleicao;
USE eleicao;

-- Tabela de Eleitores
CREATE TABLE IF NOT EXISTS eleitor (
    id_eleitor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    numero_titulo VARCHAR(20) NOT NULL,
    cidade VARCHAR(100) NOT NULL
);

-- Tabela de Candidatos
CREATE TABLE IF NOT EXISTS candidato (
    id_candidato INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    numero_candidato INT NOT NULL,
    cargo VARCHAR(50) NOT NULL
);
