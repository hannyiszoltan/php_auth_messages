<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex md:h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <a href="/messages"
                               class="<?= urlIs('/messages') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Üzenetek</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="mr-3">
                        <div class="text-base font-medium leading-none text-white">
                            <?= $_SESSION['user']['username'] ?? '' ?>
                        </div>
                        <div class="text-sm font-medium leading-none text-gray-400">
                            <?= $_SESSION['user']['email'] ?? '' ?>
                        </div>
                    </div>
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                    class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">


                                <?php if ($_SESSION['user'] ?? false) : ?>

                                    <a href="/profile">
                                        <img class="h-8 w-8 rounded-full"
                                             src="https://media.istockphoto.com/id/1210939712/vector/user-icon-people-icon-isolated-on-white-background-vector-illustration.jpg?s=612x612&w=0&k=20&c=vKDH9j7PPMN-AiUX8vsKlmOonwx7wjqdKiLge7PX1ZQ="
                                             alt="profpic">
                                    </a>
                                <?php else : ?>
                                    <a href="/register"
                                       class="<?= urlIs('/register') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Regisztráció</a>
                                    <a href="/login"
                                       class="<?= urlIs('/login') || urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> ml-2 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Bejelentkezés</a>
                                <?php endif; ?>
                            </button>
                        </div>
                    </div>
                    <?php if ($_SESSION['user'] ?? false) : ?>
                        <div class="ml-5">
                            <form method="POST" action="/session">
                                <input type="hidden" name="_method" value="DELETE"/>

                                <button class="text-white">Kijelentkezés</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->

            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">

        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

        <?php if ($_SESSION['user'] ?? false) : ?>
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <a href="/messages"
                   class="<?= urlIs('/messages') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> block px-3 py-2 rounded-md text-base font-medium"
                   aria-current="page">
                    Üzenetek
                </a>
            </div>
        <?php endif; ?>

        <div class="border-t border-gray-700 pt-4 pb-3">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                             src="https://media.istockphoto.com/id/1210939712/vector/user-icon-people-icon-isolated-on-white-background-vector-illustration.jpg?s=612x612&w=0&k=20&c=vKDH9j7PPMN-AiUX8vsKlmOonwx7wjqdKiLge7PX1ZQ="
                             alt="profpic">
                    </div>


                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">
                            <?= $_SESSION['user']['username'] ?? '' ?>
                        </div>
                        <div class="text-sm font-medium leading-none text-gray-400">
                            <?= $_SESSION['user']['email'] ?? '' ?>
                        </div>
                    </div>
                </div>

                <div class="mt-3 space-y-1 px-2">
                    <a href="/profile"
                       class="<?= urlIs('/profile') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> block px-3 py-2 rounded-md text-base font-medium">
                        A Profilod
                    </a>
                    <form method="POST" action="/session">
                        <input type="hidden" name="_method" value="DELETE"/>

                        <button
                            class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                            Kijelentkezés
                        </button>
                    </form>
                </div>
            <?php else : ?>
                <a href="/register"
                   class="<?= urlIs('/register') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> ml-4 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Regisztráció</a>
                <a href="/login"
                   class="<?= urlIs('/login') || urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> ml-2 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Bejelentkezés</a>
            <?php endif; ?>

        </div>
    </div>
</nav>