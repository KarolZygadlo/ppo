## Refleksje 

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei refleksji,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań na ocenę.

### Wprowadzenie do refleksji

Refleksja w programowaniu obiektowym to zdolność programu do analizowania i modyfikowania własnej struktury i zachowania podczas działania. Dzięki temu program może "przeanalizować" swoje klasy, metody, pola, konstruktory i inne składowe, uzyskując informacje o swojej strukturze oraz dynamicznie modyfikując swoje działanie.

Refleksja jest niezwykle potężnym narzędziem w zaawansowanym programowaniu obiektowym, umożliwiającym takie operacje jak:

* Dynamiczne tworzenie obiektów: Programy mogą tworzyć instancje obiektów bez bezpośredniego odwoływania się do konkretnych klas w czasie kompilacji.
* Wywoływanie metod: Metody mogą być wywoływane dynamicznie, nawet jeśli ich nazwy są znane dopiero w czasie wykonania programu.
* Zarządzanie zależnościami: Umożliwia dynamiczne zarządzanie zależnościami w aplikacjach, co jest kluczowe w takich wzorcach projektowych jak _Inversion of Control (IoC)_ i _Dependency Injection (DI)_.
* Implementacja wzorców projektowych: Refleksja pozwala na bardziej elastyczne i zaawansowane implementacje różnorodnych wzorców projektowych.

Refleksja dodaje programom znacznej elastyczności i mocy, umożliwiając techniki, które byłyby trudne lub niemożliwe do zrealizowania w ramach statycznie typowanego języka bez tej funkcjonalności. Przykłady użycia obejmują tworzenie frameworków aplikacyjnych, bibliotek ORM (Object-Relational Mapping), narzędzi do serializacji danych i dynamicznych interfejsów użytkownika. Jednak jej użycie wiąże się także z potencjalnymi wyzwaniami, takimi jak zarządzanie wydajnością i bezpieczeństwem, które wymagają od programistów ostrożności i umiejętności.

W Javie refleksja jest często używana do uzyskiwania informacji o klasach, metodach i polach w czasie wykonania. Może być używana do dynamicznego tworzenia obiektów i wywoływania metod.

```java
import java.lang.reflect.Method;

class Demo {
    private void display() {
        System.out.println("Metoda prywatna została wywołana.");
    }
}

public class ReflectionExample {
    public static void main(String[] args) throws Exception {
        Demo obj = new Demo();
        Method method = Demo.class.getDeclaredMethod("display");
        method.setAccessible(true);
        method.invoke(obj);
    }
}
```

W powyższym przykładzie wykorzystano refleksję w Javie do wywołania prywatnej metody `display()` klasy `Demo`. Najpierw uzyskuje się dostęp do metody poprzez jej nazwę, następnie zmienia się jej dostępność na publiczną `(setAccessible(true))` i wywołuje za pomocą `invoke()`.

W PHP refleksja pozwala na analizę klas, interfejsów, funkcji i metod. Można używać jej do uzyskiwania informacji o atrybutach klas i wywoływania metod.

```php
class Demo {
    private function display() {
        echo "Metoda prywatna została wywołana.\n";
    }
}

$reflector = new ReflectionClass('Demo');
$method = $reflector->getMethod('display');
$method->setAccessible(true);
$method->invoke(new Demo());
```

Podobnie jak w Javie, w PHP uzyskuje się dostęp do prywatnej metody `display()` klasy `Demo` za pomocą refleksji. Reflektor klasy `(ReflectionClass)` jest używany do odnalezienia metody, której dostępność jest zmieniana, a następnie metoda jest wywoływana na nowym obiekcie klasy Demo.

Python oferuje bogate możliwości refleksji, umożliwiając dynamiczne modyfikowanie obiektów i ich zachowania. Funkcje takie jak `getattr()` i `setattr()` są często wykorzystywane.

```python
class Demo:
    def __init__(self):
        self.display = lambda: "Metoda 'display' została wywołana."

obj = Demo()
method = getattr(obj, 'display')
print(method())
```

W Pythonie refleksja jest stosowana do uzyskania referencji do metody `display` obiektu `obj`. Funkcja `getattr()` pozwala na pobranie atrybutu `display` z obiektu, który w tym przypadku jest funkcją lambda. Następnie funkcja ta jest wywoływana i jej wynik jest drukowany.

### Podstawowe koncepcje refleksji

#### Przegląd klas i interfejsów związanych z refleksją

- **Java**: 
  - **Klasy**: `Class`, `Method`, `Field`, `Constructor`.
  - **Zastosowanie**: Introspekcja klas, odczytywanie informacji o metodach, polach, konstruktorach i adnotacjach. Użycie `Class.forName("nazwaKlasy")` do ładowania klas.

- **PHP**:
  - **Klasy Refleksyjne**: `ReflectionClass`, `ReflectionMethod`, `ReflectionProperty`.
  - **Zastosowanie**: Analiza klas i obiektów, odczytywanie i modyfikacja ich struktury. `new ReflectionClass('NazwaKlasy')` do uzyskiwania informacji o klasie.

- **Python**:
  - **Moduł**: `inspect`.
  - **Funkcje Wbudowane**: `getattr()`, `setattr()`, `type()`, `isinstance()`.
  - **Zastosowanie**: Introspekcja obiektów, listowanie członków i typów. `inspect.getmembers(obiekt)` do uzyskiwania listy członków obiektu.

#### Dostęp do informacji o klasach, metodach, polach i konstruktorach

Refleksja pozwala na wykrywanie struktury klas, informacji o metodach, polach, konstruktorach i metadanych. Znajduje zastosowanie w:

- **Tworzeniu dynamicznych interfejsów użytkownika**: Wyświetlanie i edytowanie właściwości obiektów w czasie rzeczywistym.
- **Serializacji i deserializacji**: Odczyt i zapis stanu obiektów do różnych formatów.
- **Frameworkach i bibliotekach**: Automatyczne mapowanie danych, wstrzykiwanie zależności.

#### Rozróżnienie między refleksją statyczną a dynamiczną

- **Statyczna refleksja**:
  - **Zastosowanie**: Analiza kodu źródłowego przed wykonaniem.
  - **Przykłady**: Narzędzia analizy statycznej kodu, generatory kodu, lintery.
  - **Cel**: Wykrywanie błędów, optymalizacja, generowanie dokumentacji.

- **Dynamiczna refleksja**:
  - **Zastosowanie**: Manipulacja obiektami w czasie wykonania programu.
  - **Przykłady**: Dynamiczne tworzenie obiektów, wywoływanie metod, modyfikacja pól.
  - **Cel**: Elastyczność i dynamika aplikacji, zarządzanie zależnościami, adaptacja do środowiska.

Refleksja wymaga ostrożnego stosowania ze względu na potencjalne trudności w utrzymaniu kodu, wydajności i bezpieczeństwa.

### Dostęp do metadanych klasy

#### Jak uzyskać informacje o klasie w czasie wykonywania kodu?
Wykorzystanie refleksji umożliwia programom odczyt informacji o klasach, takich jak:
- **Nazwa Klasy**: Identyfikacja typu obiektu w czasie wykonania.
- **Metody**: Informacje o dostępnych metodach, ich nazwach, typach zwracanych i parametrach.
- **Pola**: Odczyt stanów klasy, w tym typów i wartości.
- **Adnotacje**: W językach jak Java, odczyt adnotacji klasy.

#### Przykłady odczytu nazw klas, metod, pól i właściwości

- **Java**: 
  - `Class.getName()` do uzyskania nazwy klasy.
  - `Class.getMethods()` do listowania metod publicznych.
- **PHP**: 
  - `ReflectionClass.getName()` do uzyskiwania nazwy klasy.
  - `ReflectionClass.getProperties()` dla właściwości klasy.
- **Python**: 
  - `type()` do identyfikacji typu obiektu.
  - `dir()` do uzyskiwania listy atrybutów klasy.

#### Użycie refleksji do listowania dostępnych metod i pól
Refleksja pozwala na dynamiczne listowanie metod i pól klasy, co jest przydatne w debugowaniu i inspekcji kodu.

### Tworzenie i manipulowanie obiektami za pomocą refleksji

#### Tworzenie instancji obiektów w czasie wykonania
Refleksja umożliwia dynamiczne tworzenie instancji obiektów, co pozwala na większą elastyczność w zależności od kontekstu wykonania.

##### Przykłady:
- **Java**: `Class.newInstance()` lub `Constructor.newInstance()`.
- **PHP**: `ReflectionClass('NazwaKlasy').newInstance()`.
- **Python**: Połączenie `type()` z `__call__()`.

#### Modyfikowanie wartości pól i wywoływanie metod
Możliwość zmiany wartości pól i wywoływania metod, nawet jeśli są one prywatne.

##### Zastosowania:
- **Testowanie**: Modyfikacja stanu wewnętrznego obiektów.
- **Dynamika**: Adaptacja zachowania obiektów w czasie wykonania.

#### Omówienie bezpieczeństwa i wydajności przy użyciu refleksji
Refleksja wiąże się z wyzwaniami, takimi jak:
- **Bezpieczeństwo**: Ryzyko związane z modyfikacją prywatnych pól.
- **Wydajność**: Operacje refleksyjne mogą być kosztowniejsze niż bezpośrednie wywołania.

Użycie refleksji wymaga rozwagi, ze szczególnym uwzględnieniem konsekwencji dla utrzymania kodu, wydajności i bezpieczeństwa.

## Refleksja a dostęp do prywatnych elementów

### Przełamywanie enkapsulacji: dostęp do prywatnych pól i metod
Refleksja umożliwia dostęp do prywatnych pól i metod w klasach, co może naruszać zasadę enkapsulacji.

#### Przykłady:
- **Java**: Użycie `getDeclaredField()` i `setAccessible(true)` dla dostępu do prywatnych pól.
- **PHP**: `ReflectionProperty` i `setAccessible(true)` do manipulacji prywatnymi właściwościami.
- **Python**: Bezpośredni dostęp do atrybutów z podkreślnikiem (`_`).

#### Etyka i ryzyka związane z modyfikacją prywatnych elementów
Modyfikacja prywatnych składowych może prowadzić do nieprzewidywalnych zachowań, błędów i problemów z synchronizacją.

#### Przykłady i zastosowania praktyczne
Refleksja jest używana w testowaniu jednostkowym, narzędziach ORM oraz frameworkach MVC.

### Zastosowania refleksji

#### Debugowanie i testowanie
Refleksja umożliwia inspekcję i modyfikację stanu obiektów, co jest przydatne w testowaniu i debugowaniu.

#### Programowanie generyczne i kontenery DI
Refleksja jest kluczowa w programowaniu generycznym i kontenerach Dependency Injection.

#### Automatyzacja i metaprogramowanie
Refleksja umożliwia pisanie kodu, który może analizować i modyfikować sam siebie.

### Wady i ograniczenia refleksji

#### Kwestie wydajnościowe
Nadmierne stosowanie refleksji może obniżać wydajność aplikacji.

#### Problemy z bezpieczeństwem
Nieostrożne użycie refleksji może prowadzić do luk bezpieczeństwa.

#### Trudności w utrzymaniu i debugowaniu kodu
Kod z refleksją może być trudniejszy w utrzymaniu i debugowaniu.

### Dobre praktyki i alternatywy dla refleksji

#### Kiedy warto używać refleksji, a kiedy unikać
Refleksja powinna być używana tylko wtedy, gdy jest to uzasadnione.

#### Dobre praktyki programowania z użyciem refleksji
Kontrolowane i przemyślane stosowanie refleksji, unikanie jej nadużywania.

#### Alternatywne techniki i narzędzia
Alternatywne techniki, takie jak wzorce projektowe, metaprogramowanie, czy biblioteki.
