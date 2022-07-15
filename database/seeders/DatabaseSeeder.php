<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Member;
use App\Models\Barang;
use App\Models\Discount;
use App\Models\Outlet;
use App\Models\User;
use App\Models\UserType;

use App\Models\Topbar;
use App\Models\Hero;
use App\Models\About;
use App\Models\Testimoni;
use App\Models\Contact;
use App\Models\Message;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        Member::create([
            'name' => 'Calvin Ramadhan',
            'nickname' => 'Calvin',
            'slug' => 'calvin',
            'number' => '01234567890',
            'outlet' => 'Bogor'
        ]);

        Member::create([
            'name' => 'Budiansyah',
            'nickname' => 'Budi',
            'slug' => 'budi',
            'number' => '01234567890',
            'outlet' => 'Bogor'
        ]);
        
        Barang::create([
            'name' => 'Kiloan',
            'slug' => 'kiloan-1',
            'harga' => '7500',
            'jumlah' => '1',
            'type' => '0'
        ]);

        Barang::create([
            'name' => 'Kiloan',
            'slug' => 'kiloan-2',
            'harga' => '15000',
            'jumlah' => '2',
            'type' => '0'
        ]);

        Barang::create([
            'name' => 'Boneka Small',
            'slug' => 'boneka-small',
            'harga' => '5000',
            'jumlah' => '1',
            'type' => '1'
        ]);

        Barang::create([
            'name' => 'Boneka Small',
            'slug' => 'boneka-small-2',
            'harga' => '10000',
            'jumlah' => '2',
            'type' => '1'
        ]);

        Barang::create([
            'name' => 'Karpet',
            'slug' => 'karpet',
            'harga' => '8000',
            'jumlah' => '1',
            'type' => '1'
        ]);

        Discount::create([
            'name' => 'Grand Opening',
            'slug' => 'grand-opening',
            'discount' => '3000',
            'type' => '0'
        ]);

        Discount::create([
            'name' => '100 CUSTOMER',
            'slug' => '100-customer',
            'discount' => '10',
            'type' => '1'
        ]);

        Outlet::create([
            'name' => 'Bogor',
            'slug' => 'bogor',
            'alamat' => 'Ciomas'
        ]);

        Outlet::create([
            'name' => 'Jogja',
            'slug' => 'jogja',
            'alamat' => 'Gunung Kidul'
        ]);

        UserType::create([
            'name' => 'owner',
            'slug' => 'owner'
        ]);

        UserType::create([
            'name' => 'staf',
            'slug' => 'staf'
        ]);

        UserType::create([
            'name' => 'admin',
            'slug' => 'admin'
        ]);

        User::create([
            'usertype_id' => '1',
            'name' => 'handi',
            'username' => 'handi',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('password'),
            'outlet' => 'Bogor'
        ]);

        User::create([
            'usertype_id' => '2',
            'name' => 'desi',
            'username' => 'desi',
            'email' => 'staf@gmail.com',
            'password' => bcrypt('password'),
            'outlet' => 'Bogor'
        ]);

        User::create([
            'usertype_id' => '3',
            'name' => 'bintang',
            'username' => 'bintang',
            'email' => 'bintang@gmail.com',
            'password' => bcrypt('password'),
            'outlet' => 'Bogor'
        ]);

        User::create([
            'usertype_id' => '3',
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'outlet' => 'Jogja'
        ]);

        Topbar::create([
            'text_1' => ' bintang@starlaundry.com',
            'icon_1' => 'icofont-envelope',
            'text_2' => ' +62 123 4567 8900',
            'icon_2' => 'icofont-phone',
            'text_3' => ' Setiap Hari 09.00-17.00 WIB',
            'icon_3' => 'icofont-clock-time icofont-flip-horizontal'
        ]);

        Hero::create([
            'm_title' => 'Why You Must Choose Star Laundry',
            'm_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.',
            'icon_1' => 'bx bx-receipt',
            'title_1' => 'Corporis voluptates sit',
            'desc_1' => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip',
            'icon_2' => 'bx bx-cube-alt',
            'title_2' => 'Ullamco laboris ladore pan',
            'desc_2' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt',
            'icon_3' => 'bx bx-images',
            'title_3' => 'Labore consequatur',
            'desc_3' => 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere'
        ]);

        About::create([
            'm_title' => 'Enim quis est voluptatibus aliquid consequatur fugiat',
            'm_desc' => 'Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero laboriosam sint et id nulla tenetur. Suscipit aut voluptate.',
            'icon_1' => 'bx bx-fingerprint',
            'title_1' => 'Lorem Ipsum',
            'desc_1' => 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
            'icon_2' => 'bx bx-gift',
            'title_2' => 'Nemo Enim',
            'desc_2' => 'Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis',
            'icon_3' => 'bx bx-atom',
            'title_3' => 'Dine Pad',
            'desc_3' => 'Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis'
        ]);

        Testimoni::create([
            'name' => 'Saul Goodman',
            'position' => 'Ceo & Founder',
            'statement' => 'Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.',
            'slug' => 'saul-goodman',
        ]);

        Testimoni::create([
            'name' => 'Morgan Nope',
            'position' => 'People',
            'statement' => 'Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.',
            'slug' => 'morgan-nope'
        ]);

        Contact::create([
            'desc' => 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas',
            'address' => 'Ciomas',
            'email' => 'bintang@info.com',
            'call' => '+62 123 4567 8900 ',
        ]);

        Message::create([
            'name' => 'Bintang',
            'email' => 'bintang@test.com',
            'subject' => 'test message',
            'message' => 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas'
        ]);

    }
}
