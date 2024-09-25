<?php 
abstract class PokemonRepository extends Db {
    private static function request($request, $params = []) {
        $db = self::getInstance();
        $stmt = $db->prepare($request);
        $stmt->execute($params);
        self::disconnect();
        return $stmt;
    }

    public static function getPoke() {
        $sql = "SELECT id, name, isCaptured FROM pokemon WHERE isCaptured = 0 ORDER BY RAND() LIMIT 1";
        $stmt = self::request($sql);
        if ($stmt === false) {
            throw new Exception("La requête SQL a échoué.");
        }
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function getCapturedPoke() {
        $sql = "SELECT id, name FROM pokemon WHERE isCaptured = 1";
        $stmt = self::request($sql);
        if ($stmt === false) {
            throw new Exception("La requête SQL a échoué.");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Capturer un Pokémon (isCaptured = 1)
    public static function capture($pokemonId) {
        $sql = "UPDATE pokemon SET isCaptured = 1 WHERE id = :id";
        self::request($sql, ['id' => $pokemonId]);
    }

    // Relâcher un Pokémon (isCaptured = 0)
    public static function release($pokemonId) {
        $sql = "UPDATE pokemon SET isCaptured = 0 WHERE id = :id";
        self::request($sql, ['id' => $pokemonId]);
    }
}

?>