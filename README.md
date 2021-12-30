Инструменты разработки
-------------------
1. Laravel 
2. PHP
3. HTML
4. CSS
ФУНКЦИОНАЛ САЙТА:
1. регистрация
2. авторизация 
3. создание проектов администратором
4. коментирование проектов 

Загрузка сайта на Docker в Windows
-------------------
1. Для начала нужно зарегистрироваться на сайте DockerHub и создать там репозиторий. После этого нужно скачать Docker Desktop. И затем скачать WSL для того, чтобы Docker Desktop работал.
2. Также нужно создать Dockerfile, который необходимо разместить в папку с проектом. Стоит обратить внимание на EXPOSE. Важно установить EXPOSE, иначе можно столкнуться с проблемой ERR_EMPTY_RESPONSE, т.к. код будет выполняться только во внутренней части.
3. Нужно создать файл requirements.txt и прописать там библиотеки. Это нужно, чтобы Docker правильно работал.
4. Необходимо создать файл Docker-compose. В моём случае используется безсерверная СУБД SQLite, и её указывать в данном файле не нужно. Указываем версию компоса, команду запуска с локальным адресом, порты((внешний/внутренний) Очень важно указать два порта. Для этого и нужен был EXPOSE.
5. Используем команду docker build -t serush0n/myproject:v1. Она нужна для того, чтобы задать "версию" в Docker.
6. Используем команду docker image ls для просмотра и docker push serush0n/myproject:v1 для выгрузки компонентов на v1.
7. Далее, переходим в папку с проектом через cd в терминале, и пишем следующие команды: docker-compose up -d и docker-compose up. 

После этого сайт напустится по адресу 0.0.0.0:8000.
Итог
-------------------
В итоге, в Docker Desktop под контейнером отображается запуск.
![image](https://user-images.githubusercontent.com/60968034/147727269-536d3b35-fb69-453b-af1b-694d7c525520.png)

