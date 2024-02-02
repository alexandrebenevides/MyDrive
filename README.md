# MyDrive

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-blueviolet.svg)](https://livewire.laravel.com/)
[![Sail](https://img.shields.io/badge/Sail-10.x-red.svg)](https://laravel.com/docs/10.x/sail/)

MyDrive é uma aplicação desenvolvida em Laravel 10, utilizando Laravel Livewire 3 para criar uma dashboard interativa que permite a integração e realizações de operações em um servidor MinIO.

## Pré-requisitos

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Composer](https://getcomposer.org/download/)

## Instalação e Configuração com Laravel Sail

1. Clone o repositório;
2. Vá até a pasta do projeto e execute os seguintes comandos:
```bash
composer install

./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate

./vendor/bin/sail artisan migrate
```

3. Acesse a aplicação em [http://localhost](http://localhost).

## Contribuições

Sinta-se à vontade para contribuir com melhorias ou correções de bugs. Abra uma issue para discutir novos recursos ou correções.

## Licença

Este projeto é licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para detalhes.
