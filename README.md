# Sistema de Gerenciamento de Séries

Este projeto é um sistema desenvolvido em **Laravel**, com o front-end utilizando **Blade** e **Bootstrap**, para gerenciamento de séries, temporadas e episódios. Ele permite aos usuários realizar as seguintes ações:

- **Séries**: incluir, listar, editar nome e deletar.
- **Temporadas**: incluir e listar.
- **Episódios**: incluir e marcar como assistidos.

## Funcionalidades Principais

### Gerenciamento de Séries e Episódios
- Cadastro de novas séries com upload de imagem (capa).
- Listagem de séries, incluindo informações sobre temporadas e episódios.
- Exibição do número de episódios assistidos.
- Edição e exclusão de séries.
- Marcar/desmarcar episódios como assistidos.

### Autenticação
- Controle de acesso com autenticação de usuários.
- Registro, login e gerenciamento de sessão.

### Mensageria e Notificações
- Envio de e-mails transacionais para notificar sobre ações no sistema.
- Utilização de filas para processamento assíncrono de mensagens.

### Padrões de Desenvolvimento
- Implementação do padrão **Repository** para separação da lógica de negócios e acesso à base de dados.
- Uso de **Service Providers** para abstrações e configurações.

### Upload de Arquivos
- Suporte ao upload de arquivos de imagem para capa das séries.
- Validação e armazenamento seguro das imagens.

## Tecnologias Utilizadas

### Back-End
- **Laravel**: Framework PHP para desenvolvimento web.
- **Eloquent ORM**: Para interação com o banco de dados.
- **Filas e Jobs**: Para processamento assíncrono.

### Front-End
- **Blade**: Engine de templates do Laravel.
- **Bootstrap**: Framework CSS para estilização responsiva.

### Outros
- **Mailtrap**: Para testes de envio de e-mails.
- **SQLite**: Banco de dados em memória para desenvolvimento.

## Instalação e Configuração

1. Clone o repositório:

```bash
git clone <https://github.com/halangbacca/laravel-alura.git>
cd <controle-series>
```

2. Instale as dependências:

```bash
composer install
npm install
```

3. Configure o arquivo `.env`:

```bash
cp .env.example .env
php artisan key:generate
```

- Configure o banco de dados no `.env`.

4. Execute as migrações e seeders:

```bash
php artisan migrate
```

5. Inicie o servidor:

```bash
php artisan serve
```

6. Acesse o sistema em `http://localhost:8000`.

## Testes

Para executar os testes do projeto:

```bash
php artisan test
```

## Estrutura do Projeto

- `app/Models`: Modelos Eloquent para séries, temporadas e episódios.
- `app/Repositories`: Implementações do padrão Repository.
- `app/Providers`: Configurações e abstrações do sistema.
- `resources/views`: Templates Blade para o front-end.
- `public`: Arquivos estáticos como imagens e CSS compilado.
