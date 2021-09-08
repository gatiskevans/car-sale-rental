<?php

    class Store {

        private array $cars;

        public function __construct(array $cars) {
            foreach($cars as $car) {
                $this->addCar($car);
            }
        }

        private function addCar(StoreItems $car): void {
            $this->cars[] = $car;
        }

        public function listCars(): string {
            $listCars = '';
            foreach($this->cars as $index => $car) {
                $listCars .= "$index | {$car->getCar()->getName()}, "
                    . "Year: {$car->getCar()->getYear()}, "
                    . "Price: \${$car->getPrice()}, "
                    . "Rent: {$car->getRent()}\n";
            }
            return $listCars;
        }

        public function menu(Wallet $cash) {
            echo "1 - Car sell\n";
            echo "2 - Car rental\n";
            $menu = readline("Buy or Rent? (Q to exit) ");
            if((int) $menu === 1) $this->buyCar($cash);
            if((int) $menu === 2) $this->rentCar($cash);
            if(strtoupper($menu) === "Q") die("Bye!");
        }

        public function buyCar(Wallet $cash): void {
            echo $this->listCars();
            $item = (int) readline("Choose a car you want to buy: ");
            foreach($this->cars as $index => $car) {
                if ($item === $index && $car->getRent() === "No") {
                    echo "$index | {$car->getCar()->getName()}, Year: {$car->getCar()->getYear()}, Price: \${$car->getPrice()}\n";
                    $confirmation = readline("Confirm purchase? (Y/N)");
                    switch(strtoupper($confirmation)) {
                        case "Y":
                            $cash->setCash($car->getPrice());
                            unset($this->cars[$index]);
                            break;
                    }
                }

            }
        }

        public function rentCar(Wallet $cash): void {
            echo $this->listCars();
            $item = (int) readline("Choose a car you want to rent: ");
            foreach($this->cars as $index => $car) {
                if ($item === $index && $car->getRent() === "No") {
                    echo "$index | {$car->getCar()->getName()}, "
                        . "Year: {$car->getCar()->getYear()}, "
                        . "Price: \${$car->getRentalPrice()}, "
                        . "Rent: {$car->getRent()}\n";
                    $confirmation = readline("Confirm rental? (Y/N)");
                    switch(strtoupper($confirmation)) {
                        case "Y":
                            $cash->setCash($car->getRentalPrice());
                            $car->setRent("\e[31mYes\e[0m");
                            break;
                    }
                }

            }
        }

    }