<?php

    class Car {

        private string $name;
        private int $year;

        public function __construct(string $name, int $year) {
            $this->name = $name;
            $this->year = $year;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getYear(): int {
            return $this->year;
        }

}
