<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            ['id' => 1, 'name' => 'Administrador'],
            ['id' => 2, 'name' => 'Moderador'],
            ['id' => 3, 'name' => 'Simple']
        );

        $sectors = array(
            ['id' => 1, 'name' => 'Aficiones'],
            ['id' => 2, 'name' => 'Agricultura'],
            ['id' => 3, 'name' => 'Agua y aguas residuales'],
            ['id' => 4, 'name' => 'Alcance y tráfico'],
            ['id' => 5, 'name' => 'Alimentación'],
            ['id' => 6, 'name' => 'Alimentación y nutrición'],
            ['id' => 7, 'name' => 'Alojamiento'],
            ['id' => 8, 'name' => 'Arquitectura'],
            ['id' => 9, 'name' => 'Arte y cultura'],
            ['id' => 10, 'name' => 'Asistencia y cuidados'],
            ['id' => 11, 'name' => 'Aviación'],
            ['id' => 12, 'name' => 'Bebidas alcohólicas'],
            ['id' => 13, 'name' => 'Bebidas sin alcohol'],
            ['id' => 14, 'name' => 'Centros comerciales y outlets'],
            ['id' => 15, 'name' => 'Ciberdelincuencia'],
            ['id' => 16, 'name' => 'Cifras clave del comercio minorista'],
            ['id' => 17, 'name' => 'Cine, radio y televisión'],
            ['id' => 18, 'name' => 'Combustibles fósiles'],
            ['id' => 19, 'name' => 'Comercio al por mayor'],
            ['id' => 20, 'name' => 'Comercio electrónico'],
            ['id' => 21, 'name' => 'Comercio electrónico B2B'],
            ['id' => 22, 'name' => 'Comercio electrónico B2C'],
            ['id' => 23, 'name' => 'Comercio electrónico C2C'],
            ['id' => 24, 'name' => 'Comercio internacional'],
            ['id' => 25, 'name' => 'Comportamiento de compra'],
            ['id' => 26, 'name' => 'CONSTRUCCIÓN'],
            ['id' => 27, 'name' => 'Construcción naval'],
            ['id' => 28, 'name' => 'Cosmética y cuidado personal'],
            ['id' => 29, 'name' => 'Delincuencia y aplicación de la ley'],
            ['id' => 30, 'name' => 'Demografía'],
            ['id' => 31, 'name' => 'Demografía y uso'],
            ['id' => 32, 'name' => 'Deporte y fitness'],
            ['id' => 33, 'name' => 'Deporte y ocio'],
            ['id' => 34, 'name' => 'DIY/Bricolaje'],
            ['id' => 35, 'name' => 'Economía'],
            ['id' => 36, 'name' => 'Educación y ciencia'],
            ['id' => 37, 'name' => 'Electrodomésticos'],
            ['id' => 38, 'name' => 'Electrónica'],
            ['id' => 39, 'name' => 'Electrónica'],
            ['id' => 40, 'name' => 'Electrónica de consumo'],
            ['id' => 41, 'name' => 'Emisiones'],
            ['id' => 42, 'name' => 'Empleo cualificado'],
            ['id' => 43, 'name' => 'Energía y tecnología medioambiental'],
            ['id' => 44, 'name' => 'Entidades financieras'],
            ['id' => 45, 'name' => 'Equipamiento del hogar'],
            ['id' => 46, 'name' => 'Estado de salud'],
            ['id' => 47, 'name' => 'Ganadería'],
            ['id' => 48, 'name' => 'Geografía y medio ambiente'],
            ['id' => 49, 'name' => 'Gestión de residuos'],
            ['id' => 50, 'name' => 'Hardware'],
            ['id' => 51, 'name' => 'Hospitales, farmacias y médicos'],
            ['id' => 52, 'name' => 'Industria aeroespacial'],
            ['id' => 53, 'name' => 'Industria de defensa'],
            ['id' => 54, 'name' => 'Industria del videojuego'],
            ['id' => 55, 'name' => 'Industria farmacéutica'],
            ['id' => 56, 'name' => 'Industria química'],
            ['id' => 57, 'name' => 'Ingeniería'],
            ['id' => 58, 'name' => 'Ingeniería civil'],
            ['id' => 59, 'name' => 'Internet móvil y aplicaciones'],
            ['id' => 60, 'name' => 'Juegos de azar'],
            ['id' => 61, 'name' => 'Juguetes'],
            ['id' => 62, 'name' => 'Logística'],
            ['id' => 63, 'name' => 'Mascotas'],
            ['id' => 64, 'name' => 'Material de oficina'],
            ['id' => 65, 'name' => 'Mercado editorial'],
            ['id' => 66, 'name' => 'Mercados financieros'],
            ['id' => 67, 'name' => 'Metales'],
            ['id' => 68, 'name' => 'Minería, metales y minerales'],
            ['id' => 69, 'name' => 'Mobiliario'],
            ['id' => 70, 'name' => 'Moda y complementos'],
            ['id' => 71, 'name' => 'Motores de búsqueda y SEO'],
            ['id' => 72, 'name' => 'Música'],
            ['id' => 73, 'name' => 'Pagos digitales'],
            ['id' => 74, 'name' => 'Papel y pasta de papel'],
            ['id' => 75, 'name' => 'Parques y actividades al aire libre'],
            ['id' => 76, 'name' => 'Pesca y acuicultura'],
            ['id' => 77, 'name' => 'Plástico y caucho'],
            ['id' => 78, 'name' => 'Política y Gobierno'],
            ['id' => 79, 'name' => 'Producción de material rodante'],
            ['id' => 80, 'name' => 'Producción de vehículos'],
            ['id' => 81, 'name' => 'Productos de limpieza'],
            ['id' => 82, 'name' => 'Productos minerales no metálicos'],
            ['id' => 83, 'name' => 'Publicidad y marketing'],
            ['id' => 84, 'name' => 'Marketing digital'],
            ['id' => 85, 'name' => 'Refinerías de petróleo'],
            ['id' => 86, 'name' => 'Reformas en el hogar y jardinería'],
            ['id' => 87, 'name' => 'Religión'],
            ['id' => 88, 'name' => 'Restaurantes y cafeterías'],
            ['id' => 89, 'name' => 'Ropa y complementos'],
            ['id' => 90, 'name' => 'Salud e higiene'],
            ['id' => 91, 'name' => 'Sector inmobiliario'],
            ['id' => 92, 'name' => 'Seguros'],
            ['id' => 93, 'name' => 'Servicios de TI'],
            ['id' => 94, 'name' => 'Servicios empresariales'],
            ['id' => 95, 'name' => 'Servicios financieros'],
            ['id' => 96, 'name' => 'Silvicultura'],
            ['id' => 97, 'name' => 'Sistema sanitario'],
            ['id' => 98, 'name' => 'Social media y contenido creado por el usuario'],
            ['id' => 99, 'name' => 'Software'],
            ['id' => 100, 'name' => 'Tabaco'],
            ['id' => 101, 'name' => 'Tecnología médica'],
            ['id' => 102, 'name' => 'Telecomunicaciones'],
            ['id' => 103, 'name' => 'Tráfico rodado'],
            ['id' => 104, 'name' => 'Transporte acuático'],
            ['id' => 105, 'name' => 'Transporte ferroviario'],
            ['id' => 106, 'name' => 'TURISMO Y HOSTELERÍA'],
            ['id' => 107, 'name' => 'Uso de medios de comunicación'],
            ['id' => 108, 'name' => 'Viajes de negocios'],
            ['id' => 109, 'name' => 'Viajes de ocio'],
            ['id' => 110, 'name' => 'Vídeos online y entretenimiento']
        );

        $companies = array(
            ['id' => 1, 'name' => 'Moddo', 'logo' => '', 'sector_id' => 1, 'currency' => 'USD'],
            ['id' => 2, 'name' => 'Paradigma Digital', 'logo' => '', 'sector' => 2, 'currency' => 'USD'],
            ['id' => 3, 'name' => 'Tek-know', 'logo' => '', 'sector_id' => 3, 'currency' => 'USD'],
            ['id' => 4, 'name' => 'LogosCorp', 'logo' => '', 'sector_id' => 1, 'currency' => 'USD'],
            ['id' => 5, 'name' => 'BeeConcept', 'logo' => '', 'sector_id' => 1, 'currency' => 'USD']
        );


        $users = array(
            [
                'name' => 'JesusAdmin',
                'email' => 'admin@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '1',
                'company_id' => '1'
            ],
            [
                'name' => 'JesusModerador',
                'email' => 'moderador@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '2',
                'company_id' => '1'
            ],
            [
                'name' => 'JesusSimpleUser',
                'email' => 'simple@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '3',
                'company_id' => '1'
            ],
            [
                'name' => 'JesusAdmin2',
                'email' => 'admin2@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '1',
                'company_id' => '2'
            ],
            [
                'name' => 'JesusModerador2',
                'email' => 'moderador2@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '2',
                'company_id' => '2'
            ],
            [
                'name' => 'JesusSimpleUser2',
                'email' => 'simple2@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '3',
                'company_id' => '2'
            ]
        );

        $categories = array(
            ['id' => 1, 'name' => 'Ropa / Moda / Calzado'],
            ['id' => 2, 'name' => 'Informatica / Electronica'],
            ['id' => 3, 'name' => 'Hogar / Cocina / Baño'],
            ['id' => 4, 'name' => 'Alimentación'],
        );

        DB::table('categories')->insert($categories);
        DB::table('roles')->insert($roles);
        DB::table('sectors')->insert($sectors);
        DB::table('companies')->insert($companies);
        DB::table('users')->insert($users);
    }
}
