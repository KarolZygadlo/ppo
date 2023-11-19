## Refleksje 

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei refleksji,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań na ocenę.

### Wprowadzenie do refleksji

Refleksja w programowaniu obiektowym to zdolność programu do analizowania i modyfikowania własnej struktury i zachowania podczas działania. Dzięki niej, program może introspektować (samobadanie) swoje klasy, metody, pola, konstruktory i inne składowe, uzyskując informacje o swojej strukturze oraz dynamicznie modyfikując swoje działanie.

Refleksja jest niezwykle potężnym narzędziem w zaawansowanym programowaniu obiektowym, umożliwiającym takie operacje jak:

* Dynamiczne Tworzenie Obiektów: Programy mogą tworzyć instancje obiektów bez bezpośredniego odwoływania się do konkretnych klas w czasie kompilacji.
* Wywoływanie Metod: Metody mogą być wywoływane dynamicznie, nawet jeśli ich nazwy są znane dopiero w czasie wykonania programu.
* Zarządzanie Zależnościami: Umożliwia dynamiczne zarządzanie zależnościami w aplikacjach, co jest kluczowe w takich wzorcach projektowych jak Inversion of Control (IoC) i Dependency Injection (DI).
* Implementacja Wzorców Projektowych: Refleksja pozwala na bardziej elastyczne i zaawansowane implementacje różnorodnych wzorców projektowych.

Refleksja dodaje programom znacznej elastyczności i mocy, umożliwiając techniki, które byłyby trudne lub niemożliwe do zrealizowania w ramach statycznie typowanego języka bez tej funkcjonalności. Przykłady użycia obejmują tworzenie frameworków aplikacyjnych, bibliotek ORM (Object-Relational Mapping), narzędzi do serializacji danych i dynamicznych interfejsów użytkownika. Jednak jej użycie wiąże się także z potencjalnymi wyzwaniami, takimi jak zarządzanie wydajnością i bezpieczeństwem, które wymagają od programistów ostrożności i umiejętności.