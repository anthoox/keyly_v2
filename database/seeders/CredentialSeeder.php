<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Credential;
use App\Models\Category;
use App\Models\User;

class CredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $socialCat = Category::where('name', 'Redes Sociales')->first();
        $bankCat = Category::where('name', 'Bancos')->first();

        // Credencial de Redes Sociales
        Credential::create([
            'user_id' => $user->id,
            'category_id' => $socialCat->id,
            'service_name' => 'Instagram',
            'username' => 'usuario_ejemplo', // Se guardará cifrado
            'password' => 'Secreto123!',    // Se guardará cifrado
            'url' => 'https://instagram.com',
            'is_favorite' => true,
        ]);

        // Credencial de Banco
        Credential::create([
            'user_id' => $user->id,
            'category_id' => $bankCat->id,
            'service_name' => 'BBVA',
            'username' => '12345678X',
            'password' => 'ClaveBancaria99',
            'url' => 'https://bbva.es',
            'is_favorite' => false,
        ]);
    }
}
