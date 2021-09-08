<?php

    require_once 'Store.php';
    require_once 'StoreItems.php';
    require_once 'Car.php';
    require_once 'Wallet.php';

    $wallet = new Wallet(10000);
    $store = new Store(
        [
            new StoreItems(new Car("Audi A4", 2002), 2500, 50),
            new StoreItems(new Car("BMW E46", 2004), 5000, 40),
            new StoreItems(new Car("Hyundai i30", 2008), 2700, 80),
            new StoreItems(new Car("Volkswagen Passat B5", 2001), 1600, 60),
            new StoreItems(new Car("Volvo S40", 2007), 2600, 80),
        ]
    );

    while(true){

        echo "Your cash: \${$wallet->getCash()}\n";
        $store->menu($wallet);

    }