
# PocketsLocationsPHP

Este projeto tem como objetivo exibir todas as reuniões de avivamento **Pockets** pelo Brasil. Ele foi desenvolvido para ser simples e eficiente, utilizando **PHP** para o backend e **MySQL** como banco de dados.

## 📋 Requisitos

Para configurar e rodar este projeto, você precisará de:

- **PHP** (versão 7.4 ou superior recomendada)
- Servidor web (como Apache ou Nginx)
- **MySQL** (ou MariaDB) para o banco de dados
- Extensão `PDO` habilitada no PHP

## 🚀 Instalação

1. Clone este repositório:
   ```bash
   git clone https://github.com/PedroOSilv/PocketsLocationsPHP.git
   cd PocketsLocationsPHP
   ```

2. Configure o banco de dados:
   - Crie um banco de dados no MySQL.
   - Importe o arquivo SQL fornecido (se houver) para criar as tabelas necessárias.

3. Atualize as credenciais do banco no arquivo de configuração (como `config.php`):
   ```php
   <?php
   $host = 'seu_host';
   $db = 'nome_do_banco';
   $user = 'usuario';
   $pass = 'senha';
   ```

4. Certifique-se de que o servidor web está apontando para o diretório correto.

5. Acesse o sistema no navegador.

## 📦 Funcionalidades

- Exibição de reuniões **Pockets** organizadas por localização.
- Integração com banco de dados para armazenar e recuperar informações em tempo real.

## 🛠️ Contribuindo

Este projeto é de propriedade do **Dunamis Movement**. Caso deseje contribuir, entre em contato com o responsável pelo código antes de submeter alterações.

## 📄 Licença

Este projeto é de uso interno e está sob propriedade do **Dunamis Movement**. Nenhuma redistribuição ou modificação sem autorização é permitida.
