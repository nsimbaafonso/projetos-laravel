# Laravel 13 – Prática e Aprendizagem

Repositório dedicado à prática e consolidação de conhecimentos em Laravel 13, através de pequenos projetos e exercícios desenvolvidos para compreender os principais recursos do framework.

## Tecnologias utilizadas

- PHP 8.3+
- Laravel 13
- MySQL (quando necessário)
- Blade
- HTML5 e CSS3
- Bootstrap 5
- Composer
- APIs externas

## Projetos e exercícios

- **Saudação:** apresentação de mensagens dinâmicas.
- **Gerador de QR Code:** criação de códigos QR a partir de textos ou links.
- **Gerador de cores:** geração e apresentação de cores aleatórias.
- **Fatorial:** cálculo do fatorial de um número.
- **Equação do segundo grau:** resolução de equações através da fórmula resolvente.
- **Consumo de APIs:** realização de requisições e apresentação de dados externos.
- **Validações:** validação de dados recebidos através de formulários.

## Conceitos praticados

- Criação e configuração de projetos Laravel.
- Rotas e parâmetros.
- Controllers.
- Views com Blade.
- Envio e processamento de formulários.
- Validação de dados.
- Tratamento de erros e exceções.
- Redirecionamentos e mensagens de sessão.
- Consumo de APIs externas.
- Organização de ficheiros e código.
- Utilização do Artisan.

## Executar localmente

**Requisitos:**
- PHP 8.3 ou superior.
- Composer.
- Laravel 13.
- Node.js e NPM (quando necessário).

**1. Clonar o repositório**

```bash
git clone https://github.com/SEU-USUARIO/projetos-laravel.git
```

**2. Entrar na pasta**

```bash
cd laravel-pratica
```

**3. Instalar dependências**

```bash
composer install
```

**4. Configurar o ambiente**

```bash
cp .env.example .env
php artisan key:generate
```

Configure as variáveis de ambiente no ficheiro `.env`, caso o projeto utilize uma base de dados ou outros serviços.

**5. Executar a aplicação**

```bash
php artisan serve
```

Aceda através de:

```text
http://127.0.0.1:8000
```

## Objetivo

Praticar Laravel 13 através de exercícios progressivos, desenvolver a lógica de programação e ganhar experiência na construção de aplicações web com PHP moderno.

## Autor

**Nsimba Afonso**