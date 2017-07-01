# O que são Classes 2 parte

Vimos o primeiro exemplo , e aquele foi um exemplo mais simples
de se ver como uma classe, mas agora vamos expandir possibilidades com um exemplo que de primeira pode não parecer a cara do conceito classe, mas a partir desse exemplo você vai imaginar a possibilidade de utilizar-se desse conceito pra várias outras coisas. E não só especificamente para objetos, como foi o último exemplo.

## Segundo Exemplo

Vamos criar uma classe mediadora, que vai aplicar os danos entre os objetos das classes constrídas anteiormente
 ([se quiser dar uma olhada nelas antes de continuar, aqui estão](Classe.md)).

```php
<?php

class Controlador{

    public function aplicandoDano(&$atacante, &$alvo){
        $alvo->HP -= $atacante->DANO;
        echo "Um ser da classe ".get_class($atacante). " aplicou {$atacante->DANO} de dano em um inimigo da classe ".get_class($alvo)."(HP {$alvo->HP})\n";
    }


}
```
Então vamos fazer esse ataque acontecer..
```php
class Humano{...}// Aqui teríamos toda aquela classe Humano
class Mago {...}// Aqui teríamos toda aquela classe Mago
class Controlador{...}// Aqui teríamos toda a classe Controlador

$humano = new Humano;
$mago = new Mago;
$controlador = new Controlador;
$controlador->aplicandoDano($humano, $mago);
$controlador->aplicandoDano($humano, $mago);
/* A saída disso será:
Um ser da classe Humano aplicou 50 de dano em um inimigo da classe Mago(HP 350)
Um ser da classe Humano aplicou 50 de dano em um inimigo da classe Mago(HP 300)
*/
```
_OBS_: SIM! as classes precisam estar no mesmo arquivo, e o instanciamento dos objetos logo abaixo delas. Obviamente que só fiz dessa forma pq é pra estudo. Normalmente se separa cada classe em um arquivo diferente, e utiliza-se do include ou namespaces utilizando-se de convenções como psr-0/psr-4 pra lidar com classes.

**OPA!**: De novo mano! Você pos umas coisas não explicadas ali... Ok kk' vamos colocà-las em evidência agora mesmo!

- `&`
    - O '&' é utilizado antes de uma variável, pra dizer que    queremos obter a referência dela. Nesse caso específico utilizei dele, pra que eu pudesse influenciar _DIRETAMENTE_   nas variáveis internas de cada classe. Se eu não colocasse &, os objetos das classes não sofreriam as mudanças de diminuição de HP. Trocando em palavras simples, usei o '&' pra modificar os valores do Objeto, e não copiar o valor deles: 
    ```php
        $a = 1;
        $b = $a;
        $a = 3;
        echo $b;
        // Aqui b ainda tem o valor de 1, pq apenas copiou
        // o valor de a
    ```
    Entretanto..
    ```php
        $a = 1;
        $b = &$a;
        $a = 3;
        echo $b;
        // Aqui b passa a valer 3, pq ele passa a ter
        // o mesmo endereço de memória que a, logo
        // qualquer um que vc modifique vai afetar ambos!
    ```

- `get_class()`
    - O get_class é uma classe usada pra obter o nome da classe
      a qual um objeto pertence. Utilizei dela só pra pegar de forma dinâmica o nome das classes as quais os objetos pertenciam, e formar a _string_(texto) de saída.