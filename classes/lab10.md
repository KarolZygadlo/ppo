## Refleksje 

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei refleksji,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań na ocenę.

### Wprowadzenie do refleksji

Refleksja to zdolność programu do dostępu i modyfikowania własnej struktury i zachowania podczas wykonania. Na przykład, program może używać refleksji do uzyskiwania informacji o klasach, metodach, polach i adnotacjach swoich obiektów, oraz do ich dynamicznego wywoływania lub zmiany. Refleksja może być również używana do tworzenia nowych obiektów, ładowania nowych klas lub modyfikowania istniejących.

#### Jak używać refleksji?

Różne języki mają różne sposoby wspierania refleksji, ale zazwyczaj oferują wbudowane klasy lub biblioteki, które pozwalają programowi wchodzić w interakcję z własnym kodem. Na przykład w Javie, pakiet java.lang.reflect zawiera klasy takie jak Class, Method, Field i Constructor, które reprezentują elementy klasy lub obiektu. Te klasy mają metody, które mogą być używane do pobierania lub ustawiania ich właściwości, wywoływania ich lub tworzenia nowych instancji. W Pythonie, moduł inspect dostarcza funkcji i obiektów, które pomagają w inspekcji kodu i obiektów programu.

#### Dlaczego czasami warto używać refleksji?

Jednym z głównych powodów używania refleksji w OOP jest ułatwienie testowania i debugowania. Refleksja może pomóc w tworzeniu przypadków testowych, obiektów mockujących lub stubów, które symulują zachowanie innych klas lub obiektów. Refleksja może również pomóc w inspekcji stanu i zachowania programu w czasie rzeczywistym oraz w znajdowaniu lub naprawianiu błędów lub usterek. Na przykład, refleksja może być używana do dostępu do prywatnych lub chronionych pól lub metod, które zwykle są ukryte przed światem zewnętrznym, lub do iniekcji zależności lub modyfikowania konfiguracji bez zmiany kodu źródłowego.

#### Jakie są korzyści wykorzystania refleksji?

Refleksja w OOP oferuje szereg zalet, które mogą ułatwić proces rozwoju i uczynić go bardziej elastycznym. Umożliwia dynamiczne programowanie, gdzie program może dostosować się do swojego otoczenia, oraz wspiera ponowne użycie kodu i rozszerzalność. Ponadto, pozwala na metaprogramowanie, gdzie program może generować lub modyfikować swój własny kod w czasie rzeczywistym. Refleksja upraszcza również testowanie i debugowanie, pozwalając programowi na dostęp lub manipulowanie własnym kodem lub obiektami bez polegania na zewnętrznych narzędziach czy bibliotekach.

#### Jakie są wady z wykorzystania refleksji?

Refleksja ma pewne wady, które mogą wpływać na wydajność, bezpieczeństwo i czytelność programu. Ponadto może zmniejszyć efektywność i szybkość programu z powodu dodatkowego obciążenia i złożoności, jaką pociąga za sobą. Dodatkowo, łamie zasady enkapsulacji i abstrakcji OOP, ponieważ eksponuje wewnętrzne szczegóły i implementację klas lub obiektów oraz pozwala na ich dowolną zmianę. Ponadto, refleksja zwiększa ryzyko błędów lub usterek, ponieważ może obejść mechanizmy kontroli typów i obsługi błędów kompilatorów lub interpreterów, prowadząc do nieoczekiwanych lub niepożądanych zachowań lub efektów ubocznych. Wreszcie, komplikuje utrzymanie i dokumentację programów, ponieważ może sprawić, że kod będzie mniej jasny i zrozumiały, co utrudnia śledzenie lub debugowanie.

#### O czym należy pamiętać?

Refleksja w programowaniu obiektowym to potężna i wszechstronna funkcja, ale powinna być używana z rozwagą i ostrożnością. Nie powinna być stosowana jako substytut dobrego projektowania i praktyk programowania, ale raczej jako uzupełnienie lub ostateczność. Refleksja powinna być stosowana tylko wtedy, gdy istnieje wyraźny i przekonujący cel, oraz gdy nie ma bardziej odpowiedniej lub prostszej alternatywy. Dodatkowo, refleksja powinna być używana oszczędnie i ostrożnie, unikając zbędnego lub nadmiernego jej wykorzystania. Podczas korzystania z refleksji ważne jest przestrzeganie pewnych najlepszych praktyk, takich jak używanie jej tylko do konkretnych, dobrze zdefiniowanych zadań; ograniczanie jej użycia do minimalnej ilości i zakresu kodu lub obiektów, które są konieczne; stosowanie jej zgodnie z jej przeznaczeniem i kontekstem; oraz upewnienie się, że jest dokumentowana i testowana przed użyciem, aby jej funkcjonalność i efekty były wyjaśnione i zweryfikowane.

### Przykłady 

#### Przykład 1

Klasa `Calculator` zawiera prywatną metodę `multiply`, która mnoży dwie liczby. Chcemy przetestować tę metodę bez zmiany jej widoczności.

```php
class Calculator {
    private function multiply($a, $b) {
        return $a * $b;
    }
}
```

```php
class CalculatorTest extends PHPUnit\Framework\TestCase {
    public function testMultiply() {
        $calculator = new Calculator();
        $reflector = new ReflectionClass($Calculator);
        $method = $reflector->getMethod('multiply');
        $method->setAccessible(true);

        $result = $method->invoke($calculator, 5, 3);
        $this->assertEquals(15, $result);
    }
}
```

Test używa refleksji do uzyskania dostępu do prywatnej metody `multiply` w klasie `Calculator`. Następnie wywołuje tę metodę z argumentami (5, 3) i sprawdza, czy wynik mnożenia jest zgodny z oczekiwaniami.

#### Przykład 2

Klasa `User` przechowuje chronioną właściwość `age`. Chcemy przetestować, czy możemy zmienić i odczytać tę właściwość za pomocą refleksji.

```php
class User {
    protected $age;

    public function setAge($age) {
        $this->age = $age;
    }
}
```

```php
class UserTest extends PHPUnit\Framework\TestCase {
    public function testAgeProperty() {
        $user = new User();
        $reflector = new ReflectionClass($user);
        $property = $reflector->getProperty('age');
        $property->setAccessible(true);

        $property->setValue($user, 25);
        $this->assertEquals(25, $property->getValue($user));
    }
}
```

Test używa refleksji do uzyskania dostępu do chronionej właściwości `age` w klasie `User`. Następnie ustawia tę właściwość na wartość 25 i sprawdza, czy wartość została poprawnie zapisana i odczytana.

#### Przykład 3

Mamy kontroler `OrderController` w aplikacji e-commerce, który zawiera prywatną metodę `calculateDiscount`. Metoda ta oblicza zniżkę na podstawie różnych czynników i jest kluczowa dla logiki biznesowej, ale nie jest eksponowana publicznie.

```php
class OrderController {
    // ...

    private function calculateDiscount($order) {
        // Skomplikowana logika obliczania zniżki
        return $calculatedDiscount;
    }

    public function finalizeOrder($order) {
        // ...
        $discount = $this->calculateDiscount($order);
        // ...
    }
}
```

```php
class OrderControllerTest extends PHPUnit\Framework\TestCase {
    public function testCalculateDiscount() {
        $orderController = new OrderController();
        $reflector = new ReflectionClass($orderController);
        $method = $reflector->getMethod('calculateDiscount');
        $method->setAccessible(true);

        $order = new Order(/* parametry zamówienia */);
        $discount = $method->invoke($orderController, $order);
        
        // Sprawdzenie poprawności obliczonej zniżki
        $this->assertEquals($expectedDiscount, $discount);
    }
}
```

Test sprawdza poprawność działania metody `calculateDiscount`. Refleksja pozwala na bezpośrednie wywołanie tej metody z testowanym zamówieniem i porównanie wyniku z oczekiwaną wartością zniżki.

#### Przykład 4

Mamy klasę `DatabaseConnection` implementującą wzorzec Singleton, z prywatną metodą `initializeConnection`, która jest wywoływana tylko raz przy pierwszym tworzeniu instancji.

```php
class DatabaseConnection {
    private static $instance = null;

    private function initializeConnection() {
        // Inicjalizacja połączenia z bazą danych
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
            self::$instance->initializeConnection();
        }
        return self::$instance;
    }
}
```

```php
class DatabaseConnectionTest extends PHPUnit\Framework\TestCase {
    public function testInitializeConnection() {
        $dbConnection = DatabaseConnection::getInstance();
        $reflector = new ReflectionClass($dbConnection);
        $method = $reflector->getMethod('initializeConnection');
        $method->setAccessible(true);

        // Test, czy inicjalizacja została wykonana poprawnie
        $method->invoke($dbConnection);
        // Asercje dotyczące stanu połączenia
    }
}
```

Test sprawdza, czy metoda `initializeConnection` działa poprawnie. Używamy refleksji, aby wywołać tę metodę bezpośrednio, nawet jeśli jest prywatna. Test może zawierać asercje, które weryfikują, czy stan połączenia z bazą danych jest zgodny z oczekiwaniami po wykonaniu inicjalizacji.