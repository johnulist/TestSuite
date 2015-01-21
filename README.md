# TestSuite
Module de suite de test pour Prestashop
Basé sur SimpleTest pour php http://www.simpletest.org/

1) Installez le module dans prestashop<br/>
2) Creez votre classe de test dans le dossier test du module

```php
<?php

class MyTest extends WebTestCase {

    function __construct() {
        parent::__construct('My First Tests');
    }

} 
```

3) Ajoutez y une methode de test
```php
    function testSomething(){
        $this->assertTrue(true);
    }

```

4) Ajoutez votre classe à TestDef.php
```php
require_once(dirname(__FILE__) . '/MyTest.php'); // l'include qui va bien

        function __construct() {
        parent::__construct('All test');
        $this->add(new MyTest()); // une instance de la classe de test
    }

```

5) Executez les tests depuis le BO de prestashop
BO->Parametres Avancés->TestSuite->Run Tests
