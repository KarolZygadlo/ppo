## Klasy abstrakcyjne

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei klasy abstracyjnej
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Klasa abstrakcyjna
Klasa abstrakcyjna reprezentuje koncepcję obiektu, który nie jest całkowicie zdefiniowany.
Nie można utworzyć jej instancji, co oznacza, że nie możemy tworzyć obiektów bezpośrednio z klasy abstrakcyjnej. Zamiast tego klasa abstrakcyjna służy jako bazowa klasa dla innych klas.

Klasa abstrakcyjna jest jak wzór lub szablon, którego nie można użyć w takiej formie, w jakiej jest. Zamiast tego inne klasy korzystają z tego wzoru jako punktu wyjścia, aby stworzyć konkretne "wersje" tego wzoru.

`Przykład:` Pomyśl o klasie abstrakcyjnej jako o kategorii "pojazd". Wiesz, co to jest pojazd, ale "pojazd" sam w sobie jest zbyt ogólny, aby dało się go zdefiniować jako konkretny obiekt. Niemniej jednak "samochód", "motocykl" czy "rower" są konkretnymi manifestacjami pojęcia "pojazd".

```java
abstract class Pojazd {
    abstract void przyspiesz();
}
```

### Dlaczego warto korzystać z klas abstrakcyjnych

#### 1. Abstrakcja: 

Klasy abstrakcyjne umożliwiają modelowanie na wyższym poziomie abstrakcji. W rzeczywistości każdy obiekt w świecie rzeczywistym posiada wiele szczegółów. Dzięki klasom abstrakcyjnym możemy skupić się tylko na tych cechach obiektu, które są dla nas ważne, pomijając nieistotne detale.
Klasy abstrakcyjne pozwalają na przedstawienie ogólnego konceptu bez konieczności definiowania wszystkich szczegółów

`Przykład:` Kategoria "pojazd" pozwala myśleć o różnych środkach transportu bez konieczności zastanawiania się, czy mają one dwa czy cztery koła, czy są napędzane paliwem czy elektrycznością.

```java
class Samochod extends Pojazd {
    @Override
    void przyspiesz() {
        System.out.println("Wciskam pedał gazu");
    }
}
```

#### 2. Wymuszanie kontraktu: 

Metody abstrakcyjne w klasie abstrakcyjnej są deklarowane bez implementacji. Klasy dziedziczące są zobowiązane do dostarczenia implementacji dla tych metod, co gwarantuje, że każda klasa pochodna będzie miała te metody. Klasy abstrakcyjne mogą wymagać, aby klasy dziedziczące zdefiniowały określone metody.

`Przykład:` Możemy wymagać, aby każdy "pojazd" miał metodę "przyspiesz" i "zatrzymaj", ale to, jak dokładnie te metody działają, będzie zależało od konkretnego pojazdu (samochód przyspiesza inaczej niż rower).

#### 3. Udostępnianie wspólnego kodu: 
Klasy abstrakcyjne nie tylko definiują metody abstrakcyjne, ale mogą również zawierać normalne metody z pełną implementacją. To oznacza, że klasy dziedziczące mogą korzystać z tej gotowej implementacji, nie pisząc jej od nowa.
Klasy abstrakcyjne mogą zawierać metody z implementacją, która jest wspólna dla wszystkich klas dziedziczących.

`Przykład:` Każdy "pojazd" mógłby mieć metodę "zatankuj", ale tylko niektóre pojazdy (na przykład elektryczne) mogą mieć dodatkową metodę "naładuj".

```java
abstract class Pojazd {
    abstract void przyspiesz();
    
    void zatankuj() {
        System.out.println("Tankuję paliwo");
    }
}

class SamochodElektryczny extends Pojazd {
    @Override
    void przyspiesz() {
        System.out.println("Wciskam pedał gazu");
    }
    
    void naladuj() {
        System.out.println("Ładuję baterię");
    }
}
```

### Metody abstrakcyjne 

Metody abstrakcyjne stanowią jedną z kluczowych cech klas abstrakcyjnych. To metody, które są deklarowane w klasie abstrakcyjnej, ale nie mają konkretnego ciała lub implementacji.

Metody abstrakcyjne w klasie abstrakcyjnej działają jak lista obowiązków, które klasy dziedziczące muszą "wypełnić".

`Przykład:` Jeśli klasa abstrakcyjna "pojazd" ma metodę abstrakcyjną "przyspiesz", to klasa "samochód" może zdefiniować tę metodę jako "wciskanie pedału gazu", podczas gdy klasa "rower" zdefiniuje ją jako "pedałowanie szybciej".

```java
class Rower extends Pojazd {
    @Override
    void przyspiesz() {
        System.out.println("Pedałuję szybciej");
    }
}
```

Cechy charakterystyczne metod abstrakcyjnych:

* Brak ciała: Główna cecha metody abstrakcyjnej to brak ciała. Oznacza to, że nie wykonuje ona żadnej konkretnej operacji.
* Wymaganie implementacji w klasie dziedziczącej: Jeśli klasa dziedziczy po klasie abstrakcyjnej i nie dostarczy implementacji dla metod abstrakcyjnych, stanie się ona również klasą abstrakcyjną.
* Widoczność: Metody abstrakcyjne mogą mieć modyfikatory dostępu, takie jak prywatne, chronione czy publiczne. Należy jednak zauważyć, że w niektórych językach programowania metody abstrakcyjne nie mogą być prywatne.

```java
// Przykład zastosowania:
Pojazd auto = new Samochod();
auto.przyspiesz();  // Wyjście: "Wciskam pedał gazu"

Pojazd rower = new Rower();
rower.przyspiesz();  // Wyjście: "Pedałuję szybciej"
```

Używając metod abstrakcyjnych, programista może określić, które metody klasy dziedziczącej muszą zostać zaimplementowane, zapewniając jednocześnie swobodę w zakresie konkretnego sposobu ich implementacji.

### Klasy abstrakcyjne a interfejsy

Metody i pola 
* Klasy abstrakcyjne mogą mieć zmienne instancji, konstruktory oraz metody statyczne.
* Interfejsy mogą zawierać tylko stałe (publiczne, statyczne, finalne) oraz metody abstrakcyjne, domyślne i statyczne.

Dziedziczenie 
* Klasa może dziedziczyć tylko jedną klasę abstrakcyjną.
* Klasa może implementować wiele interfejsów.

Konstruktory
* Klasy abstrakcyjne mogą mieć konstruktory.
* Interfejsy nie mają konstruktorów.

Właściwości dziedziczenia 
* Klasy abstrakcyjne mogą dziedziczyć stan (pola) oraz zachowanie (metody).
* Interfejsy mogą dziedziczyć tylko zachowanie (metody).


#### **1. Klasa abstrakcyjna `Pojazd`**

```java
abstract class Pojazd {
    int predkosc;
    
    Pojazd(int predkosc) {
        this.predkosc = predkosc;
    }
    
    abstract void start();
}
```

##### **Co się dzieje?**
- **Definicja klasy:** Tworzona jest klasa abstrakcyjna `Pojazd`.
- **Zmienna:** W klasie jest zmienna `predkosc`, która reprezentuje prędkość pojazdu.
- **Konstruktor:** Klasa `Pojazd` posiada konstruktor, który przyjmuje argument `predkosc` i przypisuje go do zmiennej instancji `predkosc`.
- **Metoda abstrakcyjna:** Klasa definiuje metodę abstrakcyjną `start`, która nie ma implementacji.

#### **2. Interfejs `Naprawialny`**

```java
interface Naprawialny {
    void napraw();
}
```

##### **Co się dzieje?**
- **Definicja interfejsu:** Tworzony jest interfejs `Naprawialny`.
- **Metoda abstrakcyjna:** Interfejs deklaruje metodę abstrakcyjną `napraw`, która nie ma ciała.

#### **3. Klasa `Samochod`**

```java
class Samochod extends Pojazd implements Naprawialny {
    Samochod(int predkosc) {
        super(predkosc);
    }
    
    @Override
    void start() {
        System.out.println("Samochód rusza z prędkością: " + predkosc + " km/h");
    }

    @Override
    public void napraw() {
        System.out.println("Naprawiam samochód");
    }
}
```

##### **Co się dzieje?**
- **Definicja klasy:** Tworzona jest klasa `Samochod`, która dziedziczy po klasie abstrakcyjnej `Pojazd` i implementuje interfejs `Naprawialny`.
- **Konstruktor:** Klasa `Samochod` ma konstruktor, który przyjmuje `predkosc` jako argument i przekazuje go do konstruktora klasy nadrzędnej `Pojazd`.
- **Implementacja metod abstrakcyjnych:**
  - Metoda `start` klasy `Pojazd` jest nadpisywana i implementowana. Drukowana jest informacja o starcie samochodu wraz z jego prędkością.
  - Metoda `napraw` z interfejsu `Naprawialny` jest również implementowana, drukując informację o naprawie samochodu.

### **Wnioski**

Dzięki temu przykładowi widać, jak można połączyć klasy abstrakcyjne i interfejsy. Klasa `Samochod` dziedziczy cechy i zachowania z klasy `Pojazd` oraz jednocześnie zobowiązuje się do implementacji metody z interfejsu `Naprawialny`. Tym samym, `Samochod` staje się bardziej elastyczny i łatwo można go rozbudować o dodatkowe funkcjonalności.

###  Zadanie do wykonania 

* Utwórz klasę abstrakcyjną Vehicle, która będzie zawierać wspólne cechy i metody dla różnych typów pojazdów.
* Klasy Bike, Car, Truck powinny dziedziczyć po klasie Vehicle i odpowiednio nadpisywać metody oraz korzystać z cech klasy nadrzędnej.
* Interfejs ParkingVehicle powinien zostać rozszerzony o dodatkowe metody, takie jak parkingTime(), które zwróci czas parkowania danego pojazdu.
* Klasy Bike, Car, Truck powinny implementować nowe metody z interfejsu ParkingVehicle.
* Dodaj nową klasę abstrakcyjną PoweredVehicle dziedziczącą po Vehicle, która będzie reprezentować pojazdy z silnikiem.
* Klasy Car i Truck powinny dziedziczyć po PoweredVehicle, a klasa Bike bezpośrednio po Vehicle.
* Klasa PoweredVehicle powinna zawierać dodatkowe pola i metody charakterystyczne dla pojazdów z silnikiem.

Należy również rozszerzyć program o następujące funkcjonalności:
* Każdy pojazd powinien mieć zdefiniowaną markę, model oraz rok produkcji. Zastanów się, czy te wartości powinny być inicjalizowane przez konstruktor, setter czy publiczny akcesor.
* Zastanów się które metody i pola powinny być publiczne, a które chronione lub prywatne.
* Parking powinien mieć możliwość określenia ceny za godzinę parkowania w zależności od typu pojazdu.
* Dodaj możliwość wyjścia pojazdu z parkingu i obliczania należności za parkowanie.
* Pojazdy mogą mieć różny czas parkowania.  Na przykład rowery parkują za darmo, samochody płacą standardową stawkę, a ciężarówki płacą podwójnie.
* Jeżeli na parkingu jest więcej niż jeden pojazd tego samego typu, powinny "pozdrawiać się" na przykład przez wydrukowanie komunikatu "Pozdrawiam inny samochód!".
* Dodaj klasy ElectricBike i MountainBike, które będą dziedziczyć po klasie Bike. ElectricBike powinien mieć dodatkowe pole batteryCapacity oraz metodę getBatteryCapacity(), a MountainBike pole suspensionType oraz metodę getSuspensionType().
* Dodaj do interfejsu ParkingVehicle metodę isEligibleForDiscount(), która zwróci, czy dany pojazd może skorzystać ze zniżki na parkingu.
* W klasie ParkingLot dodaj logikę obliczającą opłatę za parkowanie z uwzględnieniem zniżki.
* W klasie ParkingLot dodaj listę, która będzie przechowywać historię parkowania pojazdów (np. kiedy pojazd wjechał i wyjechał oraz ile zapłacił).
* Dodaj metodę printParkingHistory(), która wyświetli historię parkowania wszystkich pojazdów.
* Rozszerz klasę ParkingLot o różne rodzaje miejsc parkingowych (np. miejsca dla samochodów, rowerów, ciężarówek).
* Dodaj logikę, która będzie sprawdzać, czy dla danego typu pojazdu jest dostępne miejsce na parkingu zanim zostanie wpuszczony.
