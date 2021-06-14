<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StagetoolSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'email' => 'joris.maervoet@odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'mentor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'email' => 'sven.knockaert@odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'coordinator',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => "info@apple.com",
            'password' => Hash::make('Azerty123'),
            'role' => 'company',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => "hr@ml6.com",
            'password' => Hash::make('Azerty123'),
            'role' => 'company',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => "hr@fleetmaster.com",
            'password' => Hash::make('Azerty123'),
            'role' => 'company',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => 'louis.dhont@student.odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'student',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => 'guido.pallemans@student.odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'student',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => 'johan.donne@odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'mentor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('companies')->insert([
            'user_id' => 3,
            'kbo_number' => "0312.349.292",
            'name' => "Apple",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('companies')->insert([
            'user_id' => 4,
            'kbo_number' => "0192.482.192",
            'name' => "ML6",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('companies')->insert([
            'user_id' => 5,
            'kbo_number' => "0481.128.838",
            'name' => "Fleetmaster",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'user_id' => 1,
            'firstname' => 'Joris',
            'lastname' => 'Maervoet',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'user_id' => 2,
            'firstname' => 'Sven',
            'lastname' => 'knockaert',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'user_id' => 8,
            'firstname' => 'Johan',
            'lastname' => 'Donne',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('students')->insert([
            'user_id' => 6,
            'firstname' => 'Louis',
            'lastname' => 'D\'Hont',
            'r_number' => 'r1039382',
            'allowed' => 1,
            'approved' => 'In afwachting',
            'proposal_id' => 0,
            'completed_days' => 0,
            'mentor_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('students')->insert([
            'user_id' => 7,
            'firstname' => 'Guido',
            'lastname' => 'Pallemans',
            'r_number' => 'r0284739',
            'allowed' => 1,
            'approved' => 'In afwachting',
            'proposal_id' => 0,
            'completed_days' => 0,
            'mentor_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 0,
            'status' => 'In afwachting',
            'description' => 'De Remote Sensing unit van VITO ontwikkelt en opereert innovatieve aardobservatiesystemen die helpen om grip te krijgen op de grote maatschappelijke en economische uitdagingen waar onze planeet voor staat. Onze projecten bevinden zich in de sfeer van data distributie, on-demand beeldverwerking op grote en schaalbare platformen en Big Data analytics om informatie uit satelliet en airborne (UAV, drones) gegevens te halen waarbij deze datasets enorm snel in omvang groeien (van terabytes tot petabytes).

De resulterende informatie wordt vandaag via verschillende online applicaties aangeboden aan onze eindgebruikers. Door de stijgende vraag naar interactieve visualisaties en cross platform integraties, zijn we op zoek naar iemand die een actieve rol kan spelen in het ontwerpen en ontwikkelen van online applicaties en bijhorende backend systemen. De wereld van remote sensing biedt hierin verschillende uitdagingen die vragen voor creatieve oplossingen met een rechtstreekse impact op een breed spectrum van eindgebruikers.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => '2021-08-20',
            'contract_file_location' => '/',
            'company_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 0,
            'status' => 'In afwachting',
            'description' => 'Om dit beheer in goede banen te leiden werden binnen de eenheid een aantal toepassingen ontwikkeld die moeten geüpgraded en met elkaar gekoppeld worden. Een aantal bestaande toepassingen werden ontwikkeld en draaien in Access en VBA, soms in combinatie met SQL Server, waardoor kennis hierover onontbeerlijk is om deze databanken op korte/middellange termijn te kunnen blijven ondersteunen en de upgrade naar een toekomstgerichte toepassing mogelijk te maken.  Volgende taken staan op je lijst:
* Je evalueert de behoeften van de stakeholders en levert een applicatie af die gebaseerd is op goed geschreven code, met alles wat van een moderne code verwacht mag worden.
* Je werkt samen met collega’s van MWL en/of andere eenheden aan het definiëren van de scope en prioriteiten.  Hierbij kom je met doelgerichte en haalbare oplossingen.
* Je zorgt voor duidelijke specificaties en documentaties van de oplossing.
* Je overlegt voortdurend met de verschillende stakeholders in het ontwikkelproces.
* Je bent in staat om op basis van een functionele analyse het technisch design uit te werken en de software te schrijven.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => '2021-07-13',
            'contract_file_location' => '/',
            'company_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 1,
            'status' => 'Goedgekeurd',
            'description' => 'Voor onze software factory in Kortrijk zijn we op zoek naar een Junior Java Developer. Als Junior Java Developer maak je deel uit van een dynamisch team dat op een Agile / Scrum manier is georganiseerd: beheer van een product backlog, pokerplanningsessies, dagelijkse stand-up meetings, opsplitsing van het werk in sprints van 2 tot 3 weken, retrospectives, ...
Deze manier van werken laat elk teamlid toe sterk bij het project betrokken te zijn en bij te dragen aan de richtingen die bepaald worden.
Je neemt deel aan de ontwikkeling van nieuwe toepassingen op basis van de bestaande ontwikkelingsstandaarden en frameworks.
Op basis van de functionele analysedocumenten, opgesteld door de analisten en de technische richtlijnen van de architecten, zorg je voor de ontwikkeling, de testing en de documentatie van de ontwikkelde toepassingen.
Je bent ook verantwoordelijk voor het oplossen van bugs in de code, evolutief onderhoud en voor het ontwikkelen van nieuwe functies.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => '2021-07-06',
            'contract_file_location' => '/',
            'company_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 1,
            'status' => 'Goedgekeurd',
            'description' => 'Is data-analyse één van jouw sterktes en ben je vertrouwd met de principes van datawarehousing en data science? Heb je interesse in het Vlaamse gezondheidsbeleid? Werk je graag in teamverband? Het Departement WVG en het agentschap Zorg en Gezondheid zijn op zoek naar een leergierige data-analist die zelfstandig aan de slag gaat met zijn data technische kennis.

Als data-analist zet je de beschikbare data om in bruikbare en bevattelijke informatie en kennis voor je collega\'s die het gezondheidsbeleid ondersteunen.. Met jouw inlevingsvermogen ben je in staat om de organisatiebehoeften te detecteren en daarop in te spelen. Wij zoeken een nieuwe collega met kennis van relationele databanken, (NO)SQL, data science en datawarehouse concepten, een teamplayer die gestructureerd te werk gaat en een initiatiefnemer die het aandurft om projecten te leiden.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => '2021-08-18',
            'contract_file_location' => '/',
            'company_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 1,
            'status' => 'Goedgekeurd',
            'description' => 'Als Data Analyst vertaal je de business behoeften om nieuwe interoperabiliteitsstandaarden, nieuwe transacties en nieuwe procedures te kunnen uitwerken. Je modelleert, standaardiseert en vereenvoudigt de gegevensuitwisseling tussen de verschillende actoren van de gezondheidszorg. Je werkt nieuwe HL7 FHIR technische artefacten uit en legt deze vast. Tevens zal je ook werken rond het onderhoud van KMEHR berichten.
Je neemt deel aan de onderhandelingen en promoot bij alle actoren van de gezondheidszorg de standaarden die het eHealth-platform heeft ontwikkeld.
Je onderhoudt de grammatica van de berichten inzake interoperabiliteitsstandaarden en laat ze evalueren (onderhoud FHIR artefacten, XSD, XML, ...). Hiervoor werk je samen met andere instanties verantwoordelijk voor de nationale en internationale standaarden.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => '2021-07-28',
            'contract_file_location' => '/',
            'company_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 1,
            'status' => 'Goedgekeurd',
            'description' => 'Als Data Architect speel je een centrale rol in het ontwerp en de ontwikkeling van het platform voor gegevensanalyse. Je neemt actief deel aan de invoering van een strategie met als doel om naar een meer datagerichte organisatie te evolueren.
Je superviseert het ontwerp van de gegevensarchitectuur en de technische architectuur van het gegevensplatform, met inbegrip van de verwerving en de integratie van de gegevens, de gegevensmodellering, het transformatie- en kwaliteitsproces, het beheer van de masterdata, de gegevensopslag en de datamarts.
Je creëert een robuuste en duurzame architectuur die rekening houdt met de huidige en toekomstige businessbehoeften, met de budgettaire voorwaarden, de beschikbaarheid van de gegevens en de nodige resources.
Je evalueert en selecteert de nodige tools en componenten die nodig zijn voor een optimaal beheer van de gegevens (aankoop van gegevens, opslag van gegevens, gegevenskwaliteit, governance van gegevens, visualisatie van de gegevens en advanced analytics).
Je superviseert de ontwikkeling van conceptuele, logische en fysieke gegevensmodellen, van ETL-scripts, van definities van metagegevens, van modellen voor businessgegevens, van requests en rapporten, van werkprocessen en van onderhoudsprocedures.
Je zorgt ervoor dat de technische architectuur (van de gegevensopslag, met inbegrip van de fysieke componenten en hun functionaliteiten) correct gedocumenteerd wordt.
Je coördineert het werk van de data- en BI-architecten alsook de technische verantwoordelijken van de ontwikkelteams.
Je evalueert tot slot de huidige technische architectuur en schat de capaciteit van het systeem in om te beantwoorden aan de verwerkingsbehoeften op korte en lange termijn.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => '2021-06-29',
            'contract_file_location' => '/',
            'company_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 0,
            'status' => 'In afwachting',
            'description' => 'Je werkt samen met de softwarearchitecten en de verschillende infrastructuurteams om de ontwikkelde toepassingen en systemen in het ecosysteem van Smals te integreren. Je zorgt ervoor dat de IT-oplossingen ontworpen en geïmplementeerd worden in overeenstemming met de business- en technische vereisten en in lijn met de IT-strategie.
Je documenteert je keuzes en communiceert die met de verschillende betrokken teams. Je publiceert "best practices" en kan de ontwikkelingsteams begeleiden.
Als deel van de infrastructuurteams ontwerp en onderhoud je kostenefficiënte en duurzame architecturen in lijn met de bedrijfsdoelstellingen.
Als facilitator vorm je de link tussen de ontwikkelingsteams en de operationele teams. Je bent dus betrokken bij het begrijpen van de behoeften en beperkingen van de business.
Je neemt deel aan de implementatie en promotie van CI/CD (Continuous Integration / Continuous Delivery) en IaC (Infrastructure as Code) praktijken. Je integreert de ontwikkelings-, test- en operationele aspecten in je visie.
Je komt tussen in de review van de technische architecturen van applicaties (infrastructuurlaag), op basis van de niet-functionele behoeften van de klant (Service Level) en de catalogus van diensten die door de operationele teams worden ondersteund.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => '2021-08-14',
            'contract_file_location' => '/',
            'company_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
