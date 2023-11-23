## Funkcje anonimowe

### Agenda

Przewidywany plan zajęć kształtuje się następująco:

- przedstawienie idei funkcji anonimowych,
- analiza zadania przykładowego,
- indywidualna praca nad listą zadań.

### Funkcje anonimowe

Funkcje anonimowe, znane także jako _wyrażenia lambda_ lub _closures_, stanowią ważny element wielu współczesnych języków programowania, takich jak PHP, Java, JavaScript czy Python. W PHP są one reprezentowane jako obiekty klasy Closure. Funkcje anonimowe dają możliwość tworzenia funkcji bez konieczności nadawania im nazwy. Mogą one być przypisywane do zmiennych, przekazywane jako argumenty, a także zwracane przez inne funkcje. Ich główną zaletą jest umożliwienie pisania kodu, który jest zarówno zwięzły, jak i bardziej elastyczny.

```php
// PHP
$double = function($value) {
    return $value * 2;
};

echo $double(4); // Wynik: 8
```

W tym przykładzie zdefiniowaliśmy funkcję anonimową w PHP, która służy do podwajania przekazanej wartości. Funkcja ta jest przypisana do zmiennej `$double`. Kiedy wywołujemy` $double(4)`, funkcja anonimowa jest uruchamiana z argumentem 4, zwracając wynik 8. To pokazuje, jak funkcje anonimowe mogą być używane w PHP do tworzenia małych, jednorazowych funkcji, które wykonują określone operacje, zachowując przy tym czystość i czytelność kodu.

```java
// Java
List<Integer> numbers = Arrays.asList(1, 2, 3, 4, 5);
List<Integer> doubled = numbers.stream()
                               .map(n -> n * 2)
                               .collect(Collectors.toList());

System.out.println(doubled); // Wynik: [2, 4, 6, 8, 10]
```

W tym przykładzie wykorzystujemy wyrażenia lambda w Javie do transformacji listy liczb. Używamy Stream API, które jest potężnym narzędziem do przetwarzania sekwencji danych w Javie 8 i nowszych wersjach. Metoda `stream()` tworzy strumień danych z listy `numbers`. Następnie, za pomocą metody `map`, aplikujemy funkcję `lambda n -> n * 2` do każdego elementu strumienia. Oznacza to, że każda liczba w strumieniu jest podwajana. Na koniec, za pomocą `collect(Collectors.toList())`, transformujemy strumień z powrotem do listy. Cały proces demonstruje, jak wyrażenia lambda w Javie pozwalają na eleganckie i efektywne manipulowanie kolekcjami danych.

### Wykorzystanie wyrażeń lambda – praktyczne aspekty

Wyrażenia lambda w programowaniu znacząco upraszczają kod, szczególnie przy pracy z różnymi rodzajami kolekcji, takimi jak tablice, listy, drzewa, grafy. Umożliwiają one wprowadzenie prostoty i elastyczności w definiowaniu zachowań i operacji. Wyrażenia lambda składają się z nawiasów okrągłych, zawierających parametry (nawiasy są opcjonalne przy jednym parametrze), połączonych z operatorem "strzałki", a następnie instrukcją lub blokiem instrukcji.

Przykładowo, zamiast tworzenia osobnej metody:

```java
// Java
void printSquare(int n) {
    System.out.println("Kwadrat liczby " + n + " wynosi " + n*n);
}
```

można skorzystać z wyrażeń lambda do osiągnięcia tego samego rezultatu w znacznie prostszy sposób.

```java
// Java z wyrażeniem lambda
Consumer<Integer> printSquareLambda = n -> System.out.println("Kwadrat liczby " + n + " wynosi " + n*n);
```

W tym przypadku, lambda n -> System.out.println("Kwadrat liczby " + n + " wynosi " + n\*n) jest funkcją przyjmującą jeden argument (n) i wykonującą pojedynczą instrukcję. Lambda redukuje kod do jego istoty, a przy potrzebie wykonania serii operacji, używa się bloku kodu otoczonego klamrami.

Wyrażenia lambda są również użyteczne przy "podpinaniu" instrukcji do zdarzeń w aplikacjach, na przykład przy użyciu addActionListener w interfejsach graficznych czy metody forEach w kolekcjach.

```php
<?php
// Przykładowa tablica
$numbers = [1, 2, 3, 4, 5];

// Użycie wyrażenia lambda z array_map
$squaredNumbers = array_map(function($n) {
    return $n * $n;
}, $numbers);

// Wyświetlenie wyników
foreach ($squaredNumbers as $value) {
    echo $value . ' ';
}
?>
```

- Tworzymy tablicę liczb `($numbers)`.
- Używamy `array_map` z anonimową funkcją `(function($n) { return $n * $n; })`, która podnosi każdy element tablicy do kwadratu.
- Wynik `($squaredNumbers)` jest tablicą zawierającą kwadraty pierwotnych liczb.
- Iterujemy przez tablicę wynikową i wyświetlamy jej elementy.

### Przykłady

```php
class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

$products = [
    new Product("Produkt A", 50),
    new Product("Produkt B", 20),
    new Product("Produkt C", 50)
];

usort($products, function($a, $b) {
    if ($a->price == $b->price) {
        return $a->name <=> $b->name;
    }
    return $a->price <=> $b->price;
});
```

```php
$users = [
    ['id' => 1, 'name' => 'Jan'],
    ['id' => 2, 'name' => 'Anna']
];

$orders = [
    ['user_id' => 2, 'order' => 'Książka'],
    ['user_id' => 1, 'order' => 'Komputer']
];

$userOrders = array_map(function($user) use ($orders) {
    $userOrders = array_filter($orders, function($order) use ($user) {
        return $order['user_id'] == $user['id'];
    });
    return ['user' => $user, 'orders' => $userOrders];
}, $users);
```

```java
class Employee {
    String department;
    double salary;

    // Konstruktor, gettery, settery itp.
}

List<Employee> employees = // inicjalizacja listy pracowników

Map<String, List<Employee>> groupedByDepartment = employees.stream()
    .sorted(Comparator.comparing(Employee::getDepartment)
                      .thenComparing(Employee::getSalary))
    .collect(Collectors.groupingBy(Employee::getDepartment));
```

```php
$handleException = function($e) {
    echo "Wystąpił wyjątek: " . $e->getMessage();
};

try {
    // próba wykonania jakiejś operacji
    throw new Exception("Coś poszło nie tak.");
} catch (Exception $e) {
    $handleException($e);
}
```

```java
JButton button = new JButton("Kliknij mnie");
button.addActionListener(e -> {
    System.out.println("Przycisk został naciśnięty.");
});
```

```java
List<String> names = Arrays.asList("Anna", "Bob", "Charlie");
names.forEach(name -> System.out.println(name));
```

```php
public function execute(Collection $calculatedInvoiceLines, BigDecimal $exchangeRate): VatFooter
{
    $vatFooter = new VatFooter([]);

    $calculatedInvoiceLines
        ->groupBy(fn(InvoiceLineData $line): TaxRate => $line->taxRate)
        ->each(function (Collection $lines, string $taxRateValue) use ($exchangeRate, $vatFooter): void {
            $net = $this->aggregateTotal($lines->pluck("totalPrice.netInCurrency"));
            $vat = $this->calculateVatAmount($net, TaxRate::from($taxRateValue)->rateValue());
            $gross = $this->aggregateTotal($lines->pluck("totalPrice.grossInCurrency"));

            $netInSystemCurrency = $exchangeRate !== null ? $net->multipliedBy($exchangeRate)->toScale(2, RoundingMode::HALF_UP) : null;
            $vatInSystemCurrency = $exchangeRate !== null ? $vat->multipliedBy($exchangeRate)->toScale(2, RoundingMode::HALF_UP) : null;
            $grossInSystemCurrency = $exchangeRate !== null ? $gross->multipliedBy($exchangeRate)->toScale(2, RoundingMode::HALF_UP) : null;

            $totalPriceData = new TotalPrice(
                netInCurrency: $net,
                vatInCurrency: $vat,
                grossInCurrency: $gross,
                net: $netInSystemCurrency,
                vat: $vatInSystemCurrency,
                gross: $grossInSystemCurrency,
            );

            $vatFooter->setVatFooterLine(TaxRate::from($taxRateValue), $totalPriceData);
        });

    return $vatFooter;
}
```
