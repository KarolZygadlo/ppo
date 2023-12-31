## Wyjątki

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei wyjątków,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań na ocenę.

### Wyjątki w programowaniu 

Wyjątek to zdarzenie, które występuje podczas wykonania programu i zakłóca jego normalny przepływ. Wyjątki są używane do sygnalizowania błędów oraz innych nieoczekiwanych zdarzeń, takich jak niewłaściwe dane wejściowe, problemy z połączeniem sieciowym czy błędy plików. W Javie i Pythonie wyjątki są obiektami, podczas gdy w PHP są to instancje klas rozszerzających klasę `Exception` lub `Error`.

### Podział wyjątków na sprawdzanie i niesprawdzane

Podział wyjątków: sprawdzane i niesprawdzane:

* **Sprawdzane** _(Checked)_ Wyjątki: Są to wyjątki, które muszą być obsłużone w kodzie. Java stosuje tę kategorię, gdzie wyjątki takie jak `IOException` wymagają obsługi za pomocą `try-catch` lub propagacji(W programownaiu propagacja zwykle odnosi się do przekazywania informacji między poszczególnymi modułami lub częściami programu). W PHP i Pythonie nie ma formalnego rozróżnienia na wyjątki sprawdzane i niesprawdzane.
* **Niesprawdzane** _(Unchecked)_ Wyjątki: To wyjątki, które nie wymagają jawnej obsługi. W Javie są to głównie wyjątki dziedziczące po `RuntimeException`, jak `NullPointerException`. W Pythonie i PHP wszystkie wyjątki można traktować jako niesprawdzane, gdyż języki te nie wymuszają ich obsługi.

### Obsługa wyjątków 

Mechanizm ten pozwala na przechwycenie wyjątku i wykonanie określonych działań w odpowiedzi. Blok `try` zawiera kod, który może wygenerować wyjątek. Blok `catch` przechwytuje wyjątek i definiuje sposób jego obsługi. Blok `finally`, który jest opcjonalny, zawiera kod, który zostanie wykonany niezależnie od tego, czy wyjątek został wygenerowany i obsłużony, czy nie.

```java
//Java
try {
    // kod, który może generować wyjątek
} catch (IOException e) {
    // obsługa wyjątku IOException
} finally {
    // kod, który zostanie wykonany zawsze
}
```

```php
//PHP
try {
    // kod, który może generować wyjątek
} catch (Exception $e) {
    // obsługa wyjątku
} finally {
    // kod, który zostanie wykonany zawsze
}
```

```python
# Python
try:
    # kod, który może generować wyjątek
except IOError as e:
    # obsługa wyjątku IOError
finally:
    # kod, który zostanie wykonany zawsze
```

### Własne wyjątki
Kiedy tworzyć własne wyjątki?

Własne wyjątki są niezwykle przydatne w sytuacjach, gdy chcemy zapewnić bardziej specyficzną obsługę błędów niż to, co oferują standardowe wyjątki. Są one szczególnie użyteczne w przypadkach, gdy:

* **Standardowe wyjątki są niewystarczające**: Gdy potrzebujemy przekazać bardziej szczegółowe informacje o błędzie, które standardowe wyjątki nie są w stanie uchwycić.
* **Specyficzne scenariusze błędów**: Na przykład w aplikacji biznesowej, może być potrzebne rozróżnienie między różnymi rodzajami błędów danych wejściowych lub logiki biznesowej.
* **Lepsza kontrola nad przepływem programu**: Własne wyjątki pozwalają na bardziej precyzyjne sterowanie przepływem programu w przypadku wystąpienia określonych warunków błędu.

Jak tworzyć własne wyjątki?

* Java: Rozszerzyć klasę `Exception` lub `RuntimeException`, w zależności od tego, czy wyjątek ma być sprawdzany, czy niesprawdzany.
* PHP: Rozszerzyć klasę `Exception`. PHP umożliwia tworzenie hierarchii wyjątków, dzięki czemu możemy tworzyć specjalistyczne wyjątki dla różnych przypadków użycia.
* Python: Rozszerzyć klasę `Exception` lub inną wbudowaną klasę wyjątków, aby dostosować wyjątek do specyficznych potrzeb aplikacji.

```java 
// Java
public class InvalidUserInputException extends Exception {
    public InvalidUserInputException(String message) {
        super(message);
    }
}
```

W powyższym przykładzie tworzymy niestandardowy wyjątek o nazwie InvalidUserInputException. Jego zadaniem jest wskazywanie na błędy wynikające z nieprawidłowych danych wejściowych użytkownika. Wyjątek ten pozwala na bardziej szczegółowe identyfikowanie i obsługę konkretnego rodzaju problemów, jakie mogą wystąpić podczas interakcji użytkownika z programem.

Podobny wyjątek może zostać utworzony w PHP w następujący sposób:

```php
// PHP
class InvalidUserInputException extends Exception {
        public function __construct($message, $code = 0, Exception $previous = null) {
            parent::__construct($message, $code, $previous);
        }

        public function __toString() {
            return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
        }
}
```
Konstruktor: Przyjmuje parametr `$message`, który jest przekazywany do konstruktora klasy bazowej `Exception`. Pozwala to na przechowywanie wiadomości błędu w obiekcie wyjątku. Metoda `__toString()`: Została nadpisana, aby zapewnić niestandardową reprezentację tekstową wyjątku, co jest przydatne podczas logowania błędów lub ich wyświetlania.

Przy użyciu takiego wyjątku w kodzie PHP, możemy dokładniej określić rodzaj błędu i odpowiednio go obsłużyć, co zwiększa czytelność i efektywność obsługi błędów w naszej aplikacji.


### Przykłady

#### Przykład 1

```php
declare(strict_types=1);

namespace Sprawby\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvoiceCouldNotBeDeletedException extends ApiException
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = "Invoice could not be deleted";
}
```

```php
    /**
     * @throws InvoiceCouldNotBeDeletedException
     */
    public function destroy(Revenue $revenue, DestroyRevenueAction $destroyRevenueAction): Response
    {
        if (!$revenue->deletable()) {
            throw new InvoiceCouldNotBeDeletedException();
        }

        $destroyRevenueAction->execute($revenue);

        return response()->noContent();
    }
```

#### Przykład 2

```php
public function execute(VerifyUserData $verifyUserData): User
{
    $user = User::where("email", $verifyUserData->email)->first();

    if (!$user || !Hash::check($verifyUserData->password, $user->password)) {
        throw new AuthenticationException();
    }

    return $user;
}
```

```php
<?php

namespace Illuminate\Auth;

use Exception;

class AuthenticationException extends Exception
{
    /**
     * All of the guards that were checked.
     *
     * @var array
     */
    protected $guards;

    /**
     * The path the user should be redirected to.
     *
     * @var string|null
     */
    protected $redirectTo;

    /**
     * Create a new authentication exception.
     *
     * @param  string  $message
     * @param  array  $guards
     * @param  string|null  $redirectTo
     * @return void
     */
    public function __construct($message = 'Unauthenticated.', array $guards = [], $redirectTo = null)
    {
        parent::__construct($message);

        $this->guards = $guards;
        $this->redirectTo = $redirectTo;
    }

    /**
     * Get the guards that were checked.
     *
     * @return array
     */
    public function guards()
    {
        return $this->guards;
    }

    /**
     * Get the path the user should be redirected to.
     *
     * @return string|null
     */
    public function redirectTo()
    {
        return $this->redirectTo;
    }
}
```