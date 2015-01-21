# TestSuite
Module de suite de test pour Prestashop

1) Installez le module dans prestashop
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
