<?php

    class StoreItems {

        private Car $car;
        private int $price;
        private int $rentalPrice;
        private string $isRent;


        public function __construct(Car $car, int $price, int $rentalPrice, string $isRent = "No") {
            $this->car = $car;
            $this->price = $price;
            $this->rentalPrice = $rentalPrice;
            $this->isRent = $isRent;
        }

        public function getPrice(): int {
            return $this->price;
        }

        public function getRentalPrice(): int {
            return $this->rentalPrice;
        }

        public function getRent(): string {
            return $this->isRent;
        }

        public function setRent(string $input): void {
            $this->isRent = $input;
        }

        public function getCar(): Car {
            return $this->car;
        }

    }