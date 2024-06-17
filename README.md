<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Serviço de Exportação de Arquivos no Laravel 11

Este repositório contém um exemplo de implementação de um serviço de exportação de arquivos nos formatos XML, XLSX, CSV e PDF utilizando o framework Laravel. A implementação utiliza o padrão Strategy para flexibilidade na escolha do formato de exportação.

Legia o guia com o passo a passo em: [Criando um Serviço de Exportação de Arquivos em XML, XLSX, CSV e PDF no Laravel 11](https://boliveiradev.medium.com/criando-um-servi%C3%A7o-de-exporta%C3%A7%C3%A3o-de-arquivos-em-xml-xlsx-csv-e-pdf-no-laravel-11-652ea2014a06)

### Funcionalidades Implementadas:

- Exportação para os formatos: XML, XLSX, CSV e PDF.
- Configuração do delimitador CSV para ponto e vírgula (;) no arquivo config/excel.php.
- Utilização dos pacotes:
    - Maatwebsite/Excel para exportação em XLSX e CSV.
    - Barryvdh/Laravel-DomPDF para exportação em PDF.
    - Spatie/Array-to-XML para exportação em XML.

### Estrutura do Projeto:

- app/Services: Contém as classes de serviço para exportação.
- app/Exports: Contém a classe genérica de exportação e classes específicas para cada formato.
- config/excel.php: Arquivo de configuração do pacote Maatwebsite Excel.
- config/exports.php: Arquivo de configuração com o mapeamento de classes para cada formato.
- resources/views/exports/pdf.blade.php: View Blade para exportação em PDF.
- app/Providers/ExportServiceProvider.php: Service Provider para registrar as estratégias de exportação.
- app/Http/Controllers/ExportController.php: Controller para gerenciar a exportação de dados.

### Instalação e Uso com Laravel Sail:

1. Clone este repositório:

```sh
git clone https://github.com/seu-usuario/nome-do-repositorio.git
cd nome-do-repositorio
```
2. Instale as dependências do Composer:

```sh
composer install
```

3. Copie o arquivo .env.example para .env e ajuste as configurações necessárias, como as credenciais do banco de dados e outras configurações específicas do seu ambiente.

4. Inicie os contêineres do Docker usando Laravel Sail:

```sh
./vendor/bin/sail up
```

Isso iniciará os contêineres do Docker necessários para executar a aplicação Laravel, incluindo PHP, MySQL, Redis, e outros serviços.

5. Acesse a aplicação no navegador:

```txt
http://localhost
```

### Criando um Link Simbólico para o Storage:

Para garantir que os arquivos exportados sejam acessíveis publicamente, execute o seguinte comando dentro do contêiner Laravel Sail:

```sh
./vendor/bin/sail artisan storage:link
```
Isso criará um link simbólico do diretório storage/app/public para public/storage, permitindo o acesso aos arquivos exportados.

### Contribuições:

Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests ou abrir issues relatando problemas ou sugestões.
