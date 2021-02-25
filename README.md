﻿# test_task2
1. Написать SQL-запрос, возвращающий название фирмы и ее телефон. В результате
должны быть представлены все фирмы по одному разу. Если у фирмы нет телефона,
нужно вернуть пробел или прочерк. Если у фирмы несколько телефонов, нужно
вернуть любой из них.
Исходные данные:
Таблица Firms:
ID Name
1 Sony
2 Panasonic
3 Samsung
Таблица Phones:
phone_id FirmID Phone
1 1 332-55-56
2 1 332-50-01
3 2 256-39-11
Для представленного примера запрос должен вернуть:
Name Phone
Sony 332-55-56
Panasonic 256-39-11
Samsung
Дополнительные задания:
a. Вернуть все фирмы, не имеющие телефонов.
b. Вернуть все фирмы, имеющие не менее 2-х телефонов.
c. Вернуть все фирмы, имеюшие менее 2-х телефонов.
d. Вернуть фирму, имеющую максимальное кол-во телефонов.
 
2. Написать небольшую гостевую книгу, с возможностью добавлять записи в нее(форма с полями имя,емейл, сообщение). 
С проверкой на валидность полей(клиентская и серверная проверка).Записи должны быть отсортированы в порядке добавления(новые появляются сверху).
И сделать отдельную страницу(с паролем) где администратор может модерировать записи.
Результат предоставить в виде архива с sql и php файлами.
3. Есть дата в будущем, например 25.10.2015 00:00
 вывести на странице счетчик сколько осталось дней,часов,минут,секунд до этой даты(javascript)
