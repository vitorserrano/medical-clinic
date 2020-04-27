<h1 align="center" color="#F50057"> 
    Medical Clinic
</h1>

# Índice

- [Sobre](#-sobre)
- [Tecnologias utilizadas](#-tecnologias-utilizadas)
- [Funcionalidades](#-funcionalidades)
- [Como usar](#-como-usar)
- [Como contribuir](#-como-contribuir)

## :bookmark: Sobre 

- Este repositório é um CRUD feito em PHP com a utilização do Framework Laravel.

- A idéia do projeto foi apresentada em um trabalho da faculdade, onde era necessário desenvolver um <b>software para agentamento de consultas médicas.</b>

## :rocket: Tecnologias Utilizadas

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [Laravel/UI](https://laravel.com/docs/7.x/frontend)
- [DOMPDF](https://github.com/barryvdh/laravel-dompdf)

## :page_facing_up: Funcionalidades

- Login/Logout com Autenticação.
- Cadastro, Edição, Visualização e Remoção (CRUD):
  - Usuários
  - Consultas
  - Pacientes
  - Médicos
  - Especialidades
- Relatório PDF: 
  - Consultas
  - Pacientes
  - Médicos
  - Especialidades

## :fire: Como usar

- Clone esse repositório: `git clone https://github.com/vitorserrano/medical-clinic.git`
- Instale as dependências: `composer install` 
- Crie o Banco de Dados:
  - Nome: `medical`
  - Colação: `utf8mb4_unicode_ci`
- Execute as migrations do Banco de Dados: `php artisan migrate`
- Start a aplicação: `php artisan serve`

## :recycle: Como contribuir

- Faça um Fork desse repositório,
- Crie uma branch com a sua feature: `git checkout -b my-feature`
- Commit suas mudanças: `git commit -m 'feat: My new feature'`
- Push a sua branch: `git push origin my-feature`

## :memo: License

Esse projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
