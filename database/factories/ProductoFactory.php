<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Producto::class;

    public function definition()
    {
        return [
           "id" => $this->faker->number_format,
           "slug" => $this->faker-> slug(6),
           "seo_title" => $this->faker-> sentence(1),
           "seo_description" => $this->faker-> sentence(6),
           "seo_image" => $this->faker-> image($width=16),
    
           "nombre" => $this->faker-> name(null),
           "descripcion" => $this->faker-> sentence(3),
           "image" => $this->faker-> image(null),
           "stock" => $this->faker-> numberBetween(100, 200),
           "cod_barra" => $this->faker-> serialize,
           "serial" => $this->faker-> serialize,
    
           "pvp_detal" => $this->faker-> numfmt_format_currency,
           "pvp_mayor" => $this->faker-> numfmt_format_currency,
            
           "orden" => $this->faker-> numerify("##"),
           "publicado" => $this->faker-> boolean(10),
    
           "subcategoria_id'" => $this->faker-> null,
           "marca_id" => $this->faker-> null,
           "modelo_id" => $this->faker-> null,
           "proveedor_id" => $this->faker-> null,
        ];
    }
}
