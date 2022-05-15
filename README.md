
<div align="center">
  <img src="https://user-images.githubusercontent.com/60266964/162435563-436fa05e-7e66-4419-8811-81ab90d758fa.png" width="300px">
</div>

<br>

Exitus propõe tornar disponível um sistema de gestão escolar online em função dos gestores, docentes e alunos, ou seja, das escolas.

<div align="justify">
  E como objetivo geral buscamos aumentar a disponibilidade dos dados referente aos alunos, mediante o uso do nosso sistema de gestão escolar, isto é, a ideia que    originou a criação do Exitus surgiu justamente após uma análise do SGE da Bahia, que levando em consideração a disponibilidade dos dados em seu sistema, percebemos algumas limitações que prejudicava a experiência de uso dos alunos. Bem como, levando em consideração o meio de acesso ao SGE, percebemos que não era possível acessa-lo em todos os tipos de dispositivos.
Então, a partir das limitações levantadas após essa análise, projetamos o Exitus para que as limitações de então fossem sanadas e podemos constatar essa ideia analisando os nossos objetivos específicos que são:
 </div>
 <br>

- Possibilitar que os gestores possam gerenciar os principais componentes de uma escola de forma online
- Possibilitar que os docentes possam gerenciar as avaliações com mais praticidade
- Possibilitar que os alunos possam acessar seus dados escolares facilmente;
- Possibilitar que o sistema seja acessado em qualquer dispositivo;
- Simplificar o processo de rematrícula na escola;

## Instalação

Para testar o projeto no seu computador primeiro você deve realizar o seu download a partir dessa página.
Com o projeto baixado o próximo passo e criar a base de dados do sistema no phpMyAdmin, o comando de criação do BD segue abaixo:

```sh
CREATE DATABASE Exitus;
```

<br>

> Obs: Lembrando que caso você deseje criar o banco de dados pelo Workbench, ou utilizar um nome diferente no BD só e preciso mudar as pré-definições do aqruivo "Connection.php".

Após a criação do banco de dados e necessário criar também as tabelas, para isso copie o conjunto de código no arquivo database_creation_script.sql e execute.

Com as tabelas criadas, e necessário adicionar alguns dados iniciais, para isso, execute os códigos presente no arquivo initial_data_insertion_script.sql

Agora você já pode acessar a aplicação atráves do seu navegador com a url localhost, seguido da porta onde seu servidor web está rodando, no exemplo abaixo como o meu XAMPP estava na porta 8000, a url ficou a seguinte:

```sh
http://localhost:8000
```

O primeiro portal que você deve acessar e o portal do admin, nele você irá configurar a sua escolar. O usuário e o código de acesso para o primeiro acesso estão abaixo:

| Usuário | Código de acesso |
| ------ | ------ |
| Usuário Padrão | 867532 |

Caso você deseje conhecer como funciona cada componente do sistema dentro da pasta de download há o PDF da documentação do TCC da nossa equipe, nele esta há a explição de cada componente do Exitus.

> Obs: Na pasta img dentro de public/assets existem três pastas, são elas: adminProfilePhotos | teacherProfilePhotos | studentProfilePhotos . Quando você baixar o projeto você irá notar que já existem algumas fotos dentro dessa pasta, então elimine as mesmas, menos a "foto-vazia.jpg".  

O Exitus foi desenvolvido por Everton Andrade, João Pedro e Matheus de Souza, Exs alunos do CETEPI-I da cidade de Paulo Afonso. 







