<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dash = [
            ['position_id'=>"92207376",'name'=>"PLT President Director",'grade'=>"BOD.2",'holder_id'=>"46921",'parent_id'=>"90015527",'parent_name'=>"WU",'hierarchy'=>"2"],
            ['position_id'=>"92181629",'name'=>"GM Hospitality",'grade'=>"M1.2",'holder_id'=>"64868",'parent_id'=>"90020203",'parent_name'=>"WOH",'hierarchy'=>"3"],
            ['position_id'=>"92181622",'name'=>"M Historical Building And Museum",'grade'=>"M2.2",'holder_id'=>"40873",'parent_id'=>"90020203",'parent_name'=>"WOH",'hierarchy'=>"4"],
            ['position_id'=>"92181651",'name'=>"SS Lawang Sewu Historical Building",'grade'=>"M4.1",'holder_id'=>"65566",'parent_id'=>"90020203",'parent_name'=>"WOH",'hierarchy'=>"5"],
            ['position_id'=>"92182887",'name'=>"Pkwt Adm Lawang Sewu",'grade'=>"E.",'holder_id'=>"19930294",'parent_id'=>"90020203",'parent_name'=>"WOH",'hierarchy'=>"6"],
            ['position_id'=>"92181652",'name'=>"SS Indonesia Railway Museum Ambarawa",'grade'=>"M4.1",'holder_id'=>"63773",'parent_id'=>"90020203",'parent_name'=>"WOH",'hierarchy'=>"7"],
            ['position_id'=>"92198354",'name'=>"S Administration IRM Ambarawa",'grade'=>"M4.2",'holder_id'=>"50258",'parent_id'=>"90020203",'parent_name'=>"WOH",'hierarchy'=>"8"],
            ['position_id'=>"92181653",'name'=>"M Hospitality",'grade'=>"M2.2",'holder_id'=>"10680006",'parent_id'=>"90020203",'parent_name'=>"WOH",'hierarchy'=>"9"],
            ['position_id'=>"92181630",'name'=>"GM Tour and Mice",'grade'=>"M1.2",'holder_id'=>"48658",'parent_id'=>"90020204",'parent_name'=>"WOM",'hierarchy'=>"10"],
            ['position_id'=>"92181656",'name'=>"M Tour and Mice",'grade'=>"M2.2",'holder_id'=>"47145",'parent_id'=>"90020204",'parent_name'=>"WOM",'hierarchy'=>"11"],
            ['position_id'=>"92150388",'name'=>"PKWT Tour",'grade'=>"E.",'holder_id'=>"17920083",'parent_id'=>"90020204",'parent_name'=>"WOM",'hierarchy'=>"12"],
            ['position_id'=>"92193685",'name'=>"Pkwt Tour Mice",'grade'=>"E.",'holder_id'=>"19930175",'parent_id'=>"90020204",'parent_name'=>"WOM",'hierarchy'=>"13"],
            ['position_id'=>"92198147",'name'=>"PKWT Tour and Mice Bandung",'grade'=>"E.",'holder_id'=>"19930244",'parent_id'=>"90020204",'parent_name'=>"WOM",'hierarchy'=>"14"],
            ['position_id'=>"92198215",'name'=>"JM Operation Tour and MICE",'grade'=>"M3.1",'holder_id'=>"19930246",'parent_id'=>"90020204",'parent_name'=>"WOM",'hierarchy'=>"15"],
            ['position_id'=>"92198360",'name'=>"AM Administration Tour and MICE",'grade'=>"M3.2",'holder_id'=>"69224",'parent_id'=>"90020204",'parent_name'=>"WOM",'hierarchy'=>"16"],
            ['position_id'=>"92181631",'name'=>"GM Ticketing",'grade'=>"M1.2",'holder_id'=>"48624",'parent_id'=>"90020205",'parent_name'=>"WOT",'hierarchy'=>"17"],
            ['position_id'=>"92206427",'name'=>"PKWT Administrasi Ticketing",'grade'=>"E.",'holder_id'=>"19930266",'parent_id'=>"90020205",'parent_name'=>"WOT",'hierarchy'=>"18"],
            ['position_id'=>"92159847",'name'=>"PKWT Ticketing",'grade'=>"E.",'holder_id'=>"18900136",'parent_id'=>"90020205",'parent_name'=>"WOT",'hierarchy'=>"19"],
            ['position_id'=>"92149761",'name'=>"PKWT Ticketing",'grade'=>"E.",'holder_id'=>"18930108",'parent_id'=>"90020205",'parent_name'=>"WOT",'hierarchy'=>"20"],
            ['position_id'=>"92181660",'name'=>"M Ticketing",'grade'=>"M2.2",'holder_id'=>"45374",'parent_id'=>"90020205",'parent_name'=>"WOT",'hierarchy'=>"21"],
            ['position_id'=>"92202242",'name'=>"Specalist Muda Ticketing",'grade'=>"S3.2",'holder_id'=>"10750004",'parent_id'=>"90020205",'parent_name'=>"WOT",'hierarchy'=>"22"],
            ['position_id'=>"92181661",'name'=>"AM Ticketing KAI dan GDS",'grade'=>"M3.2",'holder_id'=>"58196",'parent_id'=>"90020205",'parent_name'=>"WOT",'hierarchy'=>"23"],
            ['position_id'=>"92202243",'name'=>"JS Operasional KCI",'grade'=>"M4.3",'holder_id'=>"12750018",'parent_id'=>"90020205",'parent_name'=>"WOT",'hierarchy'=>"24"],
            ['position_id'=>"92199987",'name'=>"GM Luxury Coach",'grade'=>"M1.2",'holder_id'=>"40323",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"25"],
            ['position_id'=>"92159860",'name'=>"Pelaksana Luxury Coach",'grade'=>"A5.2",'holder_id'=>"12860023",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"26"],
            ['position_id'=>"92176018",'name'=>"Pkwt Senior Specialist Sales & Marketing",'grade'=>"E.",'holder_id'=>"19850150",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"27"],
            ['position_id'=>"92198581",'name'=>"PKWT Teknisi Kereta Wisata Jakarta",'grade'=>"E.",'holder_id'=>"19760161",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"28"],
            ['position_id'=>"92196227",'name'=>"PKWT Staf Luxury Train",'grade'=>"E.",'holder_id'=>"19930177",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"29"],
            ['position_id'=>"92196230",'name'=>"PKWT Ground Handling Bandung",'grade'=>"E.",'holder_id'=>"19930181",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"30"],
            ['position_id'=>"92196234",'name'=>"PKWT Ground Handling Jakarta",'grade'=>"E.",'holder_id'=>"19930185",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"31"],
            ['position_id'=>"92196236",'name'=>"PKWT Ground Handling Jakarta",'grade'=>"E.",'holder_id'=>"19930187",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"32"],
            ['position_id'=>"92196257",'name'=>"PKWT Ground Handling Jakarta",'grade'=>"E.",'holder_id'=>"19930188",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"33"],
            ['position_id'=>"92202404",'name'=>"AM Marketing and Sales Luxury Coach",'grade'=>"M3.2",'holder_id'=>"49050",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"34"],
            ['position_id'=>"92202402",'name'=>"M Operation Luxury Coach",'grade'=>"M2.2",'holder_id'=>"43925",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"35"],
            ['position_id'=>"92202406",'name'=>"AM Rolling Stock Luxury Coach",'grade'=>"M3.2",'holder_id'=>"48903",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"36"],
            ['position_id'=>"92202408",'name'=>"SS Transport Operation",'grade'=>"M4.1",'holder_id'=>"52375",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"37"],
            ['position_id'=>"92196235",'name'=>"PKWT Ground Handling Surakarta",'grade'=>"E.",'holder_id'=>"19930186",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"38"],
            ['position_id'=>"92196229",'name'=>"PKWT Ground Handling Surabaya",'grade'=>"E.",'holder_id'=>"19930179",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"39"],
            ['position_id'=>"92196297",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930191",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"40"],
            ['position_id'=>"92196258",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930189",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"41"],
            ['position_id'=>"92196316",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930192",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"42"],
            ['position_id'=>"92196338",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930265",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"43"],
            ['position_id'=>"92196339",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930264",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"44"],
            ['position_id'=>"92202900",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930261",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"45"],
            ['position_id'=>"92196296",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930254",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"46"],
            ['position_id'=>"92202824",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930262",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"47"],
            ['position_id'=>"92196340",'name'=>"PKWT Train Attendant",'grade'=>"E.",'holder_id'=>"19930263",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"48"],
            ['position_id'=>"92196232",'name'=>"PKWT Teknisi Kereta Wisata Bandung",'grade'=>"E.",'holder_id'=>"19930183",'parent_id'=>"90022798",'parent_name'=>"WOL",'hierarchy'=>"49"],
            ['position_id'=>"92196589",'name'=>"Plt Director of Finance dan Administrati",'grade'=>"BOD.1",'holder_id'=>"64813",'parent_id'=>"90020201",'parent_name'=>"WK",'hierarchy'=>"51"],
            ['position_id'=>"92181632",'name'=>"VP Finance and Administration",'grade'=>"M1.2",'holder_id'=>"46967",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"52"],
            ['position_id'=>"92181648",'name'=>"M Finance",'grade'=>"M2.2",'holder_id'=>"10760009",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"53"],
            ['position_id'=>"92207059",'name'=>"PKWT Finance Surabaya",'grade'=>"E.",'holder_id'=>"18950137",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"54"],
            ['position_id'=>"92181649",'name'=>"AM Finance dan Taxation",'grade'=>"M3.2",'holder_id'=>"66431",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"55"],
            ['position_id'=>"92149721",'name'=>"Pelaksana Finance",'grade'=>"A5.2",'holder_id'=>"12890019",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"56"],
            ['position_id'=>"92149722",'name'=>"Pelaksana Accounting",'grade'=>"A5.2",'holder_id'=>"13850030",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"57"],
            ['position_id'=>"92149720",'name'=>"Pelaksana Budgeting",'grade'=>"A5.2",'holder_id'=>"10760005",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"58"],
            ['position_id'=>"92181677",'name'=>"M Human Capital",'grade'=>"M2.2",'holder_id'=>"45544",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"59"],
            ['position_id'=>"92196226",'name'=>"PKWT HC Administration",'grade'=>"E.",'holder_id'=>"19930178",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"60"],
            ['position_id'=>"92177151",'name'=>"Trainer PT Kawisata",'grade'=>"E.",'holder_id'=>"19650153",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"61"],
            ['position_id'=>"92181678",'name'=>"AM Human Capital",'grade'=>"M3.2",'holder_id'=>"43310",'parent_id'=>"90020206",'parent_name'=>"WKF",'hierarchy'=>"62"],
            ['position_id'=>"92181633",'name'=>"VP Corporate Secretary",'grade'=>"M1.2",'holder_id'=>"67754",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"63"],
            ['position_id'=>"92150407",'name'=>"PKWT Sekretaris Direksi",'grade'=>"E.",'holder_id'=>"19930166",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"64"],
            ['position_id'=>"92150410",'name'=>"PKWT Driver Direksi",'grade'=>"E.",'holder_id'=>"18810102",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"65"],
            ['position_id'=>"92202409",'name'=>"M Corporate Communication",'grade'=>"M2.2",'holder_id'=>"45196",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"66"],
            ['position_id'=>"92198361",'name'=>"AM Legal",'grade'=>"M3.2",'holder_id'=>"66464",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"67"],
            ['position_id'=>"92198364",'name'=>"Legal Specialist",'grade'=>"S3.2",'holder_id'=>"19930305",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"68"],
            ['position_id'=>"92181639",'name'=>"M Business Development",'grade'=>"M2.2",'holder_id'=>"40878",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"69"],
            ['position_id'=>"92150200",'name'=>"Pelaksana Bisnis Development",'grade'=>"A5.1",'holder_id'=>"12840022",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"70"],
            ['position_id'=>"92177319",'name'=>"PKWT Travel Experience",'grade'=>"E.",'holder_id'=>"19970155",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"71"],
            ['position_id'=>"92193686",'name'=>"PKWT Content Creator",'grade'=>"E.",'holder_id'=>"19930172",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"72"],
            ['position_id'=>"92150411",'name'=>"PKWT Information System",'grade'=>"E.",'holder_id'=>"17830091",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"73"],
            ['position_id'=>"92181642",'name'=>"M Information Technology",'grade'=>"M2.2",'holder_id'=>"11790011",'parent_id'=>"90020207",'parent_name'=>"WUC",'hierarchy'=>"74"],
            ['position_id'=>"92181634",'name'=>"M Internal Audit",'grade'=>"M2.2",'holder_id'=>"46565",'parent_id'=>"90020208",'parent_name'=>"WUIA",'hierarchy'=>"75"],
            ['position_id'=>"92202816",'name'=>"PKWT Pengawas Lapangan Area 1 KCI",'grade'=>"E.",'holder_id'=>"19930252",'parent_id'=>"90023288",'parent_name'=>"WOA",'hierarchy'=>"76"],
            ['position_id'=>"92198353",'name'=>"JS Sales Office",'grade'=>"M4.3",'holder_id'=>"12880021",'parent_id'=>"90023288",'parent_name'=>"WOA",'hierarchy'=>"77"],
            ['position_id'=>"92162076",'name'=>"PKWT Pengawas Lapangan Area 1 Daop 1",'grade'=>"E.",'holder_id'=>"19930267",'parent_id'=>"90023288",'parent_name'=>"WOA",'hierarchy'=>"78"],
            ['position_id'=>"92209818",'name'=>"PKWT Koordinator CC121",'grade'=>"E.",'holder_id'=>"19930295",'parent_id'=>"90023288",'parent_name'=>"WOA",'hierarchy'=>"79"],
            ['position_id'=>"92202817",'name'=>"PKWT Pengawas Lapangan Area 1 KCI",'grade'=>"E.",'holder_id'=>"19930251",'parent_id'=>"90023288",'parent_name'=>"WOA",'hierarchy'=>"80"],
            ['position_id'=>"92166477",'name'=>"PKWT Pengawas Lapangan Area 1 KCI",'grade'=>"E.",'holder_id'=>"19930268",'parent_id'=>"90023288",'parent_name'=>"WOA",'hierarchy'=>"81"],
            ['position_id'=>"92166476",'name'=>"PKWT Pengawas Lapangan Area 1 KCI",'grade'=>"E.",'holder_id'=>"19930269",'parent_id'=>"90023288",'parent_name'=>"WOA",'hierarchy'=>"82"],
            ['position_id'=>"92178476",'name'=>"PKWT Pengawas Lapangan Area 1 KCI",'grade'=>"E.",'holder_id'=>"19930270",'parent_id'=>"90023288",'parent_name'=>"WOA",'hierarchy'=>"83"],
            ['position_id'=>"92150397",'name'=>"PKWT Ticketing",'grade'=>"E.",'holder_id'=>"17900088",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"84"],
            ['position_id'=>"92151363",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 3",'grade'=>"E.",'holder_id'=>"19930273",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"85"],
            ['position_id'=>"92150377",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 4",'grade'=>"E.",'holder_id'=>"19930176",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"86"],
            ['position_id'=>"92207034",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 4",'grade'=>"E.",'holder_id'=>"19930274",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"87"],
            ['position_id'=>"92150376",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 5",'grade'=>"E.",'holder_id'=>"19930276",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"88"],
            ['position_id'=>"92150375",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 5",'grade'=>"E.",'holder_id'=>"19930275",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"89"],
            ['position_id'=>"92150373",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 6",'grade'=>"E.",'holder_id'=>"19930277",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"90"],
            ['position_id'=>"92150374",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 6",'grade'=>"E.",'holder_id'=>"19930278",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"91"],
            ['position_id'=>"92151460",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 2",'grade'=>"E.",'holder_id'=>"19930272",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"92"],
            ['position_id'=>"92150919",'name'=>"PKWT Pengawas Lapangan Area 2 Daop 2",'grade'=>"E.",'holder_id'=>"19930271",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"93"],
            ['position_id'=>"92198137",'name'=>"Supervisor 1 Area 2",'grade'=>"M4.2",'holder_id'=>"64213",'parent_id'=>"90022737",'parent_name'=>"WOA2",'hierarchy'=>"94"],
            ['position_id'=>"92207024",'name'=>"PKWT Pengawas Lapangan Area 3 Daop 7",'grade'=>"E.",'holder_id'=>"19930279",'parent_id'=>"90023265",'parent_name'=>"WOA3",'hierarchy'=>"95"],
            ['position_id'=>"92150368",'name'=>"PKWT Pengawas Lapangan Area 3 Daop 8",'grade'=>"E.",'holder_id'=>"19930281",'parent_id'=>"90023265",'parent_name'=>"WOA3",'hierarchy'=>"96"],
            ['position_id'=>"92150369",'name'=>"PKWT Pengawas Lapangan Area 3 Daop 8",'grade'=>"E.",'holder_id'=>"19930282",'parent_id'=>"90023265",'parent_name'=>"WOA3",'hierarchy'=>"97"],
            ['position_id'=>"92177097",'name'=>"PKWT Pengawas Lapangan Area 3 Daop 8",'grade'=>"E.",'holder_id'=>"19930283",'parent_id'=>"90023265",'parent_name'=>"WOA3",'hierarchy'=>"98"],
            ['position_id'=>"92162340",'name'=>"PKWT Pengawas Lapangan Area 3 Daop 9",'grade'=>"E.",'holder_id'=>"19930284",'parent_id'=>"90023265",'parent_name'=>"WOA3",'hierarchy'=>"99"],
            ['position_id'=>"92198356",'name'=>"S 2 Area 4 Sumatera Barat",'grade'=>"M4.2",'holder_id'=>"62340",'parent_id'=>"90022776",'parent_name'=>"WOA4",'hierarchy'=>"100"],
            ['position_id'=>"92162303",'name'=>"PKWT Pengawas Lapangan Area 4 Divre III",'grade'=>"E.",'holder_id'=>"19930288",'parent_id'=>"90022776",'parent_name'=>"WOA4",'hierarchy'=>"101"],
            ['position_id'=>"92198357",'name'=>"S 1 Area 4 Sumatera Selatan",'grade'=>"M4.2",'holder_id'=>"45010",'parent_id'=>"90022776",'parent_name'=>"WOA4",'hierarchy'=>"102"],
            ['position_id'=>"92162300",'name'=>"PKWT Pengawas Lapangan Area 4 Divre I",'grade'=>"E.",'holder_id'=>"19930285",'parent_id'=>"90022776",'parent_name'=>"WOA4",'hierarchy'=>"103"],
            ['position_id'=>"92162301",'name'=>"PKWT Pengawas Lapangan Area 4 Divre I",'grade'=>"E.",'holder_id'=>"19930286",'parent_id'=>"90022776",'parent_name'=>"WOA4",'hierarchy'=>"104"],
            ['position_id'=>"92162304",'name'=>"PKWT Pengawas Lapangan Area 4 Divre IV",'grade'=>"E.",'holder_id'=>"19930289",'parent_id'=>"90022776",'parent_name'=>"WOA4",'hierarchy'=>"105"],
        ];

        DB::table('positions')->insert($dash);
    }


}


