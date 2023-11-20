## Funkcje anonimowe

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei funkcji anonimowych,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Funkcje anonimowe

Funkcje anonimowe, znane także jako _wyrażenia lambda_ lub _closures_, stanowią ważny element wielu współczesnych języków programowania, takich jak PHP, Java, JavaScript i Python. W PHP są one reprezentowane jako obiekty klasy Closure. Funkcje anonimowe dają możliwość tworzenia funkcji bez konieczności nadawania im nazwy. Mogą one być przypisywane do zmiennych, przekazywane jako argumenty, a także zwracane przez inne funkcje. Ich główną zaletą jest umożliwienie pisania kodu, który jest zarówno zwięzły, jak i bardziej elastyczny.

```php
$double = function($value) {
    return $value * 2;
};

echo $double(4); // Wynik: 8
```

W tym przykładzie zdefiniowaliśmy funkcję anonimową w PHP, która służy do podwajania przekazanej wartości. Funkcja ta jest przypisana do zmiennej `$double`. Kiedy wywołujemy` $double(4)`, funkcja anonimowa jest uruchamiana z argumentem 4, zwracając wynik 8. To pokazuje, jak funkcje anonimowe mogą być używane w PHP do tworzenia małych, jednorazowych funkcji, które wykonują określone operacje, zachowując przy tym czystość i czytelność kodu.

```java
List<Integer> numbers = Arrays.asList(1, 2, 3, 4, 5);
List<Integer> doubled = numbers.stream()
                               .map(n -> n * 2)
                               .collect(Collectors.toList());

System.out.println(doubled); // Wynik: [2, 4, 6, 8, 10]
```

W tym przykładzie wykorzystujemy wyrażenia lambda w Javie do transformacji listy liczb. Używamy Stream API, które jest potężnym narzędziem do przetwarzania sekwencji danych w Javie 8 i nowszych wersjach. Metoda `stream()` tworzy strumień danych z listy `numbers`. Następnie, za pomocą metody `map`, aplikujemy funkcję `lambda n -> n * 2` do każdego elementu strumienia. Oznacza to, że każda liczba w strumieniu jest podwajana. Na koniec, za pomocą `collect(Collectors.toList())`, transformujemy strumień z powrotem do listy. Cały proces demonstruje, jak wyrażenia lambda w Javie pozwalają na eleganckie i efektywne manipulowanie kolekcjami danych.

### Wykorzystanie wyrażeń lambda – praktyczne aspekty

Wyrażenia lambda w programowaniu to prawdziwy przełom w zakresie upraszczania kodu, szczególnie przy pracy z różnymi rodzajami kolekcji – takimi jak tablice, listy, drzewa, grafy i inne struktury danych. Wprowadzają one znaczną prostotę i elastyczność. Głównie spotykamy je w formie par nawiasów okrągłych, które mogą zawierać parametry (w przypadku jednego parametru nawiasy są opcjonalne), połączonych z operatorem "strzałki", a następnie instrukcją lub blokiem instrukcji. Istnieją dwie główne formy definiowania wyrażeń lambda:

* Jedna instrukcja:

Wyrażenia lambda doskonale radzą sobie z redukowaniem kodu do jego istoty. Zamiast tworzyć osobną metodę z wieloma liniami "szumu" jak w przypadku:

```java
void printSquare(int n) {
    System.out.println("Kwadrat liczby " + n + " wynosi " + n*n);
}
```

* Więcej instrukcji:

Gdy chcemy zawrzeć w lambdzie więcej niż jedną instrukcję, tworzymy blok kodu otoczony klamrami. Pozwala to na wykonanie serii operacji w ramach jednego wyrażenia lambda.

Wyrażenia lambda doskonale radzą sobie z redukowaniem kodu do jego istoty. Zamiast tworzyć osobną metodę z wieloma liniami "szumu" jak w przypadku:

```java
void printSquare(int n) {
    System.out.println("Kwadrat liczby " + n + " wynosi " + n*n);
}
```

możemy to osiągnąć znacznie prościej za pomocą lambdy. Przykład z wykorzystaniem lambdy skupia się bezpośrednio na działaniu, które chcemy wykonać, czyli w tym przypadku na wyświetleniu kwadratu liczby. W takich sytuacjach często korzystamy z interfejsów funkcyjnych, które charakteryzują się jedną metodą abstrakcyjną. Przykładowy interfejs mógłby wyglądać tak:

```java
@FunctionalInterface
public interface LambdaWithNumber {
    void printN(int n);
}
```

Następnie, korzystając z tego interfejsu, możemy łatwo wywołać naszą funkcję lambda, podając odpowiedni parametr:

```java
lwn.printN(50);
```

Wyrażenia lambda są szczególnie użyteczne przy "podpinaniu" instrukcji do zdarzeń w aplikacjach – na przykład, przy użyciu `addActionListener` w interfejsach graficznych czy metody `forEach` w kolekcjach. Ich elastyczność i zdolność do upraszczania kodu sprawiają, że są one nieocenionym narzędziem dla programistów, ułatwiającym definiowanie niestandardowych zachowań i operacji.

### Znaczenie Funkcji Anonimowych w Programowaniu

Funkcje anonimowe są niezwykle ważne w programowaniu ze względu na ich elastyczność i zdolność do upraszczania kodu. Pozwalają one na:

* Zwiększenie czytelności kodu: Poprzez unikanie konieczności tworzenia oddzielnych, nazwanych funkcji dla małych operacji.
* Pisanie kodu deklaratywnego: Umożliwiają one skupienie się na tym, co ma być zrobione, a nie jak to ma być zrobione.
* Ułatwienie pracy z kolekcjami: Szczególnie przydatne w operacjach takich jak mapowanie, filtrowanie i redukcja.
* Umożliwienie programowania funkcyjnego: W językach, które tradycyjnie nie były funkcyjne, jak Java, wprowadzenie wyrażeń lambda otworzyło nowe możliwości.