<h1>Sistema de login com PHP</h1>
<p>Coloquei em prática os conhecimentos adquiridos na linguagem nesse sistema de cadastro e login</p>

<h2>Segurança</h2>
<p>Foi utilizado</p>
<ul>
  <li>PDO</li>
  <li>Sessões</li>
  <li>Filtragem de inputs</li>
</ul>

<h2>Como ver o projeto</h2>

<ol>
  <li>Baixe o <a href="www.apachefriends.org/pt_br/download.html">XAMPP</a> ou utilize alguma solução para rodar o Apache e MySQL</li>
  <li>Clone o repositório na pasta da sua localhost (htdocs) para XAMPP</li>
  <pre>git clone https://github.com/pedromakaveli/sistema-login.git</pre>
  <li>Ligue o Apache e o MySQL no XAMPP</li>
  <li>Crie um bando de dados no <b>PhpMyAdmin</b> nomeando como "cadastro_formulario"</li>
  <pre>Acesse: localhost/phpmyadmin</pre>
  <pre>CREATE DATABASE cadastro_formulario; //execute</pre>
  <li>Crie uma tabela nomeada como "usuarios"</li>
  <pre>1. USE cadastro_formulario; // execute </pre>
  <pre>2. CREATE TABLE usuarios(
    nome VARCHAR(200),
    email VARCHAR(100),
    cidade VARCHAR(50),
    estado VARCHAR(30),
    senha VARCHAR(40)
  ); // execute </pre>
  <li>Acesse localhost/sistema-login</li>
</ol>

<h2>Colaboradores</h2>

<a href="www.github.com/guihkx"><img width="130px" src="https://avatars.githubusercontent.com/u/626206?v=4"/></a>
<br />
<span><a href="www.github.com/guihkx">@Guihkx</a></span>
