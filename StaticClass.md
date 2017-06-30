# Acessando Métodos não estáticos, a partir de um método estático.

Sabe-se que em PHP, não se pode usar o `$this` dentro de métodos estáticos. E que também ao acessar um método estático,
o construtor não é executado.
Então, utiliza-se muito de um _hack method_ pra que não seja necessário instanciar a classe pra utilizar-se dos outros métodos não estáticos. Segue um exemplo:

### Método normal:
Acessando de forma normal, classes não estáticas:

```php
    <?php
    class Banco {//
        private static $Conn;

        function __construct(){
            self::$Conn = new PDO('mysql:host=localhost;dbname=meuDb', 'root', '');
        }

        public function consulta($queryString){
            $stmt = self::$Conn->prepare($queryString);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }//

    {// Executando a consulta
        $db = new Banco;//Instanciando um objeto da classe Banco
        $dadosRetornados = $db->consulta("SELECT * FROM produtos");// Utilizando o método consulta, a partir do objeto criado.
    }
```
O que acontece aqui é o seguinte... 
Temos uma classe que faz consulta no banco de dados
e por padrão, temos de instanciar um objeto dessa classe
pra que possamos utilizar de seus métodos de consulta.

## Acessando pelo hack method
Acessando metodo sem ter que instanciar classes:

```php
    <?php
    class Banco {//
        private static $Conn;
        private static $Instance;
        function __construct(){
            self::$Conn = new PDO('mysql:host=localhost;dbname=meuDb', 'root', '');
        }

        public static function run(){
            if(is_null(self::$Instance)){
                self::$Instance = new self();
            }

            return self::$Instance;
        }

        public function consulta($queryString){
            $stmt = self::$Conn->prepare($queryString);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }//

    {// Executando a consulta
        $db = Banco::run()->consulta("SELECT * FROM produtos");
    }
```
O que acontece no código acima é:
Criamos um método estático, que retorna uma instância de objeto
da própria classe. Ou seja, ao invés de termos de instanciar a classe por nós mesmos, esse método estática  (Que lembrando, pode ser acessada sem que um objeto dessa classe seja instanciado anteriormente por ser `static`) faz isso por nós.