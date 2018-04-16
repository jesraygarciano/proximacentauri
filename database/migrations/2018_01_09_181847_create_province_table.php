<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('provinces',function( Blueprint $table ){
            $table->increments('id');
            $table->string('iso_code');
            $table->string('name');
            $table->string('capital');
            $table->string('division');
            $table->string('country_code');
            $table->string('region');
        });


        // Philippines provinces data JSON format
        $provinces = '[{"code":"PH-ABR","province":"Abra (province)","capital":"Bangued, Abra","division":"Luzon","region":"CAR"},{"code":"PH-AGN","province":"Agusan del Norte","capital":"Cabadbaran","division":"Mindanao","region":"XIII"},{"code":"PH-AGS","province":"Agusan del Sur","capital":"Prosperidad, Agusan del Sur","division":"Mindanao","region":"XIII"},{"code":"PH-AKL","province":"Aklan","capital":"Kalibo, Aklan","division":"Visayas","region":"VI"},{"code":"PH-ALB","province":"Albay","capital":"Legazpi, Albay","division":"Luzon","region":"V"},{"code":"PH-ANT","province":"Antique (province)","capital":"San Jose de Buenavista, Antique","division":"Visayas","region":"VI"},{"code":"PH-APA","province":"Apayao","capital":"Kabugao, Apayao","division":"Luzon","region":"CAR"},{"code":"PH-AUR","province":"Aurora (province)","capital":"Baler, Aurora","division":"Luzon","region":"III"},{"code":"PH-BAS","province":"Basilan","capital":"Lamitan","division":"Mindanao","region":"ARMM"},{"code":"PH-BAN","province":"Bataan","capital":"Balanga, Bataan","division":"Luzon","region":"III"},{"code":"PH-BTN","province":"Batanes","capital":"Basco, Batanes","division":"Luzon","region":"II"},{"code":"PH-BTG","province":"Batangas","capital":"Batangas City","division":"Luzon","region":"IV-A"},{"code":"PH-BEN","province":"Benguet","capital":"La Trinidad, Benguet","division":"Luzon","region":"CAR"},{"code":"PH-BIL","province":"Biliran","capital":"Naval, Biliran","division":"Visayas","region":"VIII"},{"code":"PH-BOH","province":"Bohol","capital":"Tagbilaran","division":"Visayas","region":"VII"},{"code":"PH-BUK","province":"Bukidnon","capital":"Malaybalay","division":"Mindanao","region":"X"},{"code":"PH-BUL","province":"Bulacan","capital":"Malolos","division":"Luzon","region":"III"},{"code":"PH-CAG","province":"Cagayan","capital":"Tuguegarao","division":"Luzon","region":"II"},{"code":"PH-CAN","province":"Camarines Norte","capital":"Daet, Camarines Norte","division":"Luzon","region":"V"},{"code":"PH-CAS","province":"Camarines Sur","capital":"Pili, Camarines Sur","division":"Luzon","region":"V"},{"code":"PH-CAM","province":"Camiguin","capital":"Mambajao, Camiguin","division":"Mindanao","region":"X"},{"code":"PH-CAP","province":"Capiz","capital":"Roxas, Capiz","division":"Visayas","region":"VI"},{"code":"PH-CAT","province":"Catanduanes","capital":"Virac, Catanduanes","division":"Luzon","region":"V"},{"code":"PH-CAV","province":"Cavite","capital":"Imus City","division":"Luzon","region":"IV-A"},{"code":"PH-CEB","province":"Cebu","capital":"Cebu City","division":"Visayas","region":"VII"},{"code":"PH-COM","province":"Compostela Valley","capital":"Nabunturan, Compostela Valley","division":"Mindanao","region":"XI"},{"code":"PH-NCO","province":"Cotabato","capital":"Kidapawan","division":"Mindanao","region":"XII"},{"code":"PH-DAV","province":"Davao del Norte","capital":"Tagum","division":"Mindanao","region":"XI"},{"code":"PH-DAS","province":"Davao del Sur","capital":"Digos","division":"Mindanao","region":"XI"},{"code":"PH-DVO","province":"Davao Occidental","capital":"Malita, Davao Occidental","division":"Mindanao","region":"XI"},{"code":"PH-DAO","province":"Davao Oriental","capital":"Mati, Davao Oriental","division":"Mindanao","region":"XI"},{"code":"PH-DIN","province":"Dinagat Islands","capital":"San Jose, Dinagat Islands","division":"Mindanao","region":"XIII"},{"code":"PH-EAS","province":"Eastern Samar","capital":"Borongan","division":"Visayas","region":"VIII"},{"code":"PH-GUI","province":"Guimaras","capital":"Jordan, Guimaras","division":"Visayas","region":"VI"},{"code":"PH-IFU","province":"Ifugao","capital":"Lagawe, Ifugao","division":"Luzon","region":"CAR"},{"code":"PH-ILN","province":"Ilocos Norte","capital":"Laoag","division":"Luzon","region":"I"},{"code":"PH-ILS","province":"Ilocos Sur","capital":"Vigan","division":"Luzon","region":"I"},{"code":"PH-ILI","province":"Iloilo","capital":"Iloilo City","division":"Visayas","region":"VI"},{"code":"PH-ISA","province":"Isabela (province)","capital":"Ilagan","division":"Luzon","region":"II"},{"code":"PH-KAL","province":"Kalinga (province)","capital":"Tabuk, Philippines","division":"Luzon","region":"CAR"},{"code":"PH-LUN","province":"La Union","capital":"San Fernando, La Union","division":"Luzon","region":"I"},{"code":"PH-LAG","province":"Laguna (province)","capital":"Santa Cruz, Laguna","division":"Luzon","region":"IV-A"},{"code":"PH-LAN","province":"Lanao del Norte","capital":"Tubod, Lanao del Norte","division":"Mindanao","region":"X"},{"code":"PH-LAS","province":"Lanao del Sur","capital":"Marawi","division":"Mindanao","region":"ARMM"},{"code":"PH-LEY","province":"Leyte (province)","capital":"Tacloban","division":"Visayas","region":"VIII"},{"code":"PH-MAG","province":"Maguindanao","capital":"Shariff Aguak, Maguindanao","division":"Mindanao","region":"ARMM"},{"code":"PH-MAD","province":"Marinduque","capital":"Boac, Marinduque","division":"Luzon","region":"IV-B"},{"code":"PH-MAS","province":"Masbate","capital":"Masbate City","division":"Luzon","region":"V"},{"code":"PH-MSC","province":"Misamis Occidental","capital":"Oroquieta","division":"Mindanao","region":"X"},{"code":"PH-MSR","province":"Misamis Oriental","capital":"Cagayan de Oro","division":"Mindanao","region":"X"},{"code":"PH-MOU","province":"Mountain Province","capital":"Bontoc, Mountain Province","division":"Luzon","region":"CAR"},{"code":"PH-NEC","province":"Negros Occidental","capital":"Bacolod","division":"Visayas","region":"VI"},{"code":"PH-NER","province":"Negros Oriental","capital":"Dumaguete","division":"Visayas","region":"VII"},{"code":"PH-NSA","province":"Northern Samar","capital":"Catarman, Northern Samar","division":"Visayas","region":"VIII"},{"code":"PH-NUE","province":"Nueva Ecija","capital":"Palayan","division":"Luzon","region":"III"},{"code":"PH-NUV","province":"Nueva Vizcaya","capital":"Bayombong, Nueva Vizcaya","division":"Luzon","region":"II"},{"code":"PH-MDC","province":"Occidental Mindoro","capital":"Mamburao, Occidental Mindoro","division":"Luzon","region":"IV-B"},{"code":"PH-MDR","province":"Oriental Mindoro","capital":"Calapan","division":"Luzon","region":"IV-B"},{"code":"PH-PLW","province":"Palawan","capital":"Puerto Princesa","division":"Luzon","region":"IV-B"},{"code":"PH-PAM","province":"Pampanga","capital":"San Fernando, Pampanga","division":"Luzon","region":"III"},{"code":"PH-PAN","province":"Pangasinan","capital":"Lingayen, Pangasinan","division":"Luzon","region":"I"},{"code":"PH-QUE","province":"Quezon","capital":"Lucena, Philippines","division":"Luzon","region":"IV-A"},{"code":"PH-QUI","province":"Quirino","capital":"Cabarroguis, Quirino","division":"Luzon","region":"II"},{"code":"PH-RIZ","province":"Rizal","capital":"Antipolo","division":"Luzon","region":"IV-A"},{"code":"PH-ROM","province":"Romblon","capital":"Romblon, Romblon","division":"Luzon","region":"IV-B"},{"code":"PH-WSA","province":"Samar (province)","capital":"Catbalogan","division":"Visayas","region":"VIII"},{"code":"PH-SAR","province":"Sarangani","capital":"Alabel, Sarangani","division":"Mindanao","region":"XII"},{"code":"PH-SIG","province":"Siquijor","capital":"Siquijor, Siquijor","division":"Visayas","region":"VII"},{"code":"PH-SOR","province":"Sorsogon","capital":"Sorsogon City","division":"Luzon","region":"V"},{"code":"PH-SCO","province":"South Cotabato","capital":"Koronadal","division":"Mindanao","region":"XII"},{"code":"PH-SLE","province":"Southern Leyte","capital":"Maasin","division":"Visayas","region":"VIII"},{"code":"PH-SUK","province":"Sultan Kudarat","capital":"Isulan, Sultan Kudarat","division":"Mindanao","region":"XII"},{"code":"PH-SLU","province":"Sulu","capital":"Jolo, Sulu","division":"Mindanao","region":"ARMM"},{"code":"PH-SUN","province":"Surigao del Norte","capital":"Surigao City","division":"Mindanao","region":"XIII"},{"code":"PH-SUR","province":"Surigao del Sur","capital":"Tandag","division":"Mindanao","region":"XIII"},{"code":"PH-TAR","province":"Tarlac","capital":"Tarlac City","division":"Luzon","region":"III"},{"code":"PH-TAW","province":"Tawi-Tawi","capital":"Bongao, Tawi-Tawi","division":"Mindanao","region":"ARMM"},{"code":"PH-ZMB","province":"Zambales","capital":"Iba, Zambales","division":"Luzon","region":"III"},{"code":"PH-ZAN","province":"Zamboanga del Norte","capital":"Dipolog","division":"Mindanao","region":"IX"},{"code":"PH-ZAS","province":"Zamboanga del Sur","capital":"Pagadian","division":"Mindanao","region":"IX"},{"code":"PH-ZSI","province":"Zamboanga Sibugay","capital":"Ipil, Zamboanga Sibugay","division":"Mindanao","region":"IX"}]';


        // insert province data on provinces table
        foreach (json_decode($provinces) as $province) {
            \DB::table('provinces')->insert([
                'iso_code'=>$province->code,
                'name'=>$province->province,
                'division'=>$province->division,
                'region'=>$province->region,
                'capital'=>$province->capital,
                'country_code'=>'PHL',
                ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('provinces');
    }
}
