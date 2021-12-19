<div align="center">
  <img src="assets/readme/logo.png" height="296px">
  <p align="justify">
  ㅤㅤㅤDe forma a priorizar o direcionamento dos alunos das instituições de ensino técnico com relação à confecção do Trabalho de Conclusão de Curso, que será tratado a partir 
  deste ponto como TCC, o grupo RETEC decidiu implementar um sistema de armazenamento de dados, no qual consiste em registrar os TCC e artigos escritos por formandos na instituição, 
  com o objetivo de facilitar o encontro de informações pertinentes e relevantes aos respectivos cursos e, auxiliar os alunos na composição experimental e teórica de seus futuros 
  trabalhos. Duas pesquisas de campo foram realizadas, uma para docentes e outra para alunos, onde os dados acumulados mostraram que tanto os estudantes quanto os professores 
  não sabiam o destino dos artigos escritos e projetos desenvolvidos, ou seja, depois de apresentados para banca, estes trabalhos não eram mais encontrados. A composição do site 
  foi realizada através do uso de: PHP e MySQL para Integração ao banco de dados utilizando ambas as linguagens, a ferramenta PhpMyAdmin, JS para deixar o site dinâmico e 
  responsivo, HTML para confeccionar a base do site e CSS para estilizar os diversos elementos contidos na página. O sistema visa proporcionar uma base de dados mais acessível 
  para os estudantes, de tal forma com que realizar um TCC se torne uma tarefa mais simples, desde o direcionamento do tema à confecção do projeto.
  </p>
  <br><br>
  <p><b>Vídeo de Apresentação da Banca Final (14/12/2021)</b></p>
   <div align="center">
  <a href="https://www.youtube.com/watch?v=jvoo2uva3T0" target="_blank"><img src="https://img.youtube.com/vi/jvoo2uva3T0/0.jpg" alt="IMAGE ALT TEXT"></a>
  <br><br><br><br>
  <p><b>Vídeo de Apresentação da Plataforma ao Público</b></p>
   <div align="center">
  <a href="https://www.youtube.com/watch?v=3uqqjpHnQbg" target="_blank"><img src="https://img.youtube.com/vi/3uqqjpHnQbg/0.jpg" alt="IMAGE ALT TEXT"></a>
  <br><br><br>
  <h3>Membros do Grupo</h3>
  <a href="https://github.com/CaikRian" target="_blank">• Caik Rian Gadelha Vieira</a><br>
  <a href="https://github.com/GhustyyyOwO" target="_blank">• Gustavo Maglio Campos</a><br>
  <a href="https://github.com/JoaoLimaV" target="_blank">• Joõa Victor de Lima</a><br>
  <a href="https://github.com/Lisoba" target="_blank">• Leonardo Rodrigues dos Reis Lisboa</a><br>
  <a href="https://github.com/LeonardoSaes" target="_blank">• Leonardo Saes Dias Franco</a><br>
  <a href="https://github.com/leovasc5" target="_blank">• Leonardo Vasconcelos Paulino</a><br>
  <a href="" target="_blank">• Matheus Gustavo Martins Braga</a><br>
  <a href="https://github.com/Maxwell-Santos" target="_blank">• Maxwell Alves dos Santos</a><br>
  <br><br><br>
  <h3>Tutorial de Instalação</h3>
<table>
  <tr>
    <th>Requisitos</th>
    <th>Versão</th>
  </tr>
  <tr>
    <td>XAMPP Control Panel</td>
    <td>3.3.0 ou ></td>
  </tr>
  <tr>
    <td>PHP</td>
    <td>7.0 ou ></td>
  </tr>
  <tr>
    <td>MySQL</td>
    <td>8.0 ou ></td>
  </tr>
</table>
<br>
</div>

<div align="justify">
<p><b>1º Passo</b></p>

    
    • Faça o download do Xampp Control Panel e instale corretamente as ferramentas do PHP e do SQL
    • Clone ou baixe o repositório na pasta: "C:\xampp\htdocs"


<br><p><b>2º Passo</b></p>


     • Acesse "localhost/phpmyadmin" em seu navagador
     • Login: "root"
     • Não é necessária a senha caso você não a tenha configurada
     • Entre na plataforma



<br><p><b>3º Passo</b></p>


     • Clique em "Novo"
     • Nome da Base de Dados: "tcc"
     • Agrupamento (collation): "utf8mb4_general_ci"
     • Clique em "Criar"
     • Vá até a guia "SQL"
     • Escreva o seguinte código no campo: "SET GLOBAL max_allowed_packet=1073741824;"
     • Clique em "Executar"
     • Pronto, agora o PhpMyAdmin estará apto a aceitar base de dados mais pesadas
     • Vá até a guia "Importar"
     • Clique em "Escolher Arquivo"
     • Selecione: C:\xampp\htdocs\retec/tcc.sql
     • Clique em "Executar"

<br><p><b>Passo Final</b></p>

    
    • Acesse "localhost/retec" em seu navegador
    • Pronto, agora o RETEC está sendo executado corretamente em sua máquina!


</div>
