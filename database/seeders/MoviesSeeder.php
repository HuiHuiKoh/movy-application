<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            [
                'name' => "Black Panther: Wakanda Forever",
                'releasedDate' => "2022-11-11",
                'image' => "movies1.jpg",
                'casts' => "Chadwick Boseman, Tenoch Huerta, Letitia Wright, Michael B.Jordan, Dominique Thorme",
                'synopsis' => "Queen Ramonda, Shuri, M'Baku, Okoye and the Dora Milaje fight to protect their nation from intervening world powers in the wake of King T'Challa's death.",
                'language' => "English",
                'type' => "Action/Adventure",
                'duration' => "2 Hours 42 Minutes",
                'trailer' => "https://www.youtube.com/embed/RlOB3UALvrQ",
                'director' => "Ryan Coogler",
                'categoryID' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "Black Adam",
                'releasedDate' => "2022-10-21",
                'image' => "movies2.jpg",
                'casts' => "Dwayne Johnson, Sarah Shahi, Pierce Brosnan, Henry Cavill, Noah Centineo",
                'synopsis' => "In ancient Kahndaq, Teth Adam was bestowed the almighty powers of the gods. After using these powers for vengeance, he was imprisoned, becoming Black Adam.",
                'language' => "English",
                'type' => "Action/Adventure",
                'duration' => "2 Hours 5 Minutes",
                'trailer' => "https://www.youtube.com/embed/X0tOpBuYasI",
                'director' => "Jaume Collet-Serra",
                'categoryID' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "Hunt",
                'releasedDate' => "2022-12-8",
                'image' => "movies3.png",
                'casts' => "Lee Jung-Jae, Jung Woo-Sung,Jeon Hye-Jin, Heo Sung-Tae, Go Youn-Jung, Kim Jong-Soo, Jung Man-Sik",
                'synopsis' => "After a high-ranking North Korean official requests asylum, KCIA Foreign Unit chief Park Pyong-ho and Domestic Unit chief Kim Jung-do are tasked with uncovering a North Korean spy.",
                'language' => "Korean",
                'type' => "Action/Drama/Mystery",
                'duration' => "2 Hours 11 Minutes",
                'trailer' => "https://www.youtube.com/embed/77Oy8b97VPw",
                'director' => "Lee Jung-Jae",
                'categoryID' => 2,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "Sword Art Online",
                'releasedDate' => "2022-12-29",
                'image' => "movies4.jpg",
                'casts' => "Yoshitsugu Matsuoka, Haruka Tomatsu, Inori Minase, Hiroki Yasumoto",
                'synopsis' => "It’s been just two months since they were trapped in the game of death that is Sword Art Online, and Kirito and Asuna continue their struggle at the vanguard of progress through the game.",
                'language' => "Japanese",
                'type' => "Animation",
                'duration' => "1 Hours 40 Minutes",
                'trailer' => "https://www.youtube.com/embed/n1fL9Ro332U",
                'director' => "Ayako Kono",
                'categoryID' => 2,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "Violent Night",
                'releasedDate' => "2022-12-2",
                'image' => "movies5.jpg",
                'casts' => "David Harbour, John Leguizamo, Alex Hassell, Beverly D'Angelo",
                'synopsis' => "An elite team of mercenaries breaks into a family compound on Christmas Eve, taking everyone hostage inside. Santa Claus is on the grounds, and he's about to show why this Nick is no saint.",
                'language' => "English",
                'type' => "Action/Comedy",
                'duration' => "1 Hours 52 Minutes",
                'trailer' => "https://www.youtube.com/embed/a53e4HHnx_s",
                'director' => "Tommy Wirkola",
                'categoryID' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "Lyle, Lyle, Crocodile",
                'releasedDate' => "2022-10-7",
                'image' => "movies6.jpg",
                'casts' => "Shawn Mendes, Winslow Fegley, Constance Wu, Javier Bardem",
                'synopsis' => "When the Primm family moves to New York City, their young son, Josh, struggles to adapt to his new school and friends. All of that changes when he discovers Lyle, a singing crocodile that loves baths.",
                'language' => "English",
                'type' => "Musical/Comedy",
                'duration' => "1 Hours 46 Minutes",
                'trailer' => "https://www.youtube.com/embed/s0W6O7mSlaU",
                'director' => "Will Speck, Josh Gordon",
                'categoryID' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "Lyle, Lyle, Crocodile",
                'releasedDate' => "2022-10-7",
                'image' => "movies6.jpg",
                'casts' => "Shawn Mendes, Winslow Fegley, Constance Wu, Javier Bardem",
                'synopsis' => "When the Primm family moves to New York City, their young son, Josh, struggles to adapt to his new school and friends. All of that changes when he discovers Lyle, a singing crocodile that loves baths.",
                'language' => "English",
                'type' => "Musical/Comedy",
                'duration' => "1 Hours 46 Minutes",
                'trailer' => "https://www.youtube.com/embed/s0W6O7mSlaU",
                'director' => "Will Speck, Josh Gordon",
                'categoryID' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "Avatar: The Way of Water",
                'releasedDate' => "2022-12-16",
                'image' => "movies7.jpg",
                'casts' => "Sam Worthington, Zoe Saldana, Sigourney Weaver, Kate Winslet",
                'synopsis' => "Jake Sully and Ney'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. Jake must fight a difficult war against the humans..",
                'language' => "English",
                'type' => "Action",
                'duration' => "3 Hours 12 Minutes",
                'trailer' => "https://www.youtube.com/embed/d9MyW72ELq0",
                'director' => "James Cameron",
                'categoryID' => 2,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
