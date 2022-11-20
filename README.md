
<div align="center">
  <img style="margin-bottom: 40px" src="https://user-images.githubusercontent.com/60266964/162435563-436fa05e-7e66-4419-8811-81ab90d758fa.png" width="300px">
</div>

</br>

<div align="center">
  <img src="http://img.shields.io/static/v1?label=STATUS&message=Finalizado&color=BLUE&style=for-the-badge"/>
</div>

##  

<div align="justify">

<p>O Exitus é um Sistema de Gestão Escolar, que foi desenvolvido durante o ano de 2021 para o TCC da minha equipe no curso de Técnico de Informática pelo CETEPI-I da cidade de Paulo Afonso-BA.</p>
  
<p>O presente projeto visou a criação de uma aplicação web composta por 3 portais que são voltados para os gestores da escola, os docentes e os alunos.</p> 
  
<img src="https://user-images.githubusercontent.com/60266964/173249538-4ba03e49-3891-4096-b5ab-2ada87c7c629.png">
  
<br>
  
### Problema que originou a criação do projeto
  
<p>Como alunos do estado da Bahia, nós tínhamos à nossa disposição o Sistema de Gestão Escolar da Bahia (SGE). Contudo, esse sistema apenas fornecia o boletim do ano letivo, e infelizmente, muitas vezes nem tinha todas nossas notas. Tendo em vista essa baixa disponibilidade de dados, resolvemos criar uma aplicação semelhante ao SGE da Bahia, onde o aluno pudesse ter acesso a todos os dados vinculados a ele, ou seja: notas de avaliações, faltas, médias gerais, avisos da turma, rematrícula, entre outros.</p>
  
## Demonstração da Aplicação
  
<p>Como o projeto possui diversas funcionalidades, não vai ser possível falar sobre todas, por isso, logo abaixo, disponibilizamos um link para um vídeo do YouTube em que demonstramos de forma breve cada uma delas. Além disso, nos arquivos do projeto, existe o documento final do nosso TCC, nele também é descrito de forma detalhada cada funcionalidade integrada ao Exitus.</p>
  
[Demostração do projeto no YouTube](https://www.youtube.com/watch?v=MFScHaBRtDw&t=1984s)
  
### Algumas imagens do projeto
  
 <br>
  
<img src="https://user-images.githubusercontent.com/60266964/173252157-41a78e83-065d-4c35-ae1d-fc2666032c1c.png">
  <div align="center">:camera: Tela de home do portal do administrador</div>
<br>
  
<img src="https://user-images.githubusercontent.com/60266964/173254378-7276fa10-fc50-43f9-a51a-976c21ee3a09.png">
  <div align="center">:camera: Tela de gestão geral do portal do administrador</div>
<br>
  
<img src="https://user-images.githubusercontent.com/60266964/173254726-8af29902-6ebb-4df8-9aa9-ad65b2bc00be.png">
  <div align="center">:camera: Tela do painel de uma turma no portal do administrador</div>
<br>
  
<img src="https://user-images.githubusercontent.com/60266964/173254940-c242f627-ba81-4894-bf13-7d1ec61bdd34.png">
  <div align="center">:camera: Tela do perfil do aluno no portal do administrador</div>
<br>
  
<img src="https://user-images.githubusercontent.com/60266964/173255127-30f04552-e6d5-43eb-9c2a-ec9fecd318e4.png">
  <div align="center">:camera: Tela de home do portal do docente</div>
<br>
  
<img src="https://user-images.githubusercontent.com/60266964/173255293-91bbeff7-014c-4fac-9594-7294afd259dc.png">
  <div align="center">:camera: Tela de home do portal do aluno</div>
<br>
  
## Tecnologias utilizadas
  
<code><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" width="40" height="40"/></code> <code><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" width="40" height="40"/></code> <code><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" width="40" height="40" /></code>
<code><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="40" height="40" /></code>
<code><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" width="50" height="50" /></code>
<code><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" width="40" height="40" /></code>
<code><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg" width="50" height="50" /></code>

  
## Acesso ao Projeto

Para testar o projeto no seu computador, primeiramente você deve realizar o seu download a partir dessa página.
Com o projeto baixado o próximo passo é criar a base de dados do sistema no phpMyAdmin, o comando de criação do BD segue abaixo:

```sh
CREATE DATABASE Exitus;
```

> Obs: Lembrando que caso você deseje criar o banco de dados pelo Workbench, ou utilizar um nome diferente no BD, só é necessário mudar as pré-definições do aqruivo "Connection.php".

Após a criação do banco de dados é necessário criar também as tabelas, para isso copie o conjunto de código no arquivo database_creation_script.sql e execute-o.

Com as tabelas criadas, é necessário adicionar alguns dados iniciais, para isso, execute os códigos presente no arquivo initial_data_insertion_script.sql

Agora você já pode acessar a aplicação atráves do seu navegador com a url localhost, seguido da porta onde seu servidor web está rodando, no exemplo abaixo como o meu XAMPP estava na porta 8000, a url ficou a seguinte:

```sh
http://localhost:8000
```

O primeiro portal que você deve acessar é o portal do admin, nele você irá configurar a sua escola. O usuário e o código de acesso para o primeiro acesso estão abaixo:

| Usuário | Código de acesso |
| ------ | ------ |
| Usuário Padrão | 867532 |

Caso você deseje conhecer como funciona cada componente do sistema dentro da pasta de download há o PDF da documentação do TCC da nossa equipe, nele está a explição de cada componente do Exitus.
  
  
## Autores
  
João Pedro Rodrigues Souza e Matheus de Souza Barbosa











