<?php

namespace App\Tests\TicTacToe\Action;

use App\TicTacToe\Action\StartGame;
use App\TicTacToe\Model\Game;

final class StartGameTest extends ActionTestCase
{
    public function testStartGame()
    {
        $action = self::$container->get(StartGame::class);

        $id = $action->execute();
        $this->assertEquals(13, strlen($id));

        /** @var Game $game */
        $game = $this->getEntityManager()->getRepository(Game::class)->find($id);

        $this->assertEquals($game->getId(), $id);
        $this->assertEquals($game->getWinner(), null);
        $this->assertEquals($game->getPlayers(), []);

        // todo add tests
        // todo add UI
        // todo during UI adding:    make Kernel dependent on ContainerBuilder, or create new ContainerBuilders
        // todo теоретично UI може не потребувати валідації інпуту команди, достатньо валідації в моделі
        // todo (валідного стану)
        // todo валідація може бути на JS фронті і Exсeption-а достатньо

        // todo Не робити окремо від сімфоні, бо ж не поймуть... ???
        // todo Потрібно дати можливість зручно дописати/замінити адаптери, для того, щоб APP запустився на
        // todo іншому фреймворку. НЕ потрібно відразу закладати ці адаптери.
        // todo В грі я зробив бізнес логіку залежною від компонентів які надає Symfony, але тим не менше бізнес логіка
        // todo може транспортуватися в інший фреймворк незмінною, єдине, що необхідно буде також транспортувати
        // todo і налаштувати залежні компоненти.
        // todo Додати діаграми.

        // todo Так що, все що в контроллері перенести в Action? Action має бути до появи контроллера

        // todo Потрібно розуміти, що в Model, а що по за нею. Наприклад потрібно імпортувати гру з CSV. Де писати код?

        // todo Думати про дію, як про частину бізнес процесу
        // todo або думати про дію, як про поцес редагування даних
    }
}
