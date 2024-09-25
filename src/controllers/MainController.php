<?php
class MainController extends Controller
{
    public function index()
    {
        $pokemon = PokemonRepository::getPoke();
      

        $pokemonName = is_array($pokemon) && isset($pokemon["name"]) ? $pokemon["name"] : "Nom du Pokémon non disponible";
        echo is_array($pokemon) ? "$pokemonName sauvage apparaît" : "Aucun Pokémon trouvé.";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pokemonId'], $_POST['action'])) {
            $action = $_POST['action'];
            $pokemonId = intval($_POST['pokemonId']);

            if ($action == 'Capturer') {
                PokemonRepository::capture($pokemonId);
            } elseif ($action == 'Libérer') {
                PokemonRepository::release($pokemonId);
            }
        }
        $capturedPoke = PokemonRepository::getCapturedPoke();
        require(__DIR__ . "/../../views/main.php");
    }
}
