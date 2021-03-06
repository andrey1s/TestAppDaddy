AppDaddy ­ PHP Assessment
=========================

Введение
--------
В данном задании нужно сделать небольшое приложение удовлетворяющее заданным требованиям. Код должен демонстировать ваши навыки разработки.
По возможности, избегайте overengineering, но имейте ввиду поддерживаемость, расширяемость и чистоту вашего кода.
Нет никаких ограничений на кол­во кода, который вы напишите. Можете использовать любые фреймворки, библиотеки и базы данных на ваш выбор.


Требования
----------
Необходимо сделать приложение, обрабатывающие сырые данные инсталлов нескольких приложений. Полученные данные нужно преобразовать в данные с суммарным кол­во инсталлов в 5­ти минутные интервалы и вывести в виде одной таблицы.
На вход есть файл со строками в следующем формате:
127.0.0.1; 26/Oct/2015:00:00:01 +0300; tracker.internal; /api/postback; 200; 3; 0.000 [0.000]; app_id=com.example.mobile&click_time=&install_time=2015­10­25+20%3A59 %3A07.641&campaign=&country_code=ES&city=None&ip_address=95.23.180.15 3&language=espa%3Fol&device_name=&device_type=Lenovo%3A%3ATab2A7­10F& app_version=4.16.2&media_source= ; ­
127.0.0.1; 26/Oct/2015:00:00:01 +0300; tracker.internal; /api/postback; 200; 3; 0.000 [0.000]; app_id=com.example.mobile&click_time=&install_time=2015­10­25+20%3A59 %3A13.925&campaign=&country_code=MX&city=None&ip_address=189.162.106. 177&language=espa%3Fol&device_name=&device_type=samsung%3A%3AGT­I9195 L&app_version=4.16.2&media_source= ; ­
На выходе нужно предоставить следующую таблицу:
1. Временной интервал ­ timestamp начала 5­минутного интервала, в который
произошли инсталлы (поле install_time в исходном файле). Например, если инсталл был сделан в 2015­10­26 13:02:35, то временной интервал должен быть равен равен 1445864555, что соответствует 2015­10­26 13:00:00.
2. app_id ­ поле app_id из исходного файла. Произвольная строка.
3. Country ­ 2­х буквенный код страны в соответсвии со стандартом ISO­3166
4. Кол­во инсталлов ­ суммарное кол­во инсталлов в этот временной интервал, для этого приложения в этой стране.
Вы можете выбрать любой удобным вам вариант реализации ­ консольное или веб приложение. Формат выводимых данных также может быть любой удобный для вас ­ CSV, JSON, html таблица или любой другой.
Пример исходных данных вы можете скачать по
https://dl.dropboxusercontent.com/u/14092529/appdaddy/sample_installs.csv.gz

Замечания
---------
1. Страну можно брать только из поля country_code, без использования geoip или других алгоритмов. Если страну определить не удалось, то country=””.
2. Предполагайте, что исходный формат и способ получения сырых данных, а также кол­во источников может меняться. Однако, вам нужно предоставить реализацию только для приложеного формата.
3. Предполагайте, что формат и способ хранения результата выполнения может меняться. Однако, вам нужно предоставить реализацию только в одном, удобном вам формате.