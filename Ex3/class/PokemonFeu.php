<?php
class PokemonFeu extends Pokemon {
    public function attack(Pokemon $p) : int {
        $attack = $this->attackPokemon->attack();
        if($p instanceof PokemonPlante) {
            $attack = $attack * 2;
        } else if($p instanceof PokemonFeu || $p instanceof PokemonEau) {
            $attack = $attack * 0.5;
        }
        $p->reduceHp($attack);
        return $attack;
    }
}