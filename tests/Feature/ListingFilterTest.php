<?php

namespace Tests\Feature;

use App\Models\Alcohol;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListingFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_and_parent_filter_work_together(): void
    {
        $this->withoutVite();
        $beer = Alcohol::create(['name' => 'Sör']);
        $wine = Alcohol::create(['name' => 'Bor']);
        Product::create(['name' => 'Világos tesztital', 'price' => 1000, 'alcohol_id' => $beer->id]);
        Product::create(['name' => 'Barna tesztital', 'price' => 1100, 'alcohol_id' => $beer->id]);
        Product::create(['name' => 'Világos bor', 'price' => 2000, 'alcohol_id' => $wine->id]);

        $this->get(route('products.index', ['search' => 'Világos', 'alcohol_id' => $beer->id]))
            ->assertOk()->assertSee('Világos tesztital')->assertDontSee('Barna tesztital')->assertDontSee('Világos bor');
        $this->get(route('products.index', ['alcohol_id' => $beer->id]))
            ->assertOk()->assertSee('Világos tesztital')->assertSee('Barna tesztital')->assertDontSee('Világos bor');
        $this->get(route('products.index', ['search' => 'Világos']))
            ->assertOk()->assertSee('Világos tesztital')->assertSee('Világos bor')->assertDontSee('Barna tesztital');
        $this->get(route('products.index', ['category' => 'beer']))
            ->assertOk()->assertSee('Világos tesztital')->assertDontSee('Világos bor');
        $this->get(route('products.index', ['search' => 'Nincsilyen']))
            ->assertOk()->assertSee('Nincs a keresésnek megfelelő termék.');
        $this->get(route('alcohols.index', ['search' => 'Sör']))
            ->assertOk()->assertSee('Sör')->assertDontSee('Bor')
            ->assertSee(route('products.index', ['alcohol_id' => $beer->id]), false);
        $this->get('/')->assertOk()->assertSee(route('products.index', ['category' => 'beer']), false);
    }
}
