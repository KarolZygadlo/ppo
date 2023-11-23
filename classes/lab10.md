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