<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::create([
            'name' => 'Natalia Lairan',
            'image' => 'candidate-1.png',
            'campaign_url' => 'https://binusianorg-my.sharepoint.com/personal/natalia_lairan_binus_ac_id/_layouts/15/embed.aspx?UniqueId=c8a7e869-0bdf-417a-bb4f-7a6a6e31302f&embed=%7B%22ust%22%3Atrue%2C%22hv%22%3A%22CopyEmbedCode%22%7D&referrer=StreamWebApp&referrerScenario=EmbedDialog.Create',
            'target' => "Creating HIMTI that share the same fate as one and help each other in the entire 7-region system also makes HIMTI an adaptive organization for global millennials that continues to keep up with both current and future situations through improving relationships and self-understanding in each HIMTI member; developing HIMTI relationships with parties originating from outside HIMTI; and an understanding of HIMTI's values, which are the basis for overcoming the challenges that will be faced.",
            'tagline' => 'United with The Past, Together as One, Towards a Bright Future'
        ]);
        Candidate::create([
            'name' => 'Fakhira Shafa M',
            'image' => 'candidate-2.png',
            'campaign_url' => 'https://drive.google.com/file/d/1BIlQ8Y2MMipDoyrWfKstVOwr-W1NUSmp/preview',
            'target' => "Menjadikan HIMTI sebagai wadah bagi mahasiswa School of Computer Science untuk dapat meningkatkan softskill dan hardskill, melahirkan pemimpin pemimpin yang berintegritas tinggi, berkarakter, dan amanah, dan meningkatkan kesolidaritas dan kekeluargaan antar anggota HIMTI.",
            'tagline' => 'Hand in Hand Together We Can'
        ]);
        Candidate::create([
            'name' => 'Keyla Azzahra',
            'image' => 'candidate-3.png',
            'campaign_url' => 'https://binusianorg-my.sharepoint.com/personal/keyla_azzahra_binus_ac_id/_layouts/15/embed.aspx?UniqueId=9cd1a654-7e0b-41af-a639-2d1f70b2cd43&embed=%7B%22ust%22%3Atrue%2C%22hv%22%3A%22CopyEmbedCode%22%7D&referrer=StreamWebApp&referrerScenario=EmbedDialog.Create',
            'target' => "Membuat HIMTI yang memberikan lebih banyak kesempatan-kesempatan yang bisa diraih oleh mahasiswa/i SoCS sendiri, baik dalam bidang akademik, non-akademik, hard skills, dan soft skills.",
            'tagline' => 'Prepare your stance, and together, let us take a leap to the better future'
        ]);
    }
}
