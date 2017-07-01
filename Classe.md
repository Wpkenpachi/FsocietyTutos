# O que é uma Classe?
Por muitas vezes vocês já devem ter ouvido falar delas... as classes.
Mas se você nunca conseguiu compreender esse conceito, vou tentar **AGORA**
te ensinar isso de forma simples!

_Vou apelar àqueles exemplos bem comuns como:_
### Primeiro Exemplo
Vamos usar um exemplo que é familiar ao termo classe...
Temos então as classes Mago e Humano.
Pequena descrição sobre ambos..

Humano: 

Características
- Raça Fraca => 200 de HP
- Capacidade de 5% de Cura.
- Tem baixo-medio dano bruto => 100 Dano 
- Mas é astuta pra construção de estruturas e Resistentes e engenharias que causam bastante dano => 600 Astúcia
- Mana 120

Habilidades comuns dos seres humanos:
- Construir
- Atacar
- Curar 

Magos: 

Características
- Raça Média => 400 de HP
- Capacidade de 50% de Cura.
- Tem baixo dano bruto => 50 Dano 
- São Habilidosos na arte da magia => 600 Magia
- Mana 200

Habilidades comuns dos magos:
- Invocar Magia
- Atacar
- Curar 

As classes podem possuir atributos/propriedades e também funções e métodos. No caso em questão as **características** de cada classe apresentada acima, seriam os atributos/propriedades e suas **habilidades comuns** seriam as funções/métodos. Então o exemplo feito em php ficaria assim:

### Classe de Humanos
```php
    <?php
    class Humano {
        // Atributos
        public $HP;
        public $CURA;
        public $DANO;
        public $ASTUCIA;

        function __construct(){
            $this->HP = 400;
            $this->CURA = 50;
            $this->DANO = 50;
            $this->ASTUCIA = 600;
        }

        // Funções/Métodos
        public function construir(){

        }

        public function atacar(){

        }

        public function curar(){

        }
    }
```

### Classe de Magos
```php
    class Mago { // Classe de Magos
        // Atributos
        public $HP;
        public $CURA;
        public $DANO;
        public $MAGIA;
        public $MANA;

        function __construct(){
            $this->HP = 400;
            $this->CURA = 50;
            $this->DANO = 50;
            $this->MAGIA = 600;
            $this->MANA = 200;
        }

        // Funções/Métodos
        public function invocarMagia(){

        }

        public function atacar(){

        }

        public function curar(){
            
        }
        
    }
```

Opa! Tem coisa não explicada aí nesse código em?!
Pois é... Temos alguns conceitos aí aplicados que vou explicar agora:

- `public`
    - A palavra chave public se trata da visibilidade
      que esta variável(propriedade) pode ter. Mas como assim?
      Isso quer dizer que essa variável vai poder ser acessada também
      fora dessa classe. Mas isso vocês vão entender quando eu falar sobre instanciamento de um objeto de classe.
      Saiba que também existem as palavras chaves private, e protected.
      Que não vou explicar agora...
- `__construct()`
    - O __construct() é também uma função da classe, só que a diferença entre
      ela e as outras funções é que: Ela é executada assim que um objeto dessa classe é instanciado. Mas como disse esse assunto de 'objeto' não é pra esse parágrafo. A nível de conhecimento saibam que existe também a função `__destruct()` que também é automaticamente chamada assim que as referências ao objeto dessa classe forem removidas ou quando este objeto é destruído (Desalocado). Foque em entender que estas são funções que estão automaticamente presentes em qualquer classe.
- `$this`
    - O $this é uma pseudo-variável que pode ser chamada, caso você esteja
      em um contexto de objeto. Trocando por palavras simples, é através dela
      que você vai poder acessar propriedades desta, ou de outras classes, ou chamar métodos e funções delas.


## Objeto de Classe
Agora sim vamos falar deles! Os objetos. Mas o que são? 
Os objetos são em palavras simples uma abstração única de uma classe.
Dentro de um objeto, vão todas as propriedades, e todos os métodos e funções descritos em sua classe. É a partir de objetos que você faz uso da classe, veja como fazemos pra instanciar um objeto de uma classe:

```php
    $objeto = new Homem;
```

Simples, não? Só utilizar a instrução `new` antes do nome da classe.
_PS_: As Classes têm de ser definidas antes de serem instanciadas.

Agora vamos voltar àquelas observações que deixei pra falar só depois que explicasse mais sobre objetos:

- `public`
    - Eu só posso ter acesso a atributos e métodos através do objeto, caso 
      eles estejam declarados como publicos (public). Então no caso do exemplo acima, eu poderia acessar todas as características e habilidades
      de um Humano, ou Mago da seguinte forma:
      ```php
        $objeto->HP -= 10; // Isso é equivalente a: $objeto->HP = $objeto->HP - 10
        $objeto->atacar(); // Chamando o método atacar.
      ```
- `$this`
    - O $this serve pra você ter acesso a atributos e métodos dentro da
      própria classe, segue o exemplo:
      ```php
      //{dentro da classe Mago...}
      public function invocarMagia(){
        $this->MANA -= 20; // Subtraindo 20 dos meus 200 de mana atuais.
        $this->curar();// chamando a função curar.
      }
      ```

Próxima postagem darei um exemplo de classe, com este mesmo tema (humanos e elfos), porém em um contexto diferente :D.