<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
        	['name'=>'Association','phone'=>'+052688515685','email'=>'malagasyetotorkia@gmail.com','address'=>'Istanbul Mecidiyeköy, Cumhuriyet Cad. No:451'],
        	['name'=>'Consulat','phone'=>'0262876515865','fax'=>'52546515465','email'=>'consulat.malagasy@gmail.com','address'=>'Büyükdere Cad. Kral Apt. No:75/10 80300 Mecidiyeköy / Turquie']
        ];

        foreach ($contacts as $contact) {
        	Contact::create($contact);
        }
    }
}
