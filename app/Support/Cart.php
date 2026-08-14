<?php

namespace App\Support;

use App\Models\Drink;

class Cart
{
    public static function add(int $drinkId, int $quantity = 1): void
    {
        $cart = session('cart', []);
        $cart[$drinkId] = ($cart[$drinkId] ?? 0) + max(1, $quantity);
        session(['cart' => $cart]);
    }

    public static function update(int $drinkId, int $quantity): void
    {
        $cart = session('cart', []);

        if ($quantity < 1) {
            unset($cart[$drinkId]);
        } else {
            $cart[$drinkId] = $quantity;
        }

        session(['cart' => $cart]);
    }

    public static function remove(int $drinkId): void
    {
        $cart = session('cart', []);
        unset($cart[$drinkId]);
        session(['cart' => $cart]);
    }

    public static function clear(): void
    {
        session()->forget('cart');
    }

    public static function count(): int
    {
        return (int) array_sum(session('cart', []));
    }

    /**
     * @return array{groups: array<int, array{cafeteria: mixed, items: array, total: float}>, grand_total: float}
     */
    public static function grouped(): array
    {
        $cart = session('cart', []);
        $groups = [];
        $grandTotal = 0.0;

        if ($cart === []) {
            return ['groups' => $groups, 'grand_total' => $grandTotal];
        }

        $drinks = Drink::with('cafeteria')
            ->whereIn('id', array_keys($cart))
            ->get()
            ->keyBy('id');

        foreach ($cart as $drinkId => $quantity) {
            $drink = $drinks->get($drinkId);

            if (! $drink) {
                continue;
            }

            $unitPrice = $drink->finalPrice();
            $lineTotal = $unitPrice * $quantity;
            $cafeteriaId = $drink->cafeteria_id;

            if (! isset($groups[$cafeteriaId])) {
                $groups[$cafeteriaId] = [
                    'cafeteria' => $drink->cafeteria,
                    'items' => [],
                    'total' => 0.0,
                ];
            }

            $groups[$cafeteriaId]['items'][] = [
                'drink' => $drink,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'line_total' => $lineTotal,
            ];
            $groups[$cafeteriaId]['total'] += $lineTotal;
            $grandTotal += $lineTotal;
        }

        return ['groups' => $groups, 'grand_total' => $grandTotal];
    }
}
