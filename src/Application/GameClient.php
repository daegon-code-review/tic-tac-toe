<?php

namespace TicTacToe\Application;

// todo imitate processes
// todo так ніби підключено інший проект, із своєю доктриною, підключенням до бази і всім своїм, все ізольовано,
// todo окрім інтерфейсу на рівні виклику PHP функцій/методів
// todo пояснити, що це трохи надміру, але зроблено, щоб пояснити суть
// todo а реальні проекти можна робити з зв'язком до фреймворку, але тільки на рівні спільних компонентів
// todo а іноді забити хер і робити тісний зв'язок, бо для цього є повно пакетів композера і це швидше і дешевше

// todo Action should take scalars or DTO and return scalars or DTO
// todo Action should take scalars or DTO and return scalars or DTO
// todo Action should take scalars or DTO and return scalars or DTO

// todo розробка гри не як бібліотеки, а як окремо існуючого додатку. Конфігурація деталей не передається всередину.
// todo Конфішурується саме гра і все, що їй необхідно, а не тип бази і т. д. Тип бази вже заданий грою.

// todo питання кожні N слайдів (щоб розуміти, що всі в тємі)

use Doctrine\ORM\EntityManager;

class GameClient
{
    public function __construct(EntityManager $em)
    {

    }
}
