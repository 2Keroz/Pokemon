<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            <?php if (isset($pokemon['isCaptured'])): ?>
                <?php if ($pokemon['isCaptured'] == 0): ?>
                    <!-- Le Pokémon n'est pas capturé, afficher le bouton Capturer -->
                    <form method="POST" action="">
                        <input type="hidden" name="pokemonId" value="<?php echo $pokemon['id']; ?>">
                        <button type="submit" name="action" value="Capturer">Capturer</button>
                        <button type="submit" name="action" value="Laisser tranquille">Laisser tranquille</button>
                    </form>
                <?php else: ?>
                    <!-- Le Pokémon est capturé, afficher le bouton Libérer -->

                <?php endif; ?>
            <?php endif; ?>
            <div>
                <h3>Pokémon capturés :</h3>
                <ul>
                    <?php if (!empty($capturedPoke)): ?>
                        <?php foreach ($capturedPoke as $poke): ?>
                                <?php echo htmlspecialchars($poke['name']); ?>
                                <form method="POST" action="">
                                    <input type="hidden" name="pokemonId" value="<?php echo $poke['id']; ?>">
                                    <button type="submit" name="action" value="Libérer">Libérer</button>
                                </form>
                                <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>Aucun Pokémon capturé.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>