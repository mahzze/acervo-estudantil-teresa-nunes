#Acervo digital para materiais didáticos da etec teresa nunes<br>
---
Data de desenvolvimento: 22/09/2022 - 13/11/2022<br>

#### Como usar: <br>
1. Execute o *database.sql* em seu banco de dados MYSQL ou MARIADB. Este é o arquivo que cria o banco de dados e insere os valores da pasta *livros/*.
2. Crie um arquivo .env a raiz do projeto, onde sejam armazenados os valores que serão utilizados pela conexão mysqli. Por exemplo:<br>
```
MYSQLHOST="localhost"
MYSQLPASSWORD=""
MYSQLUSER="root"
MYSQLPORT="3306"
MYSQLDATABASE="acervo"
```
as variaveis devem ter nomes iguais aos do exemplo acima, porém os valores podem ser diferentes.
3. Baixe as dependencias com o composer (basta executar, na raiz do projeto: composer install).
4. Execute o projeto com o seu servidor php favorito.


##### Desenvolvido por: <br>
 ETEC Teresa Nunes, Secretariado (2020 - 2022) - ETIM<br>
- Gabriela Euzébio<br>
- Giovanna Verediano de Oliveira<br>
- Kathelyn Araujo Veras de Oliveira<br>
- Thayná Sousa<br>
<br>
 ETEC de Vila Formosa, Desenvolvimento de Sistemas (2020 - 2022) - ETIM<br>
- Matheus Souza Zanzin - programador<br>

