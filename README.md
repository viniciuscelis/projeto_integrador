# Sistema gerenciador de uma padaria
## Sobre o projeto
Este é um sistema gerenciador de padarias, desenvolvido em php com um banco de dados postgresql, que utiliza pdo para conectar com o banco de dados

Este sistema tem o objetivo de auxiliar no desenvolvimento de uma padaria, permitindo cadastrar itens, controlar o estoque, editar e excluir produtos (nome, preço, descrição).

## Tecnologias utilizadas
- PHP
- PostgreSQL
- HTML5
- CSS 3

## Funcionalidades
### Usuários
- cadastro
- login
- logout

### Produtos
- Cadastro de produtos
- Listagem de produtos
- Edição de produtos
- Exclusão de produtos
- Visualizar o estoque

## Requisitos funcionais e não funcionais
### Requisitos funcionais

#### RF-001: Autenticação e Controle de Acesso
**Descrição:** Permitir que os usuários façam login no sistema informando nome de usuário (login) e senha, restringindo as funcionalidades de acordo com o perfil cadastrado (Dono ou Empregado). <br>
**Prioridade:** Alta <br>
**Versão:** 1.0 <br> 
**Rastreabilidade:** Necessidade de segurança e controle de permissões.

#### RF-002: Gestão de Funcionários
**Descrição:** Permitir o cadastro, listagem, alteração de dados e inativação de usuários do sistema utilizando nome completo e senha.
**Prioridade:** Alta
**Versão:** 1.0
**Critérios de Aceitação:**

- Permitir o gerenciamento desta tela apenas para o perfil dono;

- Validar a unicidade do nome de usuário (login) no cadastro, impedindo duplicidades;

- Permitir a escolha da atribuição (dono ou empregado);

- Ocultar a exibição da senha em texto puro em qualquer consulta.

#### RF-003: Gestão e Cadastro de Produtos (CRUD)
**Descrição:** Permitir a inclusão, atualização, consulta e desativação dos produtos e insumos da padaria.<br>
**Prioridade:** Alta <br>
**Versão:** 1.0 <br>
**Critérios de Aceitação:**

- Cadastrar nome, código, preço e quantidade;

- Permitir a busca de itens por nome ou código;

- Atualizar as informações diretamente no banco de dados PostgreSQL.

#### RF-004: Controle e Movimentação de Estoque
**Descrição:** Permitir o registro de entradas (compras/recomposição) e saídas (baixas manuais ou perdas) de produtos e insumos.
**Prioridade:** Alta
**Versão:** 1.0
**Critérios de Aceitação:**

- Atualizar em tempo real a quantidade total de cada item disponível no estoque;

#### RF-005: Alerta de Estoque Mínimo
**Descrição:** Notificar visualmente os usuários no painel de estoque quando um item atingir ou ficar abaixo da quantidade mínima cadastrada.
**Prioridade:** Média
**Versão:** 1.0
**Rastreabilidade:** Prevenção de falta de produtos ou insumos essenciais na padaria.

### Requisitos não funcionais

#### RNF-001: Segurança na Camada de Dados
**Descrição:** Todo o processamento de queries SQL no PHP deve utilizar Prepared Statements via PDO para mitigar ataques de SQL Injection.

#### RNF-002: Criptografia e Armazenamento de Senhas
**Descrição:** As senhas dos usuários devem ser criptografadas utilizando algoritmos seguros de hash (ex: password_hash() com Bcrypt no PHP) antes de serem armazenadas no PostgreSQL.

#### RNF-003: Usabilidade da Interface
**Descrição:** A navegação do sistema deve ser focada em telas limpas (Funcionários, Produtos e Estoque), garantindo facilidade de operação pelos funcionários sem redirecionamentos desnecessários.

#### RNF-004: Persistência e Integridade Referencial
**Descrição:** Utilização das restrições de integridade referencial (Foreign Keys) do PostgreSQL para garantir a consistência entre usuários, produtos e histórico de estoque.

### REGRAS DE NEGÓCIO

#### RN-001:
> O acesso ao sistema é estritamente restrito aos funcionários e proprietários cadastrados (dono e empregado), através de nome de usuário e senha.

#### RN-002:
> O nome de usuário (login) deve ser único no sistema para cada funcionário ou proprietário.

#### RN-003:
> O gerenciamento completo de usuários (criar, editar e desativar contas) é de acesso exclusivo do perfil dono.

#### RN-004:
> A quantidade de qualquer produto ou insumo no estoque jamais pode ser um valor inferior a zero.

#### RN-005:
> Produtos ou insumos que possuam registro de movimentação no histórico do sistema não podem sofrer Hard Delete (remoção física do banco), permitindo apenas o Soft Delete (desativação lógica).

#### RN-006:
> Para itens medidos por peso (KG), a quantidade informada nas movimentações de estoque deve aceitar até três casas decimais (ex: 0.500 para 500 gramas).

## Estrutura do projeto
```bash
sistema_padaria
|
|- index.php
```

## Banco de dados
### Nome do banco: sistema_padaria

### Tabela usuarios

|Coluna|Tipo|chave|Descrição|
|---|---|---|---|
|id|INT|PK|Identificador único do usuário, auto incremento|
|nome|Varchar||Nome completo do usuário|
|senha|Varchar||Senha do usuário|
|atribuicao|Varchar||atribuição do empregado ou dono|

### Tabela produtos

|Coluna|Tipo|chave|Descrição|
|---|---|---|---|
|id|INT|PK|Identificador único do produto, auto incremento|
|nome|Varchar||Nome do produto|
|codigo|INT||Código do produto|
|categoria|Varchar||Categoria do produto|
|preco|Decimal||Preço do produto|
|quantidade_estoque|INT||Quantidade de produtos em estoque|

## Fluxo do sistema
```bash
index
|
login
|
home
├─ Funcionários
├─ Gerenciamento de produtos
├─ Estoque
└─ Logout
```

![Imagem para ilustrar o fluxo do sistema](/extra/fluxo_paginas.png)


## Segurança
O sistema utiliza para a segurança do site:
- Sessões PHP para login e autenticação de usuários
- PDO para conexão com o banco de dados
- Prepared Statements para prevenir SQL Injection
- Restrição de acesso às páginas internas para usuários não logados

## Como executar

### Passo 1: Clonar o Repositório
Abra o terminal e execute:

```Bash
git clone https://github.com/viniciuscelis/projeto_integrador.git
cd projeto_integrador
```

### Passo 2: Criar o Usuário e o Banco no PostgreSQL
Acesse o console do PostgreSQL como superusuário no seu terminal:

```Bash
psql -U postgres -h localhost
```

Dentro do ambiente interativo do PostgreSQL (indicado pelo prompt postgres=#), execute os comandos SQL para criar o usuário e o banco de dados:

```SQL
CREATE USER padaria WITH PASSWORD 'sua_senha_segura';
CREATE DATABASE sistema_padaria OWNER padaria;
\q
```
> (O comando \q faz você sair do console do PostgreSQL e retornar ao terminal do seu sistema operacional).

### Passo 3: Importar o Banco de Dados
Garante que você continua no terminal do seu sistema operacional e dentro da pasta projeto_integrador (onde está o arquivo do dump).

Se o arquivo dump.sql for um script SQL em texto plano, execute:

```Bash
psql -h localhost -U padaria -d sistema_padaria -f dump.sql
```

Nota: Se o arquivo for um dump em formato binário ou customizado (.dump ou .tar), utilize o pg_restore:

Bash
pg_restore -h localhost -U padaria -d sistema_padaria -v dump.sql
Se houver erro de permissão por conta de comandos de administração no dump, substitua -U padaria por -U postgres.

### Passo 4: Configurar a Conexão com o Banco
Localize o arquivo de conexão do projeto (como conexao.php) e atualize os dados com as credenciais criadas:

```PHP
$host = 'localhost';
$db   = 'sistema_padaria';
$user = 'padaria';
$pass = 'sua_senha_segura';
```

### Passo 5: Executar o Sistema
No terminal, ainda dentro da pasta do projeto, inicie o servidor embutido do PHP:

```Bash
php -S localhost:8000
```
Abra o navegador e acesse: localhost:8000

## Requisitos

- PHP
- PostgreSQL
- HTML5
- CSS 3