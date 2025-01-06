# StarWars Informations

## Descrição
Este projeto utiliza a API pública [SWAPI](https://www.swapi.tech/api/) para exibir informações detalhadas sobre o universo Star Wars, incluindo filmes, personagens, planetas, naves e espécies. Foi desenvolvido utilizando PHP, JavaScript, HTML, CSS e MySQL.

## Requisitos
- **PHP**: Versão 7.4
- **XAMPP**: Para rodar o servidor local e o banco de dados MySQL
- **Navegador Web**: Para acessar o projeto

## Clonando o Repositório
1. Certifique-se de ter o **Git** instalado no seu computador. [Download Git](https://git-scm.com/)
2. Abra o terminal e execute o comando abaixo:
   ```bash
   git clone https://github.com/BrunoToniatti/starwars-api.git
   ```
3. Navegue até o diretório clonado:
   ```bash
   cd starwars-api
   ```

## Instalação
1. **Baixe e instale o XAMPP**:
   - [Download XAMPP](https://www.apachefriends.org/index.html)
  
2. **Configure o projeto**:
   - Salve os arquivos na pasta de hospedagem do XAMPP, por exemplo: `C:\xampp\htdocs\starwars`.

3. **Inicie o servidor**:
   - Abra o painel de controle do XAMPP.
   - Ative os serviços `Apache` e `MySQL`.

4. **Acesse o projeto**:
   - No navegador, digite: `http://localhost/starwars/Frontend` (ajuste conforme o local onde o projeto foi salvo).

## Documentação da API
### Como funciona?
- O Font-end (JavaScript) envia dois paramêtros `menu` e se necessário o `ID`
- O Back-end (PHP) Pega esses dados e monta a URL, fazendo isso ele tem acesso ao JSON da [SWAPI](https://www.swapi.tech/api/), ele pega os dados e retorna em Json para o Javascript pegar os valores e informar no front-end

### Como utilizar a API local:
#### Para utilizar a API local sera necessário passar pelo front-end o `menu` e o `id`, para que o back-end trate a requisição
- Segue código de exemplo:
```
filmId = 1
fetch(`http://localhost/starwars/backend/index.php/api/films?menu=films&id=${filmId}`)

```
Perceba que o menu informado é films e o ID é 1, logo a minha resposta do back-end será todas as informações do primeiro filme

### Endpoints Utilizados
- O projeto consome dados da API pública: [SWAPI](https://www.swapi.tech/api/).

1. *FILMES* 

- **/films** - Retorna todos os filmes
- **/films/{id}** - Retorna as informações do filme

2. *PERSONAGENS*

- **/people** - Retorna os personagens
- **/people/{id}** - Retorna as informações do personagem

3. *NAVES*

- **/starship** - Retorna todas as naves dos filmes
- **/starship/{id}** - Retorna as informações da nava

4. *ESPÉCIES*

- **/species** - Retorna todas as especies dos filmes
- **/species/{id}** - Retorna as informações da espécie

5. *PLANETAS* 

- **/planets** - Retorna todos os planetas dos filmes
- **/planets/{id}** - Retorna as informações dos planetas 


### Métodos HTTP
- Apenas `GET` é utilizado para recuperar informações.

### Exemplo de Requisição
**Endpoint:** `https://www.swapi.tech/api/people/1`

**Resposta:**
```json
{
  "message": "ok",
  "result": {
    "properties": {
      "height": "172",
      "mass": "77",
      "hair_color": "blond",
      "skin_color": "fair",
      "eye_color": "blue",
      "birth_year": "19BBY",
      "gender": "male",
      "created": "2025-01-06T01:13:23.562Z",
      "edited": "2025-01-06T01:13:23.562Z",
      "name": "Luke Skywalker",
      "homeworld": "https://www.swapi.tech/api/planets/1",
      "url": "https://www.swapi.tech/api/people/1"
    },
    "description": "A person within the Star Wars universe",
    "_id": "5f63a36eee9fd7000499be42",
    "uid": "1",
    "__v": 0
  }
}
```

## Melhorias Implementadas
1. **Adição de Listas Detalhadas**:
   - Cada filme agora exibe listas de planetas, naves e espécies relacionadas, além das informações dos personagens.

2. **Navegação Interativa**:
   - Ao clicar em um personagem, nave, espécie ou planeta, uma nova página é aberta exibindo detalhes específicos sobre o item selecionado.

## Pontos Fortes
- Funcionalidades adicionais que superam o escopo do teste inicial.
- Estrutura preparada para futuras melhorias.

## Observações
Este projeto é uma demonstração das capacidades de integração com APIs públicas, com foco em funcionalidade e interatividade.

---

Desenvolvido com 💻 por Bruno Toniatti.
