<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\DiseaseSolution;

class CreateDiseasesolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseasesolutions', function (Blueprint $table) {
            $table->id('SolutionID');
            $table->string('DiseaseName')->nullable();
            $table->text('SolutionDescription')->nullable();
            $table->timestamps();
        });

        // Data penyakit dan solusinya
        $penyakit_solusi = [
            ['DiseaseName' => 'anthracnose', 'SolutionDescription' => 'Menerapkan fungisida secara teratur dan mempraktikkan rotasi tanaman untuk mengurangi risiko infeksi. Pastikan untuk membuang bagian tanaman yang terinfeksi secara menyeluruh.'],
            ['DiseaseName' => 'black spot', 'SolutionDescription' => 'Menghindari kelembaban yang berlebihan dengan menyiram tanaman dari bawah dan mempertahankan sirkulasi udara yang baik di sekitar tanaman. Penggunaan fungisida juga dapat membantu mengendalikan penyebaran penyakit.'],
            ['DiseaseName' => 'phytophthora', 'SolutionDescription' => 'Menyediakan drainase yang baik di lahan pertanian untuk mengurangi kelembaban tanah yang berlebihan. Penggunaan fungisida dan mempraktikkan rotasi tanaman juga dapat membantu mengendalikan infeksi.'],
            ['DiseaseName' => 'powdery mildew', 'SolutionDescription' => 'Menghindari kelembaban yang tinggi dengan menyiram tanaman di pagi hari dan memastikan sirkulasi udara yang baik. Penggunaan fungisida yang tepat juga dapat membantu mengendalikan penyakit ini.'],
            ['DiseaseName' => 'ring spot', 'SolutionDescription' => 'Memusnahkan tanaman yang terinfeksi secara menyeluruh dan mempraktikkan sanitasi yang baik di lahan pertanian. Penggunaan benih dan bibit yang sehat juga dapat membantu mencegah infeksi.']
        ];

        // Menyisipkan data penyakit dan solusinya ke dalam tabel diseaseSolution
        foreach ($penyakit_solusi as $ps) {
            $diseaseSolution = new DiseaseSolution();
            $diseaseSolution->DiseaseName = $ps['DiseaseName'];
            $diseaseSolution->SolutionDescription = $ps['SolutionDescription'];
            $diseaseSolution->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diseasesolutions');
    }
}
