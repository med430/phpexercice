<?php
class PokemonEau extends Pokemon {
    public function attack(Pokemon $p) : int {
        $attack = $this->attackPokemon->attack();
        if($p instanceof PokemonFeu) {
            $attack = $attack * 2;
        } else if($p instanceof PokemonPlante || $p instanceof PokemonEau) {
            $attack = $attack * 0.5;
        }
        $p->reduceHp($attack);
        return $attack;
    }
}