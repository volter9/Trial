# Trial OOP CMS

**В процессе разработки**!

CMS на ООП и PHP5(.4).

## По мотивам ~~одноименного сериала~~

Данной [темы](http://phpforum.su/index.php?showtopic=83858&st=0).

> Давайте попробуем. Создадим простую CMS, с модулями:
> 
> * Страница
> * Категория
> * Пользователь
> * Комментарий
> 
> Пользователи могут добавлять комментарии к страницам. Пользователи могут добавлять страницы если у них есть на это право. Для страниц можно задавать категории. Комментарии могут относиться не только к страницам, но и к Пользователям, Категориям, Комментариям.
> Категории могут относиться к категориям. 
> 
> Требования к реализации: без стороних библиотек, с использованием одной парадигмы *максимально* возможно.

## Как читать (структура приложения)

Все начинается в `index.php`. Там регестрируется autoloader, инициализирует приложение и выполняет запрос.

В данном репозитории есть несколько основных папок:

* `App/` - Файлы/классы приложения
* `Trial/` – Ядро CMS
* `Tests/` – Юнит тесты
* `assets/` – Файлы для front-end'а

В ядре классы сгруппированы по данным папкам:

* `Auth/` – Классы авторизация
* `Core/` – Общие классы
* `DB/` – Классы для работы с БД
* `Helpers/` – Утилиты
* `Injection/` – Классы внедрения зависимостей: контейнер и фабрика
* `Routing/` – Маршрутизация
* `Services/` – Сервисы
* `View/` – Классы для работы с представлением