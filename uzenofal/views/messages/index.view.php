<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/messages">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="body" class="block text-sm font-medium text-gray-700">
                                    Üzenet
                                </label>

                                <div class="mt-1">
                                    <textarea
                                        id="body"
                                        name="body"
                                        rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Üzenet közlése az üzenőfalon"
                                    ><?= $_POST['body'] ?? '' ?></textarea>

                                    <?php if (isset($errors['body'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Küldés
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="w-full grid place-content-center">
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <?php if (isset($messages)) : ?>
                    <?php foreach ($messages as $message) : ?>
                        <div class="shadow-lg shadow-grey-500 max-w-sm rounded overflow-justify my-5">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2"><?= $message['username'] ?? 'Ismeretlen'?></div>
                                <p class="text-gray-700 text-justify">
                                    <?= htmlspecialchars($message['body']) ?>
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $message['created_at'] ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </dl>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
