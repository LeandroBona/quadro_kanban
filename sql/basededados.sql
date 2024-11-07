
CREATE DATABASE gerenciamento_tarefas ;
USE gerenciamento_tarefas;

## crie os campos de acordo com a prova
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

## crie os campos de acordo com a prova
CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    descricao TEXT NOT NULL,
    setor VARCHAR(50) NOT NULL,
    prioridade ENUM('baixa', 'media', 'alta') NOT NULL,
    status ENUM('a_fazer', 'fazendo', 'pronto') DEFAULT 'a_fazer',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);