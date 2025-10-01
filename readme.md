# 📘 Documentação do Projeto SkyWave Fibra

Este documento foi feito para orientar os novos integrantes da equipe no desenvolvimento do projeto **SkyWave Fibra**.  
Ele explica desde a preparação do ambiente até como criar novas funcionalidades usando o padrão **MVC**.

* * *

## 🔎 O que é o Projeto

O SkyWave Fibra é um sistema web em **PHP 8.2**, que segue o padrão **MVC (Model, View, Controller)**.

Isso significa que o código é dividido em três camadas:

1.  **Model** → cuida do banco de dados.
    
2.  **Controller** → organiza a lógica e decide o que mostrar.
    
3.  **View** → são as telas que o usuário enxerga (HTML + PHP).
    

* * *

## 🧰 1. Preparando o Ambiente

### 1.1 Instalar o PHP

-   O projeto precisa do **PHP 8.2 ou superior**.
    
-   Para conferir se está instalado, digite no terminal:
    
    `php -v`
    
-   Se não aparecer a versão, instale:
    
    -   **Windows:** use XAMPP/Wamp/MAMP.
        
    -   **Linux (Ubuntu/Debian):**
        
        `sudo apt update sudo apt install php php-mysql`
        
    -   **macOS (Homebrew):**
        
        `brew install php`
        

* * *

### 1.2 Instalar o Composer

O **Composer** é o gerenciador de pacotes do PHP. Ele instala as bibliotecas que o projeto usa.

-   Baixe aqui: https://getcomposer.org/download/
    
-   Instale normalmente.
    
-   Teste se deu certo:
    
    `composer -V`
    

* * *

### 1.3 Configurar o `.htaccess`

O projeto **só funciona com URLs amigáveis** se o arquivo `.htaccess` estiver configurado.

📄 Crie o arquivo `.htaccess` na **raiz do projeto** (mesmo lugar do `index.php`) com o seguinte conteúdo:

`RewriteEngine On Options All -Indexes  # Redirecionar para WWW RewriteCond %{HTTP_HOST} !^www\. [NC] RewriteRule ^ http://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]  # Redirecionar para HTTPS (se quiser usar) #RewriteCond %{HTTP:X-Forwarded-Proto} !https #RewriteCond %{HTTPS} off #RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]  # Reescreve as rotas para o index.php RewriteCond %{SCRIPT_FILENAME} !-f RewriteCond %{SCRIPT_FILENAME} !-d RewriteRule ^(.*)$ index.php?route=/$1 [L,QSA]`

⚠️ **Se esse arquivo não estiver configurado, o sistema não roda em localhost.**

* * *

## 📦 2. Baixando o Projeto

1.  **Clonar o repositório do GitHub**
    
    `git clone https://github.com/FernandoIssler/skywavefibra.git cd <seu-repo>`
    
2.  **Instalar dependências**
    
    `composer install`
    
3.  **Configurar banco de dados**
    
    -   Crie um banco de dados chamado `skywavefibra`.
        
    -   Importe o arquivo `.sql` fornecido (ele cria todas as tabelas).
        
4.  **Configurar credenciais**
    
    -   No arquivo `source/Boot/Config.php`, cestão todas as credenciais habituais, o banco de dados local está com o usuário root e sem senha por padrão.
        

* * *

## 🗂️ 3. Estrutura do Projeto

`skywavefibra/ │── index.php        # Arquivo principal de rotas │── composer.json    # Configuração do Composer │── source/          # Código fonte (MVC) │   ├── Core/        # Classes principais (Model, Connect, Session etc.) │   ├── App/         # Controllers │   └── Models/      # Models (ligados ao banco) │── themes/          # Views (telas do usuário) │   ├── web/         # Parte pública (antes do login) │   └── app/         # Parte privada (depois do login) │── vendor/          # Bibliotecas instaladas pelo Composer`

* * *

## 🚦 4. Como funcionam as Rotas

As rotas ficam no `index.php`.  
Exemplo:

`$route->get('/equipamentos', 'App:equipments'); $route->post('/equipamento', 'App:saveEquipment');`

👉 Isso significa:

-   `GET /equipamentos` → abre a página de lista de equipamentos.
    
-   `POST /equipamento` → salva um equipamento no banco.
    

Cada rota aponta para um **Controller** e um **método**.

* * *

## 🎮 5. Controllers

Os controllers ficam em `source/App/`.  
Eles recebem a rota e decidem qual **view** abrir e qual **model** usar.

Exemplo:

`/** APP | Equipamentos */ public function equipment(): void {     $this->renderPage("equipment", [         "active"   => "equipment",         "title"    => "Equipamentos",         "subtitle" => "Gerencie seus equipamentos",     ]); }`

* * *

## 🗄️ 6. Models

Os Models são as classes que representam as tabelas do banco.  
Todos eles **herdam** de `Source\Core\Model`.

Exemplo para a tabela `equipment`:

`namespace Source\Models\App;  use Source\Core\Model;  class Equipment extends Model {     public function __construct()     {         parent::__construct("equipment", ["id"], ["type"]);     } }`

* * *

## 🎨 7. Views

As views ficam dentro da pasta `themes/`.

-   `themes/web` → telas públicas (login, registro).
    
-   `themes/app` → telas internas (após login).
    

Exemplo de view para cadastrar equipamentos (`themes/app/equipment.php`):

`<?php $this->layout("_theme"); ?>  <form action="<?= url("/app/equipamento") ?>" method="POST">    <!-- campos do formulário --> </form>`

* * *

## 🔄 8. Exemplo de Fluxo CRUD (Equipamentos)

1.  Usuário acessa `/app/equipamentos`.
    
2.  O controller `App.php` chama o método `equipments()`.
    
3.  Esse método carrega a view `themes/app/equipments.php`.
    
4.  Se o usuário enviar o formulário, a rota `POST /equipamento` é chamada.
    
5.  O método `saveEquipment()` do controller cria um objeto `Equipment` e salva no banco.
    
6.  O sistema mostra mensagem de sucesso ou erro.
    

* * *

## 🛢️ 9. Banco de Dados

O banco tem tabelas como:

-   `person` → pessoas (clientes e funcionários)
    
-   `account` → contas de acesso
    
-   `equipment` → equipamentos
    
-   `customer` → clientes
    
-   `contract` → contratos
    
-   `invoice` → faturas
    
-   `payment` → pagamentos
    
-   `support_ticket` → chamados de suporte
    

👉 Sempre que uma tabela for criada, deve ser criado também um **Model** correspondente.

* * *

## 💡 10. JavaScript

O arquivo `custom.js` controla alertas, formulários AJAX e mensagens.  
⚠️ **Importante:** esse arquivo não deve ser alterado.

* * *

## 📦 11. Usando o Composer no Dia a Dia (Se precisar instalar uma nova dependência me avise com antecedência)

-   Para instalar novas libs:
    
    `composer require vendor/pacote`
    
-   Para atualizar todas:
    
    `composer update`
    
-   Para atualizar o autoload (quando cria classes novas):
    
    `composer dump-autoload -o`
    

* * *

## 🌱 12. GitHub (fluxo de trabalho)

### 1\. Clonar o projeto

`git clone https://github.com/<usuario>/<repo>.git`

### 2\. Criar sua branch

Cada pessoa deve trabalhar **na sua branch com seu nome**:

`git checkout -b seu-nome`

### 3\. Fazer commits

`git add . git commit -m "Implementando feature X" git push origin seu-nome`

### 4\. Pull Request (PR)

-   Vá até o repositório no GitHub.
    
-   Clique em **New Pull Request**.
    
-   Escolha sua branch e peça para unir na branch principal (`main` ou `master`).
    
-   O **moderador** (no caso, Fernando) revisará e fará o merge.
    

### 5\. Conflitos

Se houver conflito, o moderador ajudará a corrigir antes do merge.

* * *

## ✅ 13. Checklist para Criar Novo Módulo

1.  Criar tabela no banco (Falar com o pesoal do BD se for necessário).
    
2.  Criar **Model** correspondente.
    
3.  Criar **rota** no `index.php`.
    
4.  Criar **método** no controller principal (App.php).
    
5.  Criar **view** na pasta certa.
    
6.  Testar o fluxo completo.
    

* * *

## 🆘 14. Dicas
    
-   Não altere arquivos da pasta `vendor/`.
    
-   Não esqueça do `.htaccess` no localhost.
    
-   Use **mensagens claras nos commits**.






- - - - - - - - -

# 📌 Divisão de Componentes do Projeto SkyWave Fibra

# 

O sistema é dividido em **8 grandes módulos**, cada um responsável por uma área de negócio.  
Cada módulo deve ter:

-   **Model(s)** → representando as tabelas do banco.
    
-   **Controller(s)** → para receber rotas e processar a lógica.
    
-   **Views** → formulários, listagens, telas de visualização.
    
-   **Rotas** → GET para páginas e POST para salvar/editar.
    

* * *

## 🔧 1. Equipamentos

# 

**Objetivo:** Gerenciar os equipamentos do provedor (ONU, roteadores, rádios, switches, etc.).

### Responsabilidades:

# 

-   Cadastrar equipamentos.
    
-   Listar equipamentos cadastrados.
    
-   Editar/atualizar status do equipamento (disponível, alocado, manutenção, descartado).
    
-   Relacionar equipamentos a clientes.
    

### Tabelas envolvidas:

# 

-   `equipment` (principal)
    
-   `customer_equipment` (relacionamento com clientes)
    

### Models:

# 

-   `Equipment.php`
    
-   `CustomerEquipment.php`
    

* * *

## 👤 2. Pessoas

# 

**Objetivo:** Centralizar informações de pessoas físicas e jurídicas.

### Responsabilidades:

# 

-   Cadastrar dados de uma pessoa (nome, CPF/CNPJ, tipo de pessoa).
    
-   Vincular endereços (`person_address`).
    
-   Gerenciar contatos (`contact`).
    

### Tabelas envolvidas:

# 

-   `person` (principal)
    
-   `address`
    
-   `person_address` (relacionamento pessoa ↔ endereço)
    
-   `contact`
    

### Models:

# 

-   `Person.php`
    
-   `Address.php`
    
-   `PersonAddress.php`
    
-   `Contact.php`
    

* * *

## 🧑‍💼 3. Clientes

# 

**Objetivo:** Representar as pessoas que são clientes do provedor.

### Responsabilidades:

# 

-   Transformar uma `person` em `customer`.
    
-   Ativar/suspender/cancelar clientes.
    
-   Vincular cliente a contratos.
    
-   Acessar dados de login (conta).
    

### Tabelas envolvidas:

# 

-   `customer` (principal)
    
-   `account` (login/senha/status)
    

### Models:

# 

-   `Customer.php`
    
-   `Account.php`
    

* * *

## 👨‍🔧 4. Funcionários

# 

**Objetivo:** Representar os colaboradores internos.

### Responsabilidades:

# 

-   Transformar uma `person` em `employee`.
    
-   Definir cargo (admin, suporte, técnico, financeiro).
    
-   Controlar status (ativo/inativo).
    

### Tabelas envolvidas:

# 

-   `employee` (principal)
    

### Models:

# 

-   `Employee.php`
    

* * *

## 📄 5. Contratos

# 

**Objetivo:** Gerenciar a relação entre clientes e os planos contratados.

### Responsabilidades:

# 

-   Criar contratos entre cliente e plano.
    
-   Definir início e fim.
    
-   Controlar status do contrato (ativo, suspenso, cancelado).
    
-   Relacionar com faturas.
    

### Tabelas envolvidas:

# 

-   `contract` (principal)
    
-   Relacionamentos:
    
    -   `customer`
        
    -   `plan`
        
    -   `invoice`
        

### Models:

# 

-   `Contract.php`
    

* * *

## 💳 6. Planos

# 

**Objetivo:** Definir e gerenciar os pacotes de internet oferecidos pelo provedor.

### Responsabilidades:

# 

-   Cadastrar planos (nome, velocidade de download/upload, franquia, preço).
    
-   Alterar preço ou configuração.
    
-   Exibir lista de planos disponíveis.
    

### Tabelas envolvidas:

# 

-   `plan`
    

### Models:

# 

-   `Plan.php`
    

* * *

## 🎫 7. Suporte (Tickets)

# 

**Objetivo:** Controlar chamados de clientes.

### Responsabilidades:

# 

-   Abrir chamado com categoria (instalação, manutenção, cobrança, cancelamento, técnico).
    
-   Definir prioridade (baixa, média, alta, crítica).
    
-   Alterar status (em aberto, em andamento, resolvido, cancelado).
    
-   Registrar quem atendeu.
    

### Tabelas envolvidas:

# 

-   `support_ticket`
    

### Models:

# 

-   `SupportTicket.php`
    

* * *

## 💰 8. Pagamentos

# 

**Objetivo:** Controlar faturas e pagamentos dos clientes.

### Responsabilidades:

# 

-   Gerar faturas para contratos.
    
-   Marcar faturas como pagas/pendentes/atrasadas.
    
-   Registrar pagamentos com método (PIX, cartão, boleto, débito automático).
    
-   Controlar histórico de transações.
    

### Tabelas envolvidas:

# 

-   `invoice` (faturas)
    
-   `payment` (pagamentos)
    

### Models:

# 

-   `Invoice.php`
    
-   `Payment.php`
    

* * *

# 🗂️ Estrutura de Responsabilidade

# 

| Módulo | Tabelas principais | O que faz |
| --- | --- | --- |
| **Equipamentos** | `equipment`, `customer_equipment` | Gerencia equipamentos e vincula a clientes |
| **Pessoas** | `person`, `address`, `contact` | Cadastro geral de pessoas, endereços e contatos |
| **Clientes** | `customer`, `account` | Representa pessoas como clientes e controla login/status |
| **Funcionários** | `employee` | Representa pessoas como funcionários e define cargos |
| **Contratos** | `contract` | Liga clientes aos planos, controla vigência e status |
| **Planos** | `plan` | Define pacotes de internet |
| **Suporte** | `support_ticket` | Gerencia chamados de clientes |
| **Pagamentos** | `invoice`, `payment` | Controla faturas, status e registros de pagamentos |