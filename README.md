# Projekt zespołowy

### Zasady pracy w grupie
#### Teoria
1. Gałąź `master` jest głównym branchem, który posiada ostatnią działającą wersję projektu.
2. Podczas implementacji nowej funkcjonalności, bądź jej poprawy, działamy na oddzielnej gałęzi.
3. Nie robimy `git merge` do `master`, gdy implementowana funkcjonalność nie działa poprawnie.

#### Praktyka
Tutorial GitHub: [klik](https://stormit.pl/git/)

##

##### Tworzenie / edycja nowego feature, gdy gałąź do niej już istnieje
1. Pobieramy najnowszą wersję gałęzi feature:
>git checkout feature/nazwaGałęzi\
>git pull
2. Implementujemy funkcjonalności z dobrze opisanymi commitami:
>git add nazwyPlików lub git add .\
>git commit -m "wiadomość opisująca zmiany"\
>git push
4. Jeśli feature działa poprawnie i nadaje się na produkcję, to mergujemy ją do mastera:
>git checkout feature/nazwaGałęzi\
>git pull\
>git checkout master\
>git pull\
>git merge feature/nazwaGałęzi\
5. Wyświetlenie konfliktów:
>git status
6. Wchodzimy w pliki, które pokazał git status i naprawiamy konflikty
7. Po rozwiązaniu konfliktów:
>git add nazwaPlikówKtóreMiałyKonflikt\
>git commit
>git push

##

##### Tworzenie nowego feature, gdy nie istnieje do niej gałąź
1. Pobieramy najnowszą wersję mastera:
>git checkout master\
>git pull
2. Tworzymy nową gałąź: 
>git checkout -b feature/nazwaFunkcjonalności
3. Implementujemy funkcjonalności z dobrze opisanymi commitami:
>git add nazwyPlików lub git add .\
>git commit -m "wiadomość opisująca zmiany"\
>git push\
4. Jeśli feature działa poprawnie i nadaje się na produkcję, to mergujemy ją do mastera:
>git checkout feature/nazwaGałęzi\
>git pull\
>git checkout master\
>git pull\
>git merge feature/nazwaGałęzi
5. Wyświetlenie konfliktów:
>git status
6. Wchodzimy w pliki, które pokazał git status i naprawiamy konflikty
7. Po rozwiązaniu konfliktów:
>git add nazwaPlikówKtóreMiałyKonflikt\
>git commit\
>git push\
8. test test

## 🧠Autorzy

- [@KoniecznyWojciech](https://www.github.com/WojciechKonieczny)
- [@SzyszkaKamil](https://www.github.com/SzyszkaKamil)
- [@KalwinskiDawid](https://www.github.com/kalwinskidawid)
- [@Pasozyt](https://www.github.com/Pasozyt)
