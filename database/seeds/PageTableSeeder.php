<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert(
            [
            [
                'title' => 'contact',
                'slug' => '/contact',
                'images' => '',
                'meta_title' => 'LEASEOFFERTE.com',
                'meta_description' => 'LEASEOFFERTE.com in gevestigd in Utrecht. Wij verzorgen leasing van auto’s, trucks, (land)bouwmachines, heftrucks en overige apparatuur.',
            ],
            [
                'title' => 'werkwijze',
                'slug' => '/werkwijze',
                'images' => '',
                'meta_title' => 'LEASEOFFERTE.com',
                'meta_description' => 'Werkwijze van aanvraag tot aflevering financial- of operational lease bij LEASEOFFERTE.com. scherp tarief, goede voorwaarden.',
            ],
            [
                'title' => 'Deze objecten hebben klanten bij LEASEOFFERTE.com geleased',
                'slug' => '/deze-objecten-hebben-klanten-bij-leaseofferte-com-geleased',
                'images' => '',
                'meta_title' => 'Equipment lease regelt u bij LEASEOFFERTE.com',
                'meta_description' => 'Hieronder een greep uit de verschillende objecten waarvoor LEASEOFFERTE.com de afgelopen tijd het leasecontract heeft verzorgd. Alles dat zakelijk gebruikt wordt, een serienummer heeft, verplaatsbaar is en een zekere restwaarde heeft kan in principe bij ons geleased worden.',
            ],
            [
                'title' => 'Plaats uw voorraad op LEASEOFFERTE.com',
                'slug' => '/plaats-uw-voorraad',
                'images' => '',
                'meta_title' => 'LEASEOFFERTE.com',
                'meta_description' => 'Publiceer uw voorraad auto\'s, trucks, (land)bouwmaterieel of heftrucks gratis en automatisch op LEASEOFFERTE.com. Wij zorgen dat onze klanten uw voertuigen kopen.',
            ],
            [
                'title' => 'Plaats onze financial lease calculator in uw eigen website',
                'slug' => '/lease-calculator-in-uw-website',
                'images' => '',
                'meta_title' => 'LEASEOFFERTE.com',
                'meta_description' => 'Plaats onze financial lease calculator in uw website. Hiermee kunnen uw klanten voor uw producten een lease offerte maken en ter acceptatie insturen. Bekijk de demo.',
            ],
            [
                'title' => 'Handleiding met tips voor auto kopen, leasen of inruilen.',
                'slug' => '/handleiding-kopen-of-leasen-van-een-auto',
                'images' => '',
                'meta_title' => 'Handleiding voor kopen of leasen van een auto',
                'meta_description' => 'Tips voor aankoop, leasing of inruil van een auto. Ongecensureerd en rechtstreeks uit de praktijk. Hoe pakt u het aan en waar moet u op letten?',
            ],
            [
                'title' => 'Nieuws van LEASEOFFERTE.com',
                'slug' => '/nieuws-leasemaatschappij-leaseofferte-com',
                'images' => '',
                'meta_title' => 'LEASEOFFERTE.com',
                'meta_description' => 'Nieuws van leasemaatschappij LEASEOFFERTE.com over leasing van auto\'s, trucks, machines, bedrijfsmiddelen.',
            ],
            [
                'title' => 'Bedrijfsgoederen leasen| Financial lease | België',
                'slug' => '/financial-lease-belgie',
                'images' => '',
                'meta_title' => 'LEASEOFFERTE.com',
                'meta_description' => 'Leaseofferte.com is ook actief in België. Wij verzorgen financial lease (zakelijke financiering) van uw bedrijfsgoederen',
            ]
            ]
        );
    }
}
