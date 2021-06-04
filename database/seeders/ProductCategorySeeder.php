<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        ProductCategory::factory()->state(['name' => 'Tacos'])->create();
        ProductCategory::factory()->state(['name' => 'Sandwichs'])->create();
        ProductCategory::factory()->state(['name' => 'Burgers'])->create();
        ProductCategory::factory()->state(['name' => 'Pizzas'])->create();
        ProductCategory::factory()->state(['name' => 'Pasticcios'])->create();
        ProductCategory::factory()->state(['name' => 'Boissons'])->create();
        ProductCategory::factory()->state(['name' => 'Burgers (au charbon)'])->create();
        ProductCategory::factory()->state(['name' => 'Tacos Gratiné (au charbon)'])->create();
        ProductCategory::factory()->state(['name' => 'Tacos (au charbon)'])->create();
        ProductCategory::factory()->state(['name' => 'Fries (au charbon)'])->create();
        ProductCategory::factory()->state(['name' => 'Kids'])->create();
        ProductCategory::factory()->state(['name' => 'Pâtes'])->create();
        ProductCategory::factory()->state(['name' => 'Chawarma'])->create();
        ProductCategory::factory()->state(['name' => 'Poulet Rôti'])->create();
        ProductCategory::factory()->state(['name' => 'Chich-Taouk'])->create();
        ProductCategory::factory()->state(['name' => 'Nos Plats'])->create();
        ProductCategory::factory()->state(['name' => 'Entrées Froides'])->create();
        ProductCategory::factory()->state(['name' => 'Salades'])->create();
        ProductCategory::factory()->state(['name' => 'Mojitos'])->create();
        ProductCategory::factory()->state(['name' => 'Nos Jus'])->create();
        ProductCategory::factory()->state(['name' => 'Petits Déjeuner'])->create();
        ProductCategory::factory()->state(['name' => 'Paninis'])->create();
        ProductCategory::factory()->state(['name' => 'Crêpes'])->create();
        ProductCategory::factory()->state(['name' => 'Desserts'])->create();
        ProductCategory::factory()->state(['name' => 'Pâtisseries'])->create();
        ProductCategory::factory()->state(['name' => 'Cookies'])->create();
        ProductCategory::factory()->state(['name' => 'Pizza brownies'])->create();
        ProductCategory::factory()->state(['name' => 'Spécialités'])->create();
        ProductCategory::factory()->state(['name' => 'Entrée Chaudes'])->create();
        ProductCategory::factory()->state(['name' => 'Grillades'])->create();
        ProductCategory::factory()->state(['name' => 'Autres'])->create();
        ProductCategory::factory()->state(['name' => 'Frappuccinos'])->create();
        ProductCategory::factory()->state(['name' => 'Milkshakes'])->create();
        ProductCategory::factory()->state(['name' => 'Glaces'])->create();
        ProductCategory::factory()->state(['name' => 'Mix'])->create();
        ProductCategory::factory()->state(['name' => 'Extra'])->create();
        ProductCategory::factory()->state(['name' => 'Menu'])->create();
        ProductCategory::factory()->state(['name' => 'GRAND MCWRAP'])->create();
        ProductCategory::factory()->state(['name' => 'MENUS DUO MABROUK'])->create();
        ProductCategory::factory()->state(['name' => 'PETITES FAIMS'])->create();
        ProductCategory::factory()->state(['name' => 'HAPPY MEAL'])->create();
        ProductCategory::factory()->state(['name' => 'ICE CREAM'])->create();
        ProductCategory::factory()->state(['name' => 'BOITE A PARTAGER'])->create();
        ProductCategory::factory()->state(['name' => 'Poulet roti'])->create();
        ProductCategory::factory()->state(['name' => 'Tajine'])->create();
        ProductCategory::factory()->state(['name' => 'Pizza (Base Sauce Tomate)'])->create();
        ProductCategory::factory()->state(['name' => 'Pizza (Base Crème Fraîche)'])->create();
        ProductCategory::factory()->state(['name' => 'Tex Mex'])->create();
        ProductCategory::factory()->state(['name' => 'Commande Personnalisée'])->create();
        ProductCategory::factory()->state(['name' => 'Les spéciaux'])->create();
        ProductCategory::factory()->state(['name' => 'Les suprêmes'])->create();
    }
}
