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
   - No navegador, digite: `http://localhost/starwars` (ajuste conforme o local onde o projeto foi salvo).

## Documentação da API
### Endpoints Utilizados
- O projeto consome dados da API pública: [SWAPI](https://www.swapi.tech/api/).

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
