<?php

    class Wallet {
        private int $cash;

        public function __construct(int $cash){
            $this->cash = $cash;
        }

        public function getCash(): int {
            return $this->cash;
        }

        public function setCash(int $input): void {
            if($input <= $this->cash){
                $this->cash -= $input;
            } else die("Not enough money!");
        }

    }