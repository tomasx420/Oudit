<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@hz.nl',
            'password' => Hash::make('asd123')
        ]);

        Type::factory()->create([
            'name' => '5S'
        ]);

        foreach ($this->questions as $questionText) {
            Question::factory()->create([
                'question' => $questionText,
                'isItWithOpenAnswer' => 0
            ]);
        }

        Question::factory()->create([
            'question' => 'Additional comments',
            'isItWithOpenAnswer' => 1
        ]);

        $questions = Question::all();

        Type::first()->questions()->attach($questions);
    }

    private $questions = [
        'Documentatie: Zijn er oude en overbodige documenten in het gebied?',
        'Apparatuur: Zijn hulpmiddelen, meetinstrumenten, machines wij van onnodige materialen?',
        'Materialen: Zijn er geen onnodige reserve onderdelen in het gebied (gebieds reserve onderdelen mogen max. 1 week in het gebied staan)',
        'Persoonlijke bezittingen: Is het gebied vrij van persoonlijke bezittingen?',
        'Schappen: zijn er in het gebied ongedefinieerde planken (kasten, tafel, enz.)',
        'Veiligheid: Is het gebied vrij van losse hangende kabels of leidingen?',
        'Vloer markering: Zijn de werkgebieden duidelijk gemarkeerd?',
        'Vloer markering: zijn de opslaglocaties duidelijk omschreven?',
        'Woord markeren: De paden en wegen duidelijk aangegeven?',
        'Visueel Management: Zijn schaduwborden binnen het gebied in gebruik en zijn alle items op hun aangewezen plek?',
        'Visueel Management: Alles is duidelijk gemarkeerd en gevisualiseerd (afvalbak, containers, enz.)',
        'Visueel Management: Zijn kasten en kast inhoud beschreven?',
        'Visueel Management: Zijn alle documenten op de juiste plaats?',
        'Netheid: Vloeren, leidingen, machines en kasten zijn vrij van vuil, vloeistoffen en afval?',
        'Netheid: Zijn reinigingsmiddelen beschikbaar en op de aangewezen plaats?(TCO-kar)',
        'Netheid: Worden SIS activiteiten uitgevoerd en geregistreerd (SAP productiemelding)?',
        'Netheid: Zijn er SAP labels geschreven en opgelost t.b.v. 5S (Tellen afgewerkte ook mee)',
        'Netheid: Zijn de SOP, de informatieborden en andere informatie, schoon en wij van schade?',
        'Veiligheid: Is de vloer vrij van schade en in gewenste staat?',
        'Veiligheid: Zijn gereedschappen en machine wij van schade en in standaard conditie?',
        'Veiligheid: Is er voldoende verlichting in het gebied?',
        'Standaariseren: Is aan alle vragen hierboven voldaan?',
        'Standaardiseren: Zijn alle S.I.S. plannen ingevuld en ondertekend?',
        'Standaariseren: Is voldaan aan de regels van 5S in het gebied?',
        'In stand houden: Is de score toegenomen sinds de laatse audit?',
        'In stand houden: Min. 50% van de werknemers hebben de training 5S gevolgd en nam deel aan een workshop?',
        'In stand houden: Werden alle maatregelen op de geplande datum uitgevoerd?',
        'Sustainability: Zijn alle 5S-evaluaties van de laatste 5 weken uitgevoerd?'
    ];
}
